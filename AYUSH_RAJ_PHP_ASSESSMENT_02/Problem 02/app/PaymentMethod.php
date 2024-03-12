<?php 

namespace App;

abstract class PaymentMethod {
  protected $paymentAmount;

  public function __construct($paymentAmount) {
      $this->paymentAmount = $paymentAmount;
  }

  public function getPaymentAmount() {
      return $this->paymentAmount;
  }

  abstract public function processPayment();
}

?>