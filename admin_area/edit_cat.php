<?php 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

include("includes/db.php"); 

if(isset($_GET['edit_cat'])){

	$cat_id = $_GET['edit_cat']; 
	
	$get_cat = "select * from categories where cat_id='$cat_id'";

	$run_cat = mysqli_query($con, $get_cat); 
	
	$row_cat = mysqli_fetch_array($run_cat); 
	
	$cat_id = $row_cat['cat_id'];
	$cat_title = $row_cat['cat_title'];
}


?>
<form action="" method="POST" style="padding: 80px;">
	<b style="font-family: 'Product Sans'; font-size: 20px; color: #FFFFF8;">UPDATE CATEGORY:</b>
	<input type="text" name="new_cat" value="<?php echo $cat_title; ?>" style="font-family: 'Product Sans';font-size: 18px" />
	<input type="submit" name="add_cat" value="Update Category" style="font-family: 'Product Sans';font-size: 20px"/>
</form>

<?php 

	include("includes/db.php"); 

	if(isset($_POST['add_cat'])){
		
		$update_id = $cat_id;

		$new_cat = $_POST['new_cat'];
	
		$update_cat = "update categories set cat_title='$new_cat' where cat_id='$update_id'";

		$run_cat = mysqli_query($con, $update_cat); 
	
			if($run_cat){
	
				echo "<script>alert('Category has been Updated!')</script>";
				echo "<script>window.open('index.php?view_cats','_self')</script>";
			}
	}

?>

<?php }?>