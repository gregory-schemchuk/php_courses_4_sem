<?php


namespace exceptions;


class SecondException extends FirstException {


    public function __construct($code) {
        parent::__construct("Second Exc: ", $code);
    }

}