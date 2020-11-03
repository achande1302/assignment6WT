<?php include 'header.php';?>
	<div id="sub-head">
		<h2>Add Records</h2>
	</div>
	<div id="main-body" style="text-align: left">
		<form action="add.php" method="post">
			<table align="center" cellspacing="2">
				<tr>
					<td>Book id</td>
					<td><input type="number" name="id" id="id"></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" id="name"></td>
				</tr>
				<tr>
					<td>Author</td>
					<td><input type="text" name="author" id="author"></td>
				</tr>
				<tr>
					<td>Shelf number</td>
					<td><input type="number" name="shelf_no" id="shelf_no" max="50" step="1"></td>
				</tr>
				<tr>
					<td class="button" colspan="2" align="center">
						<br>
						<input type="submit" value="Add">
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
<?php include 'footer.php';?>	