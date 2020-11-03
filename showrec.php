<?php include 'header.php';?>
		<div id="sub-head">
			<h2>Show Records</h2>
		</div>
		<div id="main-body">
			<?php if (isset($_GET['status'],$_GET['msg'])){?>
		<div class="<?php echo($_GET['status']=="OK")?"success":"error"?>">
				<?php echo $_GET['msg'];?>
		</div>
			<?php } ?>
			<table class="css" align="center" cellspacing="2">
				<tr>
					<th>Book Id</th>
					<th>Name</th>
					<th>Author</th>
					<th>Shelf no</th>
					<th colspan="2">Action</th>
				</tr>
				<?php
				require 'db.php';
				require 'book.php';

				$db = new Database();
				$book = new product($db->connect());
				$data = $book->getRecords();
				
				while($row = $data->fetch(PDO::FETCH_ASSOC)){
				
				echo "<tr>";
				echo	"<td>$row[book_id]</td>";
				echo	"<td>$row[book_name]</td>";
				echo	"<td>$row[author]</td>";
				echo	"<td>$row[shelf_no]</td>";
				echo	"<td class='edit'><a href='updateon.php?book_id=$row[book_id]'>Edit</td>";
				echo	"<td class='delete' onclick='confirm_user(\"$row[book_id]\",\"$row[book_name]\")'>Delete</td>";
				echo "</tr>";
				}
				?>
			</table>
		</div>
		<script>
			function confirm_user(id, name){
				if(confirm("Do you want to delete the record of "+ name)){
					window.location="delete.php?book_id=" + id;
				}
			}
		</script>
<?php include 'footer.php';?>	