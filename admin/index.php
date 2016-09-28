<?php
// Initialize the global configuration array
$config = array();

/**
 * Include the PHP environment configuration for this server
 * 
 * This configuration will probably need to be different for development and 
 * live production servers.
 */
require("config/server.php");

//-----------------------------------------------------------------------------

/**
 * Include the configuration for this site
 * 
 * This array will contain configuration for this site and should be the
 * same for any server where this site is running
 */
require("config/site.php");

//-----------------------------------------------------------------------------

/**
 * Include the Helix Class Library and configuration
 * 
 * You can put the Helix folder anywhere -- just make sure that you change this
 * path to include it.  This loads the main System class and other classes.
 * Load additional classes using the Helix::load() static method.
 */
require("{$config["helix"]}/system/Helix.php");

//-----------------------------------------------------------------------------

/**
 * Respond to the request using the Helix Class Library and configuration
 * 
 * If you want to use the Helix Class Library to respond to the request, then
 * call this method.  If you only want the classes in the Helix Class Library, 
 * then remove this method call.
 */
Helix::respond();
?>