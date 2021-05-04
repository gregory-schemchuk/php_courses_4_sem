<?php

include "JsonLogger.php";

use Logger\JsonLogger as JsonLogger;


$logger = new JsonLogger();

$logger -> emergency("TEST {1}", ["1" => "ONE"]);

$logger -> notice("SOME INFO");