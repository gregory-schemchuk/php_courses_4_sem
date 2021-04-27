<?php


namespace exceptions;


class FourthException extends ThirdException {


    public function __construct($code) {
        parent::__construct("Fourth Exc: ", $code);
    }

}