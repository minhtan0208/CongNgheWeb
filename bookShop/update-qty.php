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
		if(isset($_POST['update_qty']))
		{
			$id_cart = $_POST['id_cart'];
			$qty = $_POST['qty'];

			// get sku_product
			$p = "SELECT sku_product FROM cart WHERE id_cart = $id_cart";
			$rs_p = mysqli_query($conn, $p);
			$row_p = mysqli_fetch_array($rs_p);
			$sku_product = $row_p['sku_product'];

			// set max qty if qty request bigger
			$qty_product = "SELECT qty FROM product WHERE sku_product = '$sku_product'";
			$rs_product = mysqli_query($conn, $qty_product);
			$row_product = mysqli_fetch_array($rs_product);
			$qty_current = $row_product['qty'];
			
			
			if($qty == 0){
				echo "<script>alert('Vui lòng mua số lượng lớn hơn 0');</script>";
				echo "<script>location.href='gio-hang.html';</script>";
			}
			else{
				if($qty >= $qty_current)
				{
					// update qty cart
					$update = "UPDATE cart SET qty = $qty_current WHERE id_cart = $id_cart";
					mysqli_query($conn, $update);
					echo "<script>location.href='gio-hang.php';</script>";
				}
				else
				{
					// update qty cart
					$update = "UPDATE cart SET qty = $qty WHERE id_cart = $id_cart";
					mysqli_query($conn, $update);
					echo "<script>location.href='gio-hang.html';</script>";
				}
			}
		}
	}
	else
	{
		echo "<script>location.href='trang-chu.html'</script>";
	}
?>