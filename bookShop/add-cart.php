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
		if(isset($_POST['add_cart']))
		{
			$sku_product = $_POST['sku_product'];
			$id_acc = $row_customer['id_acc'];

			// check user and product exists 
			// if user, product exists then increase 1 else and new record
			$exist = "SELECT id_customer, sku_product FROM cart WHERE id_customer = '$id_acc' AND sku_product = '$sku_product'";
			$rs_exist = mysqli_query($conn, $exist);
			$exist = mysqli_num_rows($rs_exist);
			
			if($exist > 0)
			{
				// increase qty product

				// get qty current of product
				$product = "SELECT qty FROM product WHERE sku_product = '$sku_product'";
				$rs_product = mysqli_query($conn, $product);
				$row_product = mysqli_fetch_array($rs_product);
				$qty_product = $row_product['qty'];

				// get qty current of cart
				$qty = "SELECT id_cart, qty FROM cart WHERE id_customer = '$id_acc' AND sku_product = '$sku_product'";
				$rs_qty = mysqli_query($conn, $qty);
				$row_qty = mysqli_fetch_array($rs_qty);
				$qty_current = $row_qty['qty'];
				$inc_qty = $qty_current + 1;

				if($inc_qty >= $qty_product)
				{
					// qty increase bigger qty product then set max qty product
					$update = "UPDATE cart SET qty = $qty_product WHERE id_customer = '$id_acc' AND sku_product = '$sku_product'";
					mysqli_query($conn, $update);
					echo "<script>alert('Thêm vào giỏ hàng thành công');</script>";
					echo "<script>location.href='chi-tiet-san-pham.php?id=".$sku_product."';</script>";
				}
				else
				{
					// qty increase smaller qty product then set qty increase
					$update = "UPDATE cart SET qty = $inc_qty WHERE id_customer = '$id_acc' AND sku_product = '$sku_product'";
					mysqli_query($conn, $update);
					echo "<script>alert('Thêm vào giỏ hàng thành công');</script>";
					echo "<script>location.href='chi-tiet-san-pham.php?id=".$sku_product."';</script>";
				}

			}
			else
			{
				// add new record
				// insert product to cart
				$ins = "INSERT INTO cart(id_customer, sku_product, qty) VALUES('$id_acc', '$sku_product', 1)";
				mysqli_query($conn, $ins);
				echo "<script>alert('Thêm vào giỏ hàng thành công');</script>";
				echo "<script>location.href='chi-tiet-san-pham.php?id=".$sku_product."';</script>";
			}
			// end check exists

		}
	}
	else
	{
		echo "<script>location.href='dang-nhap.html'</script>";
	}
?>