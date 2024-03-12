<?php


namespace App;

$payPalPayment = new class(100) extends PaymentMethod {
  public function processPayment() 
  {
      echo "Processing PayPal payment of {$this->paymentAmount} through Anonymous Class.";
  }
};
?>