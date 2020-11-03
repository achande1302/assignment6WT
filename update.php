<?php
require 'db.php';
require 'book.php';

$db=new Database();
$product1=new product($db->connect());

$product1->book_id=$_POST['id'];
$product1->book_name=$_POST['name'];
$product1->author=$_POST['author'];
$product1->shelf_no=$_POST['shelf_no'];

$msg="Record is not Updated";
$status="ERROR";
if($product1->update()>0)
{
	$msg="Record Updated successfully";
	$status="OK";
}
//print_r($_POST);
$url="Location: updateon.php?status=$status&msg=$msg&book_id={$product1->book_id}";
header($url);
?>

