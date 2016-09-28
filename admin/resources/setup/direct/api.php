<?php
// Include Helix configuration and library
require_once("./config/settings.php");
global $config;
//echo json_encode($config);die;
require_once($config["helix"] . "/system/Helix.php");

//echo($config["root"] . "/services".CN);

Helix::mapSystemClasses($config["root"] . "/services");
//echo("var classes = " .json_encode(Helix::$classes).CN);
//die();


// Build descriptor of remoteable methods
$descriptor = buildDescriptor();
$jsonDescriptor = JSON::encode($descriptor);


// Output descriptor as either executable javascript code or json configuration
if (array_key_exists("json", Request::$data)) {
	JSON::send($jsonDescriptor);
} else {
	Response::setHeader("Content-Type", "text/javascript");
	/*echo implode(CN, array(
		"Ext.ns('Helix.direct');",
		"Ext.Direct.addProvider({$jsonDescriptor});"
	));*/
	echo implode(CN, array(
		"Ext.ns('Helix.direct');",
		"Ext.app.REMOTING_API = {$jsonDescriptor};"
	));
}

// Build remoteable descriptor for server side classes
function buildDescriptor() {
	global $config;
	$descriptor = array(
		//"url"=>$config["webroot"]."/direct/router.php",
		"url"=>str_replace("//","/",$config["webroot"]."/direct/router.php"), //if webroot is /, remove the //
		"type"=>"remoting",
		"namespace"=>"Helix.direct",
		"actions"=>array()
	);
	foreach (Helix::$classes as $class=>$path) {
		try {
			// Only remote classes in the api/ folder 
			if (!preg_match('/^' . preg_quote($config["root"] . "/services", "/") . '/', $path)) continue;
			//echo("...............".$path.CN);
			$reflector = new ReflectionClass($class);
			$classNiceName = preg_replace('/Service$/','',$class);
			$descriptor["actions"][$classNiceName] = array();
			foreach ($reflector->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
				if ($method->getDeclaringClass()->name===$class && $method->isUserDefined() && $method->name[0]!=="_") {
					$descriptor["actions"][$classNiceName][] = array(
						"name"=>$method->name,
						"len"=>$method->getNumberofParameters(),
						"formHandler"=>preg_match('/^formHandler/', $method->name)

					);
				}
			}
		} catch (Exception $e) {}
	}
	return $descriptor;
}