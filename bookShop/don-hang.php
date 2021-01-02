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
								<li>Đơn hàng của bạn</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			              <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">STT</th>
                                                        <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Ngày đặt</th>
                                                        <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Tình trạng</th>
														<th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Xem chi tiết</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
    <?php 
        // invoice
        $invoice = "SELECT code_invoice, name, order_date, flag FROM invoice inv, account a WHERE inv.id_customer = a.id_acc and inv.id_customer = $id_acc ORDER BY order_date DESC";
        $rs_invoice = mysqli_query($conn, $invoice);
        $count = 0;
        while ($row_invoice = mysqli_fetch_array($rs_invoice)) 
        {
            $count++;
            $code_invoice = $row_invoice['code_invoice'];
            // total price
            $price = "SELECT dinv.qty as qty, price FROM detail_invoice dinv, product p WHERE dinv.sku_product = p.sku_product AND code_invoice = '$code_invoice'";
            $rs_price = mysqli_query($conn, $price);
            $total_price = 0;
            while($row_price = mysqli_fetch_array($rs_price))
            {
                $total_price += ($row_price['qty'] * $row_price['price']);
            }
    ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td>
                                                            <?php
                                                                $date = date_create($row_invoice['order_date']);
                                                                echo date_format($date, 'd/m/Y H:i:s');
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                if($row_invoice['flag'] == 0)
                                                                {
                                                                    echo "<span class='badge-dot badge-info mr-1'></span>Chờ xác nhận";
                                                                } 
                                                                else if($row_invoice['flag'] == 1)
                                                                {
                                                                    echo "<span class='badge-dot badge-brand mr-1'></span>Đang giao";
                                                                }
                                                                else if($row_invoice['flag'] == 2)
                                                                {
                                                                    echo "<span class='badge-dot badge-success mr-1'></span>Giao thành công";
                                                                }
                                                                else if($row_invoice['flag'] == 3)
                                                                {
                                                                    echo "<span class='badge-dot badge-dark mr-1'></span>Đã thu hồi";
                                                                }
                                                            ?>
                                                        </td>
														<td>
                                                        <a href="chi-tiet-don-hang.php?code_invoice=<?php echo $row_invoice['code_invoice']; ?>&delivery" class="btn btn-outline-info" title="Xem chi tiết đơn hàng">
                                                            Chi tiết
                                                        </a>
                                                    </td>
                                                    </tr>
    <?php 
        }
        // end while
    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->
	
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
		
				<div class="btn_cart_mobile">
					<a href="thanh-toan.html">
						<button class="btn btn-primary button btn-proceed-checkout" title="Xác nhận đơn hàng"><span>Xác nhận mua sách</span></button>
					</a>
					<a href="trang-chu.html">
						<button class="btn btn-white f-left" title="Tiếp tục mua hàng" type="submit"><span>Tiếp tục mua hàng</span></button>
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
		<!--Tong tien-->
		
                  
               
<?php 
	
	// footer
	include('includes/footer.php');
?>