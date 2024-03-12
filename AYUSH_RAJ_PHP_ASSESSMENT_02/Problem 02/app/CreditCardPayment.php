<?php

namespace App;

class CreditCardPayment extends PaymentMethod {
  use CardDetails;

  public function processPayment() 
  {
      echo "Processing credit card payment of {$this->paymentAmount} through Normal class."."<br/>";
  }
}

?>