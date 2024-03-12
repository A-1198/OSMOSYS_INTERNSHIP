<?php

require_once '../app/Borrowable.php';
require_once '../app/Book.php';
require_once '../app/Magazine.php';

use App\Book;
use App\Magazine;

Book::setinitialAvailableCopies(5);

$book1 = new Book("Hello World","Ayush Raj",123456789098);
$borrowedDate1 = "2024-01-01";

$magazine1 = new Magazine("New Journal",001,"2024-03-01");
$borrowedDate2 = "2024-01-01";

echo "Details of Book :"."<br/>";
echo $book1->getTitle()."<br/>";
echo $book1->getAuthor()."<br/>";
echo $book1->getIsbn()."<br/>";
echo "<hr>";
$book1->borrow();
$book1->borrow();
$book1->return($borrowedDate1);


echo "<hr>";
echo "Details of Magazine :"."<br/>";
echo $magazine1->getTitle()."<br/>";
echo $magazine1->getIssueNumber()."<br/>";
echo $magazine1->getPublicationDate()."<br/>";
echo "<hr>";
$magazine1->borrow();
$magazine1->return($borrowedDate2);
