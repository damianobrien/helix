<?php
if (!file_exists("admin/config/server.php")) {
	copy("admin/config/server.default.php", "admin/config/server.php");
}
header("Location: admin", true, 302);
?>