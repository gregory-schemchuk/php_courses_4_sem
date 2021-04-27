<?php

namespace exceptions;


class FirstException extends \Exception {

    public function __construct($code) {
        parent::__construct("First Exc code: " . $code);
    }

}