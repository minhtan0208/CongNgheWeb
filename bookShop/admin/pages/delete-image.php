
<?php 

	// add db
    require_once('modules/config.php');
	
	if(isset($_GET['id']) && isset($_GET['id_product']))
	{
		$id = $_GET['id'];
		$id_product = $_GET['id_product'];
		$target_dir = "public/images/products/";

		// remove old file
		$image = "SELECT name_image FROM image WHERE id_image = $id";
		$rs_image = mysqli_query($conn, $image);
		$row_image = mysqli_fetch_array($rs_image);
		$old_image = $row_image['name_image'];
		$target_file = $target_dir . $old_image;

		if($old_image != "no-image.png")
		{
			unlink($target_file);
		}

		// delete record
		$del = "DELETE FROM image WHERE id_image = $id";
		mysqli_query($conn, $del);
		echo "<script>alert('Xóa thành công');</script>";
		echo "<script>location.href='anh-san-pham.php?id=".$id_product."';</script>";
	
	}
?>