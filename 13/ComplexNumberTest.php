<?php

require_once 'ComplexNumber.php';

use PHPUnit\Framework\TestCase;


class ComplexNumberTest extends TestCase {


    public function testAdd() {
        $num1 = new ComplexNumber(1, 1);
        $num2 = new ComplexNumber(1, 1);
        $numRes = $num1->add($num2);
        $numTrue = new ComplexNumber(2, 2);
        $this->assertEquals($numRes->getMainNumber(), $numTrue->getMainNumber());
        $this->assertEquals($numRes->getIllusionNumber(), $numTrue->getIllusionNumber());
    }

    public function testSub() {
        $num1 = new ComplexNumber(2, 2);
        $num2 = new ComplexNumber(1, 1);
        $numRes = $num1->sub($num2);
        $numTrue = new ComplexNumber(1, 1);
        $this->assertEquals($numRes->getMainNumber(), $numTrue->getMainNumber());
        $this->assertEquals($numRes->getIllusionNumber(), $numTrue->getIllusionNumber());
    }

    public function testMult() {
        $num1 = new ComplexNumber(1, 1);
        $num2 = new ComplexNumber(1, 1);
        $numRes = $num1->mult($num2);
        $numTrue = new ComplexNumber(0, 2);
        $this->assertEquals($numRes->getMainNumber(), $numTrue->getMainNumber());
        $this->assertEquals($numRes->getIllusionNumber(), $numTrue->getIllusionNumber());
    }

    public function testDiv() {
        $num1 = new ComplexNumber(2, 2);
        $num2 = new ComplexNumber(1, 1);
        $numRes = $num1->div($num2);
        $numTrue = new ComplexNumber(2, 0);
        $this->assertEquals($numRes->getMainNumber(), $numTrue->getMainNumber());
        $this->assertEquals($numRes->getIllusionNumber(), $numTrue->getIllusionNumber());
    }

    public function testDivExc() {
        $num1 = new ComplexNumber(2, 2);
        $num2 = new ComplexNumber(0, 0);
        $this->expectException(ArithmeticError::class);
        $num1->div($num2);
    }

    public function testAbs() {
        $num1 = new ComplexNumber(3, 4);
        $numRes = $num1->abs();
        $numTrue = 5;
        $this->assertEquals($numRes, $numTrue);
    }

}
