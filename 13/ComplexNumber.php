<?php


class ComplexNumber {

    private $mainNumber;

    private $illusionNumber;


    public function __construct(float $mainNumber, float $illusionNumber) {
        $this -> mainNumber = $mainNumber;
        $this -> illusionNumber = $illusionNumber;
    }

    public function add(ComplexNumber $number): ComplexNumber {
        return new ComplexNumber($this->mainNumber + $number->mainNumber,
            $this->illusionNumber + $number->illusionNumber);
    }

    public function sub(ComplexNumber $number): ComplexNumber {
        return new ComplexNumber($this->mainNumber - $number->mainNumber,
            $this->illusionNumber - $number->illusionNumber);
    }

    public function mult(ComplexNumber $number): ComplexNumber {
        return new ComplexNumber($this->mainNumber * $number->mainNumber - $this->illusionNumber * $number->illusionNumber,
            $this->mainNumber * $number->illusionNumber + $this->illusionNumber * $number->mainNumber);
    }

    public function div(ComplexNumber $number): ComplexNumber {
        if ($number->mainNumber == 0 && $number->illusionNumber == 0) {
            throw new ArithmeticError("second value cannot be 0 with div operation", 1);
        }
        $znam = $number->mainNumber * $number->mainNumber + $number->illusionNumber * $number->illusionNumber;
        $mainNumber = ($this->mainNumber * $number->mainNumber + $this->illusionNumber * $number->illusionNumber) / $znam;
        $illusionNumber = ($number->mainNumber * $this->illusionNumber - $number->illusionNumber * $this->mainNumber) / $znam;
        return new ComplexNumber($mainNumber, $illusionNumber);
    }

    public function abs(): float {
        $num = $this->mainNumber * $this->mainNumber + $this->illusionNumber * $this->illusionNumber;
        return sqrt($num);
    }

    public function __toString(): string {
        return $this -> mainNumber . " + " . $this -> illusionNumber . "i";
    }

    public function getIllusionNumber(): float {
        return $this -> illusionNumber;
    }

    public function getMainNumber(): float {
        return $this -> mainNumber;
    }

}
