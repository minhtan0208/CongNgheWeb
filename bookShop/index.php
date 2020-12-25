<?php 
	
	// include 
	include('includes/header.php');
	include('includes/top.php');
	include('includes/top-content.php');
	
?>
			<div class="mid_content">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 padding-15">
							<div class="title_module_main">
								<h2>
									<a  title="Sản phẩm mới">Sản phẩm nổi bật</a>
								</h2>
							</div>
							<div class="product_main">
								<div class="owl-carousel owl-product">
	<?php 
                                
        $product = "SELECT sku_product, p.image as image, name_product, price, p.slug as slug, slug_type FROM product p, type_product tp, account a WHERE p.id_type = tp.id_type AND a.id_acc = p.author AND flag = 1 AND highlight = 1 ORDER BY date_upload DESC";
        $rs_product = mysqli_query($conn, $product);
        while ($row_product = mysqli_fetch_array($rs_product)) 
        {
    ?>
								    <div class="item">
								    	<div class="product_box">
								    		<div class="product_image">
								    			<img src="admin/pages/public/images/products/<?php echo $row_product['image']; ?>" alt="<?php echo $row_product['image']; ?>" title="<?php echo $row_product['name_product']; ?>" width="100%">
								    		</div>
								    		<div class="detail_product">
								    			<h2 class="product_name">
								    				<a href="san-pham/<?php echo $row_product['slug_type']; ?>/<?php echo $row_product['slug']; ?>-<?php echo $row_product['sku_product']; ?>.html">
								    					<?php 
															echo mb_substr($row_product['name_product'], 0, 50, 'UTF-8')."..."; 
														?>
								    				</a>
								    			</h2>
								    			<span class="price_box">
								    				<h4 class="price"><?php echo number_format($row_product['price']); ?>đ</h4>
								    				<a href="san-pham/<?php echo $row_product['slug_type']; ?>/<?php echo $row_product['slug']; ?>-<?php echo $row_product['sku_product']; ?>.html">Chi tiết</a>
								    			</span>
								    		</div>
								    	</div>
								    </div>
								    <!-- item -->
	<?php 
		}
	?>
								</div>
							</div>
						</div>
						
						<div class="col-lg-12 padding-30">
							<div class="title_module_main">
								<h2>
									<a title="Sản phẩm mới">Hàng mới về</a>
								</h2>
							</div>
							<div class="product_main">
								<div class="row">
	<?php 
                                
        $product2 = "SELECT sku_product, p.image as image, name_product, price, p.slug as slug, slug_type FROM product p, type_product tp, account a WHERE p.id_type = tp.id_type AND a.id_acc = p.author AND flag = 1 ORDER BY date_upload DESC LIMIT 16";
        $rs_product2 = mysqli_query($conn, $product2);
        while ($row_product2 = mysqli_fetch_array($rs_product2)) 
        {
    ?>
								    <div class="col-lg-3 col-6 pt-2 pb-2">
								    	<div class="product_box">
								    		<div class="product_image">
								    			<img src="admin/pages/public/images/products/<?php echo $row_product2['image']; ?>" alt="<?php echo $row_product2['image']; ?>" title="<?php echo $row_product2['name_product']; ?>" width="100%">
								    		</div>
								    		<div class="detail_product">
								    			<h2 class="product_name">
								    				<a href="san-pham/<?php echo $row_product2['slug_type']; ?>/<?php echo $row_product2['slug']; ?>-<?php echo $row_product2['sku_product']; ?>.html">
								    					<?php 
								    						echo mb_substr($row_product2['name_product'], 0, 50, 'UTF-8')."...";
								    					?>
								    				</a>
								    			</h2>
								    			<span class="price_box">
								    				<h4 class="price"><?php echo number_format($row_product2['price']); ?>đ</h4>
								    				<a href="san-pham/<?php echo $row_product2['slug_type']; ?>/<?php echo $row_product2['slug']; ?>-<?php echo $row_product2['sku_product']; ?>.html">Chi tiết</a>
								    			</span>
								    		</div>
								    	</div>
								    </div>
	<?php 
		}
	?>
								</div>
							</div>
						</div>
						<!-- col-lg-12 -->
						
						<!-- col-lg-12 -->
					</div>
					<!-- row -->
				</div>
				<!-- cotainer -->
			</div>
			<!-- middle content -->
			
						<!-- col-lg-12 -->
						
							<!-- col-lg-12 -->
							<div class="col-lg-12">
								
							</div>
							<!-- col-lg-12 -->
						</div>
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- bottom content -->
		</div>
		<!-- content -->
<?php 
	
	// footer
	include('includes/footer.php');
?>