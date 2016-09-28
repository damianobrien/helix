<?php
// Include Helix configuration and library
require_once("./config/settings.php");
global $config;
//echo json_encode($config);die;
require_once($config["helix"] . "/system/Helix.php");

// Transform the raw post data from serialized JSON to associative array
$request = isset(Request::$data["extAction"]) ? Request::$data : JSON::decode(Request::$input, true);
//debug(json_encode($request),"direct.log");
$requests = is_array($request) ? (array_key_exists("tid", $request) ? array($request) : array_key_exists("extTID", $request) ? array($request) : $request) : array();
$responses = array();

foreach ($requests as $r) {
    //debug(json_encode($r),"direct.log");
    // Copy all of the request metadata into the response, but not the request data
    $action = alt(val($r, "extAction"), val($r, "action"));
    $method = alt(val($r, "extMethod"), val($r, "method"));
    $tid = intval(alt(val($r, "extTID"), val($r, "tid")));
    $type = alt(val($r, "extType"), val($r, "type"));
    $data = isset($r["extAction"]) ? $r : $r["data"];
    //debug("\$data => " . json_encode($data),"direct.log");

    $isFileUpload = alt(isTrue(val($r, "extUpload")), false);
    $response = array(
        "action" => $action,
        "method" => $method,
        "tid" => $tid,
        "type" => $type,
        "result" => null
    );
    // Route action and method to appropriate class and method
    if (isset($action)) {
        if (isset($method)) {
            try {
                $segments = array(lcfirst($action), $method);
                $serviceResponse = new ServiceResponse($segments);
                $serviceResponse->args = is_array($data) ? $data : array();

                $serviceResponse->executeAction();
                $response["result"] = $serviceResponse->service->data;

            } catch (Exception $e) {
                logException($e);
                $response["type"] = "exception";
                $response["message"] = $e->getMessage();
                $response["where"] = $e->getTraceAsString();
            }
        } else {
            Helix::setError(500, "API requires a method");
        }
    } else {
        Helix::setError(500, "API requires an action");
    }
    $responses[] = $response;
}
$responses = count($responses) === 1 ? $responses[0] : $responses;

/*if (isset($isFileUpload) && $isFileUpload) {
	echo "<html><body><textarea>" . JSON::encode($responses) . "</textarea></body></html>";
} else {
	JSON::send($responses);
}*/
echo json_encode($responses);