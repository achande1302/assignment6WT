<?php
include 'header.php';
require 'db.php';
require 'book.php';

$db= new Database();
$book = new product($db->connect());

$book->book_id=$_GET['book_id']??"NA";

$data=$book->getByID();
if($data->rowCount()>0){
	$row=$data->fetch(PDO::FETCH_ASSOC);
	$id=$row['book_id'];
	$name=$row['book_name'];
	$author=$row['author'];
	$shelf_no=$row['shelf_no'];
}
?>
<div id="sub-head">
		<h2>Update Records</h2>
	</div>
	<div id="main-body" style="text-align: left">
		<form action="update.php" method="post">
			<table align="center" cellspacing="2">
				<tr>
					<td>Book id</td>
					<td><input type="number" disabled name="id1" id="id1" value=<?php echo $id ?? "";?>></td>
					<td><input type="hidden" name="id" id="id" value=<?php echo $id ??"";?>></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" id="name" value=<?php echo $name?? "";?>></td>
				</tr>
				<tr>
					<td>Author</td>
					<td><input type="text" name="author" id="author" value=<?php echo $author ?? "";?>></td>
				</tr>
				<tr>
					<td>Shelf number</td>
					<td><input type="number" name="shelf_no" id="shelf_no" max="50" step="1" value=<?php echo $shelf_no ?? "";?>></td>
				</tr>
				<tr>
					<td class="button" colspan="2" align="center">
						<br>
						<input type="submit" value="Update">
						<input type="reset" value="Clear">
					</td>
				</tr>
			</table>
		</form>
		<?php if (isset($_GET['status'],$_GET['msg'])){?>
		<div class="<?php echo($_GET['status']=="OK")?"success":"error"?>">
				<?php echo $_GET['msg'];?>
		</div>
			<?php } ?>