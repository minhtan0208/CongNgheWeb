<?php 
	
	session_start();

	// include db
	require_once('admin/pages/modules/config.php');


	if(isset($_SESSION['customer']) && isset($_SESSION['level']))
	{
		$email = $_SESSION['customer'];
		// get id customer
		$customer = "SELECT id_acc FROM account WHERE email = '$email'";
		$rs_customer = mysqli_query($conn, $customer);
		$row_customer = mysqli_fetch_array($rs_customer);


		// add cart
		if(isset($_GET['id_cart']))
		{
			$id_cart = $_GET['id_cart'];
			$del = "DELETE FROM cart WHERE id_cart = $id_cart";
			mysqli_query($conn, $del);
			echo "<script>location.href='gio-hang.php';</script>";
		}
	}
	else
	{
		echo "<script>location.href='index.php'</script>";
	}
?>