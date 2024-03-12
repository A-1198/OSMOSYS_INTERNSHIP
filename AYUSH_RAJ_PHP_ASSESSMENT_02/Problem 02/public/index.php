<?php

require_once '../app/PaymentMethod.php';
require_once '../app/CardDetails.php';
require_once '../app/CreditCardPayment.php';
require_once '../app/PayPalPayment.php';

use App\PaymentMethod;
use App\CardDetails;
use App\CreditCardPayment;
use App\PayPalPayment;

$creditCardPayment = new CreditCardPayment(50);
$creditCardPayment->setCardholderName("Ayush Raj");
$creditCardPayment->setCardNumber("1234 5678 9012 3456");
$creditCardPayment->setExpirationDate("12/24");
$creditCardPayment->setCvv("123");

echo "Card Details :"."<br/>";
echo "Cardholder Name: {$creditCardPayment->getCardholderName()}"."<br/>";
echo "Card Number: {$creditCardPayment->getCardNumber()}"."<br/>";
echo "Expiration Date: {$creditCardPayment->getExpirationDate()}"."<br/>";
echo "CVV: {$creditCardPayment->getCvv()}"."<br/>";
echo "<hr/>";

$creditCardPayment->processPayment();
echo "<hr/>";
$payPalPayment->processPayment();
echo "<hr/>";