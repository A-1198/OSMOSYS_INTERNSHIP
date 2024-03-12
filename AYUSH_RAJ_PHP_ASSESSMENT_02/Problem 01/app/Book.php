<?php

namespace App;

class Book implements Borrowable
{
  private $title;
  private $author;
  private $isbn;
  private static $numAvailableCopies;
  private const MAX_BORROW_DAYS = 14;

  public function __construct($title,$author,$isbn)
  {
    $this->title = $title;
    $this->author = $author;
    $this->isbn = $isbn;
  }

  public static function setinitialAvailableCopies($num)
  {
    self::$numAvailableCopies = $num;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function getIsbn()
  {
    return $this->isbn;
  }

  public function borrow()
  {
    if(self :: $numAvailableCopies>0)
    {
      echo "Before borrow : ".self::$numAvailableCopies."<br/>";
      self:: $numAvailableCopies--;
      echo "Book {$this->title} is borrowed"."<br/>";
      echo "After borrow : ".self::$numAvailableCopies."<br/>";
      echo "<hr/>";
    }
    else
    {
      echo "Book {$this->title} has no available copies for borrow."."<br/>";
    }
  }

  public function return($borrowedDate)
  {
    $returnDate = new \DateTime();
    $borrowedDate = new \DateTime($borrowedDate);
    $daysDiff = $returnDate->diff($borrowedDate)->days;

    if($daysDiff > self :: MAX_BORROW_DAYS)
    {
      $fine = ($daysDiff-self::MAX_BORROW_DAYS)*10;
      echo "You are bit late too. Your fine is $fine."."<br/>";
    }
    else{
      self::$numAvailableCopies++;
      echo "Book {$this->title} has been returned within time."."<br/>";
      echo "Updated books now : ".self::$numAvailableCopies>"<br/>";
      echo "<hr/>";
    }
  }
}