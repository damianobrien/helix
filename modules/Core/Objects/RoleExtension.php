<?php
/**
 * This is an extension of the RoleRelationships class in the Helix Class Library
 * 
 * Add methods and/or properties to this class to extend the functionality of the
 * Role class family.  Changes to this class will affect all sites that use
 * this installation of the Helix Class Library.
 * 
 * If you need to customize this class for a single site, custom code should be placed
 * in a class called Role, and should extend the RoleExtension class.
 * The custom code file should be in the site folder called: library/Role.php
 * 
 * Object -> Role
 */
class RoleExtension extends RoleRelationships {
	
	public function hasPerm($perm) {
		$hasPerm = false;
		if (is_numeric($perm)) {
			$perm = new Perm($perm);
		} else if (is_string($perm)) {
			$perm = new Perm(null, $perm);
		}
		if (is_object($perm)) {
			$hasPerm = $this->getPermIds(null, null, "perm.id='{$perm->id}'")->count()>0;
		}
		return $hasPerm;
	}
	
}
?>