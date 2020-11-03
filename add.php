<?php
require 'db.php';
require 'book.php';

$db=new Database();
$product1=new product($db->connect());

$product1->book_id=$_POST['id'];
$product1->book_name=$_POST['name'];
$product1->author=$_POST['author'];
$product1->shelf_no=$_POST['shelf_no'];

$msg="Record is not saved";
$status="ERROR";
if($product1->add()>0)
{
	$msg="Record saved successfully";
	$status="OK";
}

$url="Location: addon.php?status=$status&msg=$msg";
header($url);
?>