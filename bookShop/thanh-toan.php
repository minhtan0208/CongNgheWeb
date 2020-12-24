<?php 
	
	// include
	include('includes/header.php');
	include('includes/top.php');

	// check session exists
	if(isset($customer) && isset($level))
	{
		// get data customer
		$customer = "SELECT id_acc, name, phone, address FROM account WHERE email ='$customer'";
		$rs_customer = mysqli_query($conn, $customer);
		$row_customer = mysqli_fetch_array($rs_customer);
		$id_acc = $row_customer['id_acc'];
		$name_customer = $row_customer['name'];
		$phone_customer = $row_customer['phone'];
		$address_customer = $row_customer['address'];
	}
?>
		<div id="content">
			<!-- top slider none -->
			<div class="breadcrumb_me">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<ul class="breadcrumb_list">
								<li><a href="trang-chu.html">Trang chủ</a></li>
								<li><i class="fas fa-caret-right"></i></li>
								<li><a href="gio-hang.html">Giỏ hàng của bạn</a></li>
								<li><i class="fas fa-caret-right"></i></li>
								<li>Xác nhận</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="mid_content">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-sm-pd-0">
	<?php 
		// check session exists
		if(!isset($customer) && !isset($level))
		{
	?>
							<div class="cart_login">
								<div class="title_cart">
									<h3>CHƯA ĐĂNG NHẬP TÀI KHOẢN</h3>
									<span>Vui lòng <a href="dang-nhap.php"> đăng nhập </a> để mượn</span>
								</div>
							</div>
							<!-- cart_login -->
	<?php 
		}
		else
		{
			// check cart have product?
			$cart = "SELECT id_customer FROM cart WHERE id_customer = '$id_acc'";
			$rs_cart = mysqli_query($conn, $cart);

			if(mysqli_num_rows($rs_cart) == 0)
			{
	?>
							<div class="cart_login">
								<div class="title_cart">
									<h3>GIỎ HÀNG CỦA BẠN</h3>
									<span>(Chưa có sản phẩm nào) nhấn vào <a href="index.php"> Cửa hàng </a> để chọn sách</span>
								</div>
							</div>
		<?php 
			}
			else
			{
		?>
							<div class="cart_login">
								<div class="title_cart">
									<h3>THÔNG TIN ĐẶT HÀNG</h3>
									<div class="form-group">
										<span><i class="fas fa-user-alt"></i> <?php echo $name_customer; ?></span>
									</div>
									<div class="form-group">
										<span for="exampleInputEmail1"><i class="fas fa-phone"></i> <?php echo $phone_customer; ?></span>
									</div>
									<div class="form-group">
										<span for="exampleInputEmail1"><i class="fas fa-map-marked-alt"></i> <?php echo $address_customer; ?></span>
									</div>
									<form action="payment.php" method="POST">
										<div class="form-group">
										    <label for="exampleInputEmail1">Ghi chú thêm về đơn đặt hàng(Thay đổi địa chỉ, người nhận hàng) :</label>
										    <textarea class="form-control" name="info_receive"><?php if(isset($info_receive)){ echo $info_receive; } ?></textarea>
										</div>
										
										<button type="submit" class="btn btn-primary" name="payment_cart">Đặt hàng</button>
									</form>
								</div>
							</div>
							<!-- cart empty products -->
							<div class="cart_panel sm_hidden">
								<div class="title_cart">
									<h3>GIỎ HÀNG CỦA BẠN 
										<span> 
										<?php 
											$qty = "SELECT sum(qty) as tong FROM cart WHERE id_customer = '$id_acc'";
											$rs_qty = mysqli_query($conn, $qty);
											$row_qty = mysqli_fetch_array($rs_qty);
											echo "( ".$row_qty['tong']." sản phẩm )";
										?>
										</span>
									</h3>
								</div>
								<div class="cart_desktop_page">
									<table class="table_cart">
										<thead>
											<tr>
												<th width="15%">Ảnh sản phẩm</th>
												<th width="40%">Tên sản phẩm</th>
												<th width="15%">Đơn giá</th>
												<th width="15%">Số lượng</th>
												<th width="15%">Giá sách</th>
											</tr>
										</thead>
										<tbody>
		<?php 

			// show data cart
			$datacart = "SELECT id_cart, image, name_product, price, c.qty as qty_cart FROM cart c, product p WHERE c.sku_product = p.sku_product AND id_customer = '$id_acc'";
			$rs_datacart = mysqli_query($conn, $datacart);
			$total_money = 0;
			while ($row_datacart = mysqli_fetch_array($rs_datacart)) 
			{
				$money = $row_datacart['qty_cart'] * $row_datacart['price'];
				$total_money += $money;
		?>
											<tr>
												<td class="image_product_table">
													<img src="admin/pages/public/images/products/<?php echo $row_datacart['image']; ?>" alt="<?php echo $row_datacart['image']; ?>" title="<?php echo $row_datacart['name_product']; ?>">
												</td>
												<td>
													<?php echo $row_datacart['name_product']; ?>
												</td>
												<td class="text-center">
													<?php echo number_format($row_datacart['price']); ?>đ
												</td>
												<td class="text-center">
													<?php echo $row_datacart['qty_cart']; ?>
												</td>
												<td class="text-center">
													<?php echo number_format($money); ?>đ
												</td>
											<tr>
		<?php 
			}
			// end show data cart
		?>									
										</tbody>
									</table>
									<!-- table desktop -->
									<table class="table_cart table_total">
										<thead>
											<tr>
												
											</tr>
										</thead>
										<tbody>
											
										</tbody>
									</table>
									<div class="clearfix"></div>
								</div>
								<!-- cart_desktop_page -->
							</div>
							<!-- cart table -->

	<?php 
			}
			// end check product have?
		}
		// end check session
	?>
						</div>
						<!-- col-lg-12 -->
					</div>
					<!-- row -->
				</div>
				<!-- cotainer -->
			</div>
			<div class="cart_mobile_page lg_hidden">
	<?php 

		// show data cart
		$datacart_mb = "SELECT id_cart, image, name_product, price, c.qty as qty_cart FROM cart c, product p WHERE c.sku_product = p.sku_product AND id_customer = '$id_acc'";
		$rs_datacart_mb = mysqli_query($conn, $datacart_mb);
		$total_money_mb = 0;
		while ($row_datacart_mb = mysqli_fetch_array($rs_datacart_mb)) 
		{
			$money_mb = $row_datacart_mb['qty_cart'] * $row_datacart_mb['price'];
			$total_money_mb += $money_mb;
	?>
				<div class="cart_mobile_item">
					<div class="image_cart_mb">
						<img src="admin/pages/public/images/products/<?php echo $row_datacart_mb['image']; ?>">
					</div>
					<div class="title_cart_mb">
						<a href="#"><?php echo $row_datacart_mb['name_product']; ?></a>
					</div>
					<div class="form_cart_mb">
					 	<div class="cost_cart_mb">
							Số lượng: <?php echo number_format($row_datacart_mb['qty_cart']); ?>
						</div>
				   		<div class="cost_cart_mb">
							Giá: 
							<span> 
								<?php echo number_format($row_datacart_mb['price']); ?>đ 
							</span>
						</div>
					</div>
				</div>
				<!-- cart_mobile_item -->
	<?php 
		}
		// end while cart mobile
	?>
				<div class="cost_total_mb">
					TỔNG TIỀN <span class="cost_right_mb">
						<?php echo number_format($total_money_mb); ?>đ
					</span>
				</div>
			</div>
			<!-- cart_mobile_page -->
		</div>
		<!-- content -->
<?php 
	
	// footer
	include('includes/footer.php');
?>