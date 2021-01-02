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
    if(isset($_GET['code_invoice']))
        {
            $code_invoice = $_GET['code_invoice'];
            $invoice = "SELECT code_invoice, info_receive, info_product, name, phone, address FROM invoice inv, account a WHERE inv.id_customer = a.id_acc AND code_invoice = '$code_invoice'";
            $rs_invoice = mysqli_query($conn, $invoice);
            $row_invoice = mysqli_fetch_array($rs_invoice);
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
			              <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content " >
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header" >
                                
                                <!--
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                -->
                                
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                
            <?php 
                if(!isset($_GET['delivery']))
                {
            ?>
                                <div class="card-footer">
                                    <a href="chi-tiet-don-hang.php?confirm=<?php echo $row_invoice['code_invoice']; ?>" class="btn btn-primary btn-block">
                                        Xác nhận đơn hàng
                                    </a>
                                    <a href="chi-tiet-don-hang.php?cancel=<?php echo $row_invoice['code_invoice']; ?>" class="btn btn-danger btn-block" onclick="return confirm('Đơn hàng này sẽ được hủy. Đồng ý?')">
                                        Hủy đơn hàng
                                    </a>
                                </div>
            <?php 
                }
                // end check
            ?>
                            </div>
                            <!-- card -->
                        </div>
                        <!-- col-lg-12 -->
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Chi tiết đơn hàng
                                </h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Ảnh sản phẩm</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Tên sản phẩm</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Đơn giá</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Số lượng</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
        <?php 
            
            $detail_invoice = "SELECT dinv.sku_product as sku_product, image, name_product, p.price as price, dinv.qty as qty FROM detail_invoice dinv, product p WHERE dinv.sku_product = p.sku_product AND code_invoice = '$code_invoice'";
            $rs_detail_invoice = mysqli_query($conn, $detail_invoice);
            $total_money = 0;
            while ($row_detail_invoice = mysqli_fetch_array($rs_detail_invoice)) 
            {
                $money = $row_detail_invoice['qty'] * $row_detail_invoice['price'];
                $total_money += $money;

        ?>
                                                <tr>
                                                    
                                                    <td><img src="public/images/products/<?php echo $row_detail_invoice['image']; ?>" width="80"></td>
                                                    <td><?php echo $row_detail_invoice['name_product']; ?></td>
                                                    <td width="15%"><?php echo number_format($row_detail_invoice['price']); ?>đ</td>
                                                    <td><?php echo number_format($row_detail_invoice['qty']); ?></td>
                                                    
                                                </tr>
        <?php 
            }

            // end while
        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                <!-- card-body -->
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-3 float-right text-cente">
                                            <h4 style="font-family: 'Roboto Condensed', sans-serif;">Tổng giá trị đơn hàng: <h2 style="font-family: 'Roboto Condensed', sans-serif;"><b><?php echo number_format($total_money); ?>vnđ</b></h2></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->
                        </div>
                        <!-- col-lg-12 -->
                    </div>
                </div>
            </div>
	
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