<?php
// calculate.php

include 'calculator_helper.php';

$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $a = floatval($_POST['operand1']);
  $b = floatval($_POST['operand2']);
  $operation = $_POST['operation'];

  $calculator = new BasicCalculator();

  switch ($operation) {
    case 'add':
      $calculator->setOperation(new Addition());
      break;
    case 'subtract':
      $calculator->setOperation(new Subtraction());
      break;
    case 'multiply':
      $calculator->setOperation(new Multiplication());
      break;
    case 'divide':
      $calculator->setOperation(new Division());
      break;
  }

  try {
    $result = $calculator->getResult($a, $b);
  } catch (Exception $e) {
    $result = $e->getMessage();
  }
}

include 'index.html';
?>
