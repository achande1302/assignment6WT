<?php
require 'db.php';
require 'book.php';

$db= new Database();
$book = new product($db->connect());

$msg="Record is not deleted";
$status="ERROR";
$book->book_id=$_GET['book_id']??"NA";

if($book->delete()>0){

	$msg="Record is deleted";
	$status="OK";
}
$url ="Location: showrec.php?status=$status&msg=$msg";
header($url);
?>