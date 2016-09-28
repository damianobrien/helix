<?php
/**
 * The configuration settings for this site
 * 
 * This array will contain configuration for the current site.  The site
 * configuration should be the same for any server hosting this site.
 */

// Home page - will be used for requests with no page [home]
$config["home"] = "home";

// Default <title> element value for pages [New Site]
$config["title"] = "Helix Administration";

// Enable output buffering [true]
$config["output_buffering"] = true;

// Layout to be used when no page class is defined [default] 
$config["default_layout"] = "";

// Method to be called during service requests with no specified action [index] 
$config["default_service_action"] = "index";

// Default page cache in seconds to set in the HTTP cache headers [0]
$config["default_page_cache"] = 0;

// Default resource cache in seconds to set in the HTTP cache headers - 1 Week - [604800]
$config["default_resource_cache"] = 604800;

/**
 * Map URL path segments to pages in the application
 * 
 * If a requested path does not have a route defined, map it directly to the filesystem 
 * @var unknown_type
 */
$config["routes"] = array(
	"/home"=>"pages/home.php"
);

$config["ris"]=array();
$config["ris"]["lateMinutes"]=20;
$config["ris"]["excessiveWaitMinutes"]=45;