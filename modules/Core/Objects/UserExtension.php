<?php

/**
 * This is an extension of the UserRelationships class in the Helix Class Library
 *
 * Add methods and/or properties to this class to extend the functionality of the
 * User class family.  Changes to this class will affect all sites that use
 * this installation of the Helix Class Library.
 *
 * If you need to customize this class for a single site, custom code should be placed
 * in a class called User, and should extend the UserExtension class.
 * The custom code file should be in the site folder called: library/User.php
 *
 * Object -> Entity -> Person -> User
 */
class UserExtension extends UserRelationships
{
    const PBKDF2_HASH_ALGORITHM = "sha256";
    const PBKDF2_ITERATIONS = 1000;
    const PBKDF2_SALT_BYTES = 24;
    const PBKDF2_HASH_BYTES = 24;

    const HASH_SECTIONS = 4;
    const HASH_ALGORITHM_INDEX = 0;
    const HASH_ITERATION_INDEX = 1;
    const HASH_SALT_INDEX = 2;
    const HASH_PBKDF2_INDEX = 3;


    public function insert($insertParent=true) {
        //do the default insert routine
        parent::insert($insertParent);

        
        //generate the hash for the password
    }


    /**
     * Authenticate user with username and password
     *
     * @param string username The username of the user
     * @param string password The plain text password of the user
     * @return int The id of the authenticated user, or 0 for failure
     */
    public static function authenticate($username, $password)
    {
        $db = Database::getInstance();
        $users = User::objects(null, "upper(" . $db->encapsulate("user") . "." . $db->encapsulate("username") . ")=upper('{$username}') AND " . $db->encapsulate("user") . "." . $db->encapsulate("password") . "='" . self::encodePassword($password) . "'");
        return $users->count() === 1 ? $users->first()->id : 0;
    }

    public static function usernameExists($username)
    {
        return (count(User::select("*", null, "username='{$username}'")) > 0);
    }

    public static function login($username, $password)
    {
        global $session;
        $user = new User(self::authenticate($username, $password));
        if ($user->id > 0) {
            $session->setUser($user);
        }
        return $user;
    }

    public function logout()
    {
        global $session;
        SessionUser::deleteAll($session->id, $this->id);
        return true;
    }

    public static function encodePassword($password)
    {
        return md5($password);
    }

    public function loggedIn()
    {
        global $session;
        return ($session->user->id > 0);
    }

    public function getName()
    {
        return "{$this->firstName} {$this->lastName}";
    }

    public function setName($name)
    {
        if (strlen($name) > 0) {
            $names = preg_split('/ +/i', $name);
            $numNames = count($names);
            if ($numNames === 1) {
                $this->firstName = $names[0];
            } else if ($numNames === 2) {
                $this->firstName = $names[0];
                $this->lastName = $names[1];
            } else {
                $this->firstName = array_shift($names);
                $this->lastName = array_pop($names);
                $this->middleName = implode(" ", $names);
            }
        }
    }

    public function hasRole($role)
    {
        $hasRole = false;
        if (is_numeric($role)) {
            $role = new Role($role);
        } else if (is_string($role)) {
            $role = new Role(null, $role);
        }
        if (is_object($role)) {
            $hasRole = $this->getRoleIds(null, null, "role.id='{$role->id}'")->count() > 0;
        }
        return $hasRole;
    }

    public function hasPerm($perm)
    {
        $hasPerm = false;
        if (is_numeric($perm)) {
            $perm = new Perm($perm);
        } else if (is_string($perm)) {
            $perm = new Perm(null, $perm);
        }
        if (is_object($perm)) {
            $hasPerm = $this->getPermIds(null, null, "perm.id='{$perm->id}'")->count() > 0;
            if (!$hasPerm) {
                foreach ($this->getRoleList() as $role) {
                    if ($role->hasPerm($perm)) {
                        $hasPerm = true;
                    }
                }
            }
        }
        return $hasPerm;
    }


    /*change logged in user to $userId, true if successful*/
    public static function emulate($userId)
    {
        if ($userId > 0) {
            $session = Session::getActiveSession();
            $session->setUser(new User($userId));
            return true;
        }
        return false;
    }

    //functions below were sourced here: https://crackstation.net/hashing-security.htm#phpsourcecode
    public static function create_hash($password)
    {
        // format: algorithm:iterations:salt:hash
        $salt = base64_encode(mcrypt_create_iv(self::PBKDF2_SALT_BYTES, MCRYPT_DEV_URANDOM));
        return self::PBKDF2_HASH_ALGORITHM . ":" . self::PBKDF2_ITERATIONS . ":" . $salt . ":" .
        base64_encode(self::PBKDF2(
            self::PBKDF2_HASH_ALGORITHM,
            $password,
            $salt,
            self::PBKDF2_ITERATIONS,
            self::PBKDF2_HASH_BYTES,
            true
        ));
    }

    public static function validate_password($password, $correct_hash)
    {
        $params = explode(":", $correct_hash);
        if (count($params) < self::HASH_SECTIONS)
            return false;
        $PBKDF2 = base64_decode($params[self::HASH_PBKDF2_INDEX]);
        return self::slow_equals(
            $PBKDF2,
            self::PBKDF2(
                $params[self::HASH_ALGORITHM_INDEX],
                $password,
                $params[self::HASH_SALT_INDEX],
                (int)$params[self::HASH_ITERATION_INDEX],
                strlen($PBKDF2),
                true
            )
        );
    }

    // Compares two strings $a and $b in length-constant time.
    public static function slow_equals($a, $b)
    {
        $diff = strlen($a) ^ strlen($b);
        for ($i = 0; $i < strlen($a) && $i < strlen($b); $i++) {
            $diff |= ord($a[$i]) ^ ord($b[$i]);
        }
        return $diff === 0;
    }

    /*
     * self::PBKDF2 key derivation function as defined by RSA's PKCS #5: https://www.ietf.org/rfc/rfc2898.txt
     * $algorithm - The hash algorithm to use. Recommended: SHA256
     * $password - The password.
     * $salt - A salt that is unique to the password.
     * $count - Iteration count. Higher is better, but slower. Recommended: At least 1000.
     * $key_length - The length of the derived key in bytes.
     * $raw_output - If true, the key is returned in raw binary format. Hex encoded otherwise.
     * Returns: A $key_length-byte key derived from the password and salt.
     *
     * Test vectors can be found here: https://www.ietf.org/rfc/rfc6070.txt
     *
     * This implementation of self::PBKDF2 was originally created by https://defuse.ca
     * With improvements by http://www.variations-of-shadow.com
     */
    public static function PBKDF2($algorithm, $password, $salt, $count, $key_length, $raw_output = false)
    {
        $algorithm = strtolower($algorithm);
        if (!in_array($algorithm, hash_algos(), true))
            trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
        if ($count <= 0 || $key_length <= 0)
            trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);

        if (function_exists("self::HASH_PBKDF2")) {
            // The output length is in NIBBLES (4-bits) if $raw_output is false!
            if (!$raw_output) {
                $key_length = $key_length * 2;
            }
            return HASH_PBKDF2($algorithm, $password, $salt, $count, $key_length, $raw_output);
        }

        $HASH_length = strlen(hash($algorithm, "", true));
        $block_count = ceil($key_length / $HASH_length);

        $output = "";
        for ($i = 1; $i <= $block_count; $i++) {
            // $i encoded as 4 bytes, big endian.
            $last = $salt . pack("N", $i);
            // first iteration
            $last = $xorsum = HASH_hmac($algorithm, $last, $password, true);
            // perform the other $count - 1 iterations
            for ($j = 1; $j < $count; $j++) {
                $xorsum ^= ($last = HASH_hmac($algorithm, $last, $password, true));
            }
            $output .= $xorsum;
        }

        if ($raw_output)
            return substr($output, 0, $key_length);
        else
            return bin2hex(substr($output, 0, $key_length));
    }

}