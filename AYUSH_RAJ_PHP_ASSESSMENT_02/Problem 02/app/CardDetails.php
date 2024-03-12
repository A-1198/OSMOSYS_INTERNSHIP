<?php

namespace App;

trait CardDetails 
{
  protected $cardholderName;
  protected $cardNumber;
  protected $expirationDate;
  protected $cvv;

  public function setCardholderName($name) 
  {
      $this->cardholderName = $name;
  }


  public function setCardNumber($number) 
  {
      $this->cardNumber = $number;
  }

  public function setExpirationDate($date) 
  {
      $this->expirationDate = $date;
  }


  public function setCvv($cvv) 
  {
      $this->cvv = $cvv;
  }

  public function getCardholderName() 
  {
      return $this->cardholderName;
  }
  
  public function getCardNumber() 
  {
      return $this->cardNumber;
  }


  public function getExpirationDate() 
  {
      return $this->expirationDate;
  }


  public function getCvv() 
  {
      return $this->cvv;
  }
}
