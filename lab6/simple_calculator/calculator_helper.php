<?php

interface Operation {
  public function calculate($a, $b);
}

abstract class Calculator {
  protected $operation;

  public function setOperation(Operation $operation) {
    $this->operation = $operation;
  }

  abstract public function getResult($a, $b);
}

class Addition implements Operation {
  public function calculate($a, $b) {
    return $a + $b;
  }
}

class Subtraction implements Operation {
  public function calculate($a, $b) {
    return $a - $b;
  }
}

class Multiplication implements Operation {
  public function calculate($a, $b) {
    return $a * $b;
  }
}

class Division implements Operation {
  /**
   * @throws Exception
   */
  public function calculate($a, $b) {
    if($b == 0) {
      throw new Exception("Cannot divide by zero");
    }
    return $a / $b;
  }
}

class BasicCalculator extends Calculator {
  public function getResult($a, $b) {
    return $this->operation->calculate($a, $b);
  }
}


