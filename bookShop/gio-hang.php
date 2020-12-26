<?php 
	
	// include
	include('includes/header.php');
	include('includes/top.php');

	// check session exists
	if(isset($customer) && isset($level))
	{
		// get data customer
		$customer = "SELECT id_acc FROM account WHERE email ='$customer'";
		$rs_customer = mysqli_query($conn, $customer);
		$row_customer = mysqli_fetch_array($rs_customer);
		$id_acc = $row_customer['id_acc'];
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
								<li>Giỏ hàng của bạn</li>
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
									<span>Vui lòng <a href="dang-nhap.html"> đăng nhập </a> để mua sách</span>
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
									<span>(Chưa có sản phẩm nào) </span>
									<span>Nhấn vào <a href="trang-chu.html"> Cửa hàng </a> để mua sách</span>
								</div>
							</div>
		<?php 
			}
			else
			{
		?>
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
													<a href="delete-cart.php?id_cart=<?php echo $row_datacart['id_cart']; ?>" class="delete_cart">
														<i class="far fa-trash-alt"></i> 
														Xóa sản phẩm
													</a>
												</td>
												<td class="text-center">
													<?php echo number_format($row_datacart['price']); ?>đ
												</td>
												<td class="text-center">
													<form action="update-qty.php" method="POST">
														<div class="form-group">
															<input type="hidden" name="id_cart" value="<?php echo $row_datacart['id_cart']; ?>">
		                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="qty" value="<?php echo $row_datacart['qty_cart']; ?>" style="float: left; width: 50%; margin: 0 auto; vertical-align: middle;">
		                                                    <button type="submit" class="btn btn-outline-info" name="update_qty">
		                                                    	<i class="far fa-save"></i>
		                                                	</button>
		                                                </div>
	                                                </form>
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
									<!-- table_total -->
									<ul class="checkout">
										<li>
											<a href="trang-chu.html">
												<button class="btn btn-white f-left" title="Tiếp tục mua hàng" type="submit"><span>Tiếp tục mua hàng</span></button>
											</a>
											<a href="thanh-toan.html">
												<button class="btn btn-primary button btn-proceed-checkout" title="Xác nhận đơn hàng"><span>Xác nhận mua sách</span></button>
											</a>
										</li>
									</ul>
									<!-- checkout -->
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
			
	<?php 

		// check session
		if(isset($customer) && isset($level))
		{
			// check cart have product?
			$cart = "SELECT id_customer FROM cart WHERE id_customer = '$id_acc'";
			$rs_cart = mysqli_query($conn, $cart);

			if(mysqli_num_rows($rs_cart) != 0)
			{

	?>
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
					<div class="delete_cart_icon">
						<a href="delete-cart.php?id_cart=<?php echo $row_datacart_mb['id_cart']; ?>"><i class="far fa-trash-alt"></i></a>
					</div>
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
			// end while
		?>
				<div class="cost_total_mb">
					TỔNG TIỀN <span class="cost_right_mb">
						<?php echo number_format($total_money_mb); ?>đ
					</span>
				</div>
				<div class="btn_cart_mobile">
					<a href="thanh-toan.html">
						<button class="btn btn-primary button btn-proceed-checkout" title="Xác nhận đơn hàng"><span>Xác nhận mượn sách</span></button>
					</a>
					<a href="trang-chu.html">
						<button class="btn btn-white f-left" title="Tiếp tục mua hàng" type="submit"><span>Tiếp tục chọn sách</span></button>
					</a>
				</div>
			</div>
			<!-- cart_mobile_page lg_hidden -->
	<?php
			}
			// end check product
		}
		// end check session
	?>
		</div>
		<!-- content -->
<?php 
	
	// footer
	include('includes/footer.php');
?>