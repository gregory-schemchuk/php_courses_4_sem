<?php

spl_autoload_register(function ($class_name) {
    $file = '../' . $class_name . '.php';
    include $file;
}, false);

use exceptions\FirstException;
use exceptions\SecondException;
use exceptions\ThirdException;
use exceptions\FourthException;
use exceptions\FifthException;


class Main {

    public function checkOneTwoExceptions() {
        $num = rand(1, 3);
        switch ($num) {
            case 1:
                throw new FirstException(1);
                break;
            case 2:
                throw new SecondException(1);
                break;
            case 3:
                echo 'success checkOneTwoExceptions exec <br>';
                break;
        }
    }

    public function checkTwoThreeExceptions() {
        $num = rand(1, 3);
        switch ($num) {
            case 1:
                throw new ThirdException(1);
                break;
            case 2:
                throw new SecondException(1);
                break;
            case 3:
                echo 'success checkTwoThreeExceptions exec <br>';
                break;
        }
    }

    public function checkThreeFourExceptions() {
        $num = rand(1, 3);
        switch ($num) {
            case 1:
                throw new ThirdException(1);
                break;
            case 2:
                throw new FourthException(1);
                break;
            case 3:
                echo 'success checkThreeFourExceptions exec <br>';
                break;
        }
    }

    public function checkFourFiveExceptions() {
        $num = rand(1, 3);
        switch ($num) {
            case 1:
                throw new FourthException(1);
                break;
            case 2:
                throw new FifthException(1);
                break;
            case 3:
                echo 'success checkFourFiveExceptions exec <br>';
                break;
        }
    }

}