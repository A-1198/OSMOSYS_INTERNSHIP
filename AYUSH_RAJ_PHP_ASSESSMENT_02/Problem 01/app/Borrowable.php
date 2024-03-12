<?php


namespace App;

interface Borrowable
{
  public function borrow();
  public function return($borrowedDate);
}

?>