<?php

spl_autoload_register(function ($class_name) {
    $file = './' . $class_name . '.php';
    include $file;
}, false);


use exceptions\FirstException;
use exceptions\SecondException;
use exceptions\ThirdException;
use exceptions\FourthException;
use exceptions\FifthException;


$main = new Main();

try {
    $main -> checkOneTwoExceptions();
} catch (FirstException $e) {
    echo("first exception thrown <br>");
} catch (SecondException $e) {
    echo("second exception thrown <br>");
}

try {
    $main -> checkTwoThreeExceptions();
} catch (ThirdException $e) {
    echo("third exception thrown <br>");
} catch (SecondException $e) {
    echo("second exception thrown <br>");
}

try {
    $main -> checkThreeFourExceptions();
} catch (ThirdException $e) {
    echo("third exception thrown <br>");
} catch (FourthException $e) {
    echo("fourth exception thrown <br>");
}

try {
    $main -> checkFourFiveExceptions();
} catch (FourthException $e) {
    echo("fourth exception thrown <br>");
} catch (FifthException $e) {
    echo("fifth exception thrown <br>");
}