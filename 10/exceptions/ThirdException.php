<?php


namespace exceptions;


class ThirdException extends SecondException {


    public function __construct($code) {
        parent::__construct("Third Exc: ", $code);
    }

}