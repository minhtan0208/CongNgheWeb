<?php 
	
	// includes
	include('includes/header.php');
	include('includes/top.php');

	// show data product
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$data = "SELECT sku_product, tp.id_type as id_type,  typename, p.image as image, name_product, date_upload, p.slug as slug, slug_type, typename, author, summary, price, view, qty FROM product p, type_product tp, account a WHERE p.id_type = tp.id_type AND a.id_acc = p.author AND flag = 1 AND sku_product = '$id'";
		$rs_data = mysqli_query($conn, $data);
		$row_data = mysqli_fetch_array($rs_data);

		// increase view
		$view_inc = $row_data['view'] + 1;
		$update_view = "UPDATE product SET view = $view_inc WHERE sku_product = '$id'";
		mysqli_query($conn, $update_view);
	}

?>
		<div id="content">
			<!-- top slider none -->
			<div class="breadcrumb_me">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<ul class="breadcrumb_list">
								<li><a href="trang-chu.html"> Trang chủ </a></li>
								<li><i class="fas fa-caret-right"></i></li>
								<li><a href="loai-san-pham/<?php echo $row_data['slug_type']; ?>-<?php echo $row_data['id_type']; ?>-1.html"><?php echo $row_data['typename']; ?></a></li>
								<li><i class="fas fa-caret-right"></i></li>
								<li><?php echo $row_data['name_product']; ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="mid_content">
				<div class="main_detail">
					<div class="container padding-heading">
						<div class="row">
							<!-- advertisement none -->
							<div class="col-lg-9">
								<div class="row">
									<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
										<div class="col_large_default large_image image_thumb">
											<img src="admin/pages/public/images/products/<?php echo $row_data['image']; ?>" id="img-container">
										</div>
										<!-- large_image -->
										<div class="product_detail_thumb">
											<div class="owl-carousel owl-product-thumb">
												<div class="item image_thumb">
													<img onclick="change_img(this)" src="admin/pages/public/images/products/<?php echo $row_data['image']; ?>">
												</div>
					<?php

						$image = "SELECT name_image FROM image WHERE sku_product = '$id'";
						$rs_image = mysqli_query($conn, $image);
						while ($row_image = mysqli_fetch_array($rs_image)) 
						{
					?>
												<div class="item image_thumb">
													<img  onclick="change_img(this)" src="admin/pages/public/images/products/<?php echo $row_image['name_image']; ?>">
												</div>
					<?php 
						}
						// end while
					?>
											</div>
										</div>
									</div>
									<div class="col-lg-7 col-md-6 col-sm-6 col-xs-12">
										<h1 class="title_product"><?php echo $row_data['name_product']; ?></h1>
										<div class="group_status">
											<span class="first_status"><i class="fas fa-eye"></i> Lượt xem:
												<span class="status_name">
													<?php echo $row_data['view']; ?>
												</span>
											</span>
											<span class="first_status">
												<span class="space">&nbsp; | &nbsp;</span>
												<i class="fas fa-warehouse"></i> Kho:
												<span class="status_name availabel">
													<?php
														if($row_data['qty'] > 0)
														{
															echo $row_data['qty']; 
														}
														else
														{
															echo "Hết hàng";
														}
													?>
												</span>
											</span>
										</div>
										<!-- group_status -->
										
										<!-- reviews_details_product -->
										<div class="price_box">
											<span class="price"> Giá: 
												<span class="special_price">
													<?php echo number_format($row_data['price']); ?>đ 
												</span> 
											</span>
										</div>
										<!-- price box -->
										<!--<div class="product_summary product_description">
											<div class="rte description">
												<p>
													<?php echo $row_data['summary']; ?>
												</p>
											</div>
											<a href="san-pham/<?php echo $row_data['slug_type']; ?>/<?php echo $row_data['slug']; ?>-<?php echo $row_data['sku_product']; ?>.html#view-more" title="Xem tiếp" class="see_detail">[Xem tiếp]</a>
										</div>-->
										<!-- product summary -->
										<div class="btn_buy_cart">
											<?php
												if($row_data['qty'] > 0)
												{
											?>
													<form action="add-cart.php" method="POST">
														<input type="hidden" name="sku_product" value="<?php echo $row_data['sku_product']; ?>">
														<button type="submit" class="btn btn-lg  btn-cart button_cart_buy_enable add_to_cart btn_buy" title="Thêm vào giỏ hàng" name="add_cart"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ</button>
													</form>
											<?php
												}
												else
												{
													echo "<button type='submit' class='btn btn-lg  btn-cart button_cart_buy_enable add_to_cart btn_buy' disabled><i class='fas fa-shopping-cart'></i> Thêm vào giỏ hàng</button>";
												}
											?>
											
										</div>
										<!-- btn_buy_cart -->
										<div class="call_now">
											<p style="color:#d7102c;font-weight:bold;">Gọi ngay : (039) xxxxx để có được giá tốt nhất!</p>
										</div>
									</div>
									<!-- col-lg-7 -->
									<div class="col-xs-12 col-lg-12 col-sm-12 col-md-12 no-padding">
										<div class="product-tab e-tabs" id="app-tabs">
											<ul class="tabs tabs-title clearfix">
												<li class="tab-link selection" id="selecttab1">
													<h3 id="view-more">
														<span id="tab1btn" @click="tab1btn">Mô tả</span>
													</h3>
												</li>
												
											</ul>
											<!-- tab-link -->
											<div class="tab tab-1 tab_content" v-if="tab1">
												<?php echo $row_data['summary']; ?>
											</div>
											<!-- tab1 -->
											<div class="tab tab-2 tab_content" v-if="tab2">
												<h6> Các nội dung hướng dẫn mua hàng viết ở đây </h6>
											</div>
											<!-- tab2 -->
											<div class="tab tab-3 tab_content" v-if="tab3">
												<div class="rte">
													<div id="huy_product_reviews">
														<div class="title_bl">
															Đánh giá sản phẩm
														</div>
														<div class="product-reviews-summary-actions">
															<input type="button" id="btnnewreview" value="Viết đánh giá">
														</div>
													</div>
												</div>
											</div>
											<!-- tab3 -->
										</div>
										<!-- product-tab -->
									</div>
									<!-- col-lg-12 -->
								</div>
								<!-- row -->
							</div>
							<!-- col-lg-9 -->
							<div class="col-lg-3">
								<div class="wrap_module_service padding-15">
									<div class="item_service">
										<div class="wrap_item">
											<div class="image_service">
												<img src="public/images/productdetail-icon5.png">
											</div>
											<div class="content_service">
												<p>Giao hàng nhanh chóng</p>
												<span>Chỉ trong vòng 24h đồng hồ</span>
											</div>
										</div>
									</div>
									<div class="item_service">
										<div class="wrap_item">
											<div class="image_service">
												<img src="public/images/productdetail-icon4.png">
											</div>
											<div class="content_service">
												<p>Sản phẩm chính hãng</p>
												<span>Sản phẩm nhập khẩu 100%</span>
											</div>
										</div>
									</div>
									<div class="item_service">
										<div class="wrap_item">
											<div class="image_service">
												<img src="public/images/productdetail-icon3.png">
											</div>
											<div class="content_service">
												<p>Đổi trả cực kì dễ dàng</p>
												<span>Đổi trả trong 2 ngày đầu tiên</span>
											</div>
										</div>
									</div>
									<div class="item_service">
										<div class="wrap_item">
											<div class="image_service">
												<img src="public/images/productdetail-icon1.png">
											</div>
											<div class="content_service">
												<p>Mua hàng tiết kiệm</p>
												<span>Tiết kiệm từ 10% - 30%</span>
											</div>
										</div>
									</div>
								</div>
								<!-- wrap_module_service -->
								<div class="blog_aside padding-15">
						    		<h2 class="title_head">
						    			<span> Có thể bạn thích </span>
						    		</h2>
	<?php 

		$id_type = $row_data['id_type'];

		$product_rela = "SELECT sku_product, typename, p.image as image, name_product, date_upload, p.slug as slug, slug_type, typename, author, summary, price FROM product p, type_product tp, account a WHERE p.id_type = tp.id_type AND a.id_acc = p.author AND flag = 1  AND p.id_type = $id_type AND sku_product <> '$id'";
		$rs_product_rela = mysqli_query($conn, $product_rela);
		for ($i = 0; $i < 1; $i++){
			$row_product_rela = mysqli_fetch_array($rs_product_rela);
		//while($row_product_rela = mysqli_fetch_array($rs_product_rela))	{
	?>
						    		<div class="product_item_small">
						    			<div class="left_item">
						    				<a href="san-pham/<?php echo $row_product_rela['slug_type']; ?>/<?php echo $row_product_rela['slug']; ?>-<?php echo $row_product_rela['sku_product']; ?>.html">
						    					<img src="admin/pages/public/images/products/<?php echo $row_product_rela['image']; ?>" alt="<?php echo $row_product_rela['image']; ?>" title="<?php echo $row_product_rela['name_product']; ?>">
						    				</a>
						    			</div>
						    			<div class="product_info">
						    				<h3><a href="san-pham/<?php echo $row_product_rela['slug_type']; ?>/<?php echo $row_product_rela['slug']; ?>-<?php echo $row_product_rela['sku_product']; ?>.html" title="<?php echo $row_product_rela['name_product']; ?>"><?php echo mb_substr($row_product_rela['name_product'], 0, 35, 'UTF-8')."..."; ?></a></h3>
						    				<div class="price_box_mini">
						    					<span><?php echo number_format($row_product_rela['price']); ?>đ</span>
						    				</div>
						    			</div>
						    		</div>
	<?php 
		}
		// end while
	?>
						    	</div>
						    	<!-- product aside -->
							</div>
							<!-- col-lg-3 -->
						</div>
						<!-- row -->
					</div>
					<!-- container -->
				</div>
				<!-- main detail -->
				<div class="relative_box">
					<div class="container padding-heading">
						<div class="row">
							<div class="col-lg-12">
								<h2 class="title_rela">Sản phẩm cùng loại</h2>
								<div class="owl-carousel owl-product-rela">
	<?php 

		$id_type = $row_data['id_type'];

		$product_rela = "SELECT sku_product, typename, p.image as image, name_product, date_upload, p.slug as slug, slug_type, typename, author, summary, price FROM product p, type_product tp, account a WHERE p.id_type = tp.id_type AND a.id_acc = p.author AND flag = 1  AND p.id_type = $id_type AND sku_product <> '$id'";
		$rs_product_rela = mysqli_query($conn, $product_rela);
		while($row_product_rela = mysqli_fetch_array($rs_product_rela))	
		{
	?>	
									<div class="item">
										<div class="product_box">
								    		<div class="product_image">
								    			<img src="admin/pages/public/images/products/<?php echo $row_product_rela['image']; ?>" alt="<?php echo $row_product_rela['image']; ?>" title="<?php echo $row_product_rela['name_product']; ?>" width="100%">
								    		</div>
								    		<div class="detail_product">
								    			<h2 class="product_name">
								    				<a href="san-pham/<?php echo $row_product_rela['slug_type']; ?>/<?php echo $row_product_rela['slug']; ?>-<?php echo $row_product_rela['sku_product']; ?>.html">
								    					<?php echo mb_substr($row_product_rela['name_product'], 0, 32, 'UTF-8')."..."; ?>
								    				</a>
								    				<span class="price_box  mt-2 mb-2">
									    				<h4 class="price"><?php echo number_format($row_product_rela['price']); ?>đ</h4>
									    			</span>
								    			</h2>
								    			
								    		</div>
								    	</div>
								    	<!-- product box -->
									</div>
									<!-- item -->
	<?php 
		}
		// end while
	?>							
								</div>
							</div>
							<!-- col-lg-12 -->
						</div>
						<!-- row -->
					</div>
					<!-- container -->
				</div>
				<!-- relative box -->
			</div>
			<!-- middle content -->
		</div>
		<!-- content -->
<?php 
	
	// footer
	include('includes/footer.php');
?>