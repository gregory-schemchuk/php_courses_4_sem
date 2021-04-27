<?php


namespace exceptions;


class FifthException extends FourthException {


    public function __construct($code) {
        parent::__construct("Fifth Exc: ", $code);
    }

}