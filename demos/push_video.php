<?php

require_once(dirname(__FILE__) . "/../Ziggeo.php");

$opts = getopt("", array("token:", "privatekey:", "vtoken:", "pstoken:"));

var_dump($opts);

if (empty($opts["pstoken"])) {
    die ("Must provide a push service token");
}

$ziggeo = new Ziggeo($opts["token"], $opts["privatekey"]);

$data = array(
    "pushservicetoken" => $opts["pstoken"]
);

if (isset($opts["streamtoken"]))
    $data["streamtoken"] = $opts["streamtoken"];

$ziggeo->videos()->push_to_service($opts["vtoken"], $data);