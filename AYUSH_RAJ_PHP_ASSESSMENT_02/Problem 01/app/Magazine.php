<?php

namespace App;

class Magazine implements Borrowable
{
  private $title;
  private $issueNumber;
  private $publicationDate;

  public function __construct ($title,$issueNumber,$publicationDate)
  {
    $this->title = $title;
    $this->issueNumber = $issueNumber;
    $this->publicationDate = $publicationDate;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getIssueNumber()
  {
    return $this->issueNumber;
  }

  public function getPublicationDate()
  {
    return $this->publicationDate;
  }

  public function borrow()
  {
    echo "Magazine:- {$this->title} , Issue:- {$this->title} has been borrowed"."<br/>";
  }

  public function return($borrowedDate)
  {
    $borrowedDate = new \DateTime($borrowedDate);
    echo "Magazine:- {$this->title} , Issue:- {$this->title} has been returned issued on ". $borrowedDate->format('Y-m-d H:i:s')."<br/>";
  }
}