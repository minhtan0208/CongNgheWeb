<?php 

	// include
	include('includes/header.php');
	include('includes/top.php');

	// get blog by id
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sql = "SELECT id_blog, b.image as image, title, date_upload, b.slug as slug, slug_type, typename, author, summary, name, view, content, tb.id_type as id_type FROM blog b, type_blog tb, account a WHERE b.id_type = tb.id_type AND a.id_acc = b.author AND flag = 1 AND id_blog = $id";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);

		// increase
		$view_current = $row['view'];
		$inc_view = $view_current + 1;
		$update_v = "UPDATE blog SET view = $inc_view WHERE id_blog = $id";
		mysqli_query($conn, $update_v); 
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
								<li><a href="loai-blog/<?php echo $row['slug_type'] ?>-<?php echo $row['id_type'] ?>-1.html"><?php echo $row['typename']; ?></a></li>
								<li><i class="fas fa-caret-right"></i></li>
								<li><?php echo $row['title']; ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="mid_content" style="background: #fff; margin-top: 0;">
				<div class="container">
					<div class="row">
						<!-- advertisement none -->
						<div class="col-lg-12 padding-30">
							<div class="product_main">
								<div class="row">
								    <div class="col-lg-9 col-xs-12">
								    	<div class="article_detail">
								    		<h1 class="article_title">
								    			<a href="blog.php?id=<?php echo $row['id_type_blog']; ?>" title="<?php echo $row['title']; ?>"> <?php echo $row['title']; ?> </a>
								    		</h1>
								    		<div class="content_day_blog padding-15">
							    				<span class="fix_left_blog pr-3">
							    					<i class="far fa-calendar-alt"></i>
							    					<span>
							    					<?php

							    					 	// get day
							    					 	$day = date('D', $time = strtotime($row['date_upload']) );

							    						if($day == "Mon")
							    						{
							    							echo "Thứ hai";
							    						}
							    						else if($day == "Tue")
							    						{
							    							echo "Thứ ba";
							    						}
							    						else if($day == "Wed")
							    						{
							    							echo "Thứ tư";
							    						}
							    						else if($day == "Thu")
							    						{
							    							echo "Thứ năm";
							    						}
							    						else if($day == "Fri")
							    						{
							    							echo "Thứ sáu";
							    						}
							    						else if($day == "Sat")
							    						{
							    							echo "Thứ bảy";
							    						}
							    						else
							    						{
							    							echo "Chủ nhật";
							    						}
							    					?>
							    					, 
							    					</span>
								    				<span class="news_home_content_short_time">
								    					<?php 
								    						$date = date_create($row['date_upload']);
								    						echo date_format($date, "d/m/Y");
								    					?>
								    				</span>
							    				</span>
							    				<span class="fix_left_blog">
							    					<i class="fas fa-user"></i>
							    					<span>Đăng bởi: </span>
								    				<span class="news_home_content_short_time">
								    					<strong> <?php echo $row['name']; ?> </strong>
								    				</span>
							    				</span>
							    				<span class="fix_left_blog ml-3">
							    					<i class="fas fa-eye"></i>
							    					<span>Lượt xem: </span>
								    				<span class="news_home_content_short_time">
								    					<strong> <?php echo number_format($row['view']); ?> </strong>
								    				</span>
							    				</span>
							    			</div>
							    			<!-- content_day_blog -->
							    			<div class="article_content">
							    				<div class="rte">
							    					<p><b><?php echo $row['summary']; ?></b></p>
							    					<p><?php echo $row['content']; ?></p>
							    				</div>
							    				<!-- rte -->
							    			</div>
							    			<!-- article content -->
								    	</div>
								    	<!-- article detail -->
								    	<div class="comment_facebook">
								    		<?php 
								    			$link = "chi-tiet-blog.php?id=".$id;
								    		?>
								    		<div class="fb-comments" data-href="<?php echo $link; ?>" data-width="100%" data-numposts="5"></div>
								    	</div>
								    </div>
								    <!-- col-lg-9 col-xs-12 -->
								    <div class="col-lg-3 col-xs-12">
								    	<?php include('includes/blog-relative.php'); ?>
								    	<div class="blog_aside">
								    		<h2 class="title_head">
								    			<span> Sản phẩm nổi bật </span>
								    		</h2>
	<?php

		// product highlight
		$product_hl = "SELECT sku_product, p.image as image, name_product, price, p.slug as slug, slug_type FROM product p, type_product tp, account a WHERE p.id_type = tp.id_type AND a.id_acc = p.author AND flag = 1 AND highlight = 1 ORDER BY date_upload DESC LIMIT 10";
        $rs_product_hl = mysqli_query($conn, $product_hl);
        while ($row_product_hl = mysqli_fetch_array($rs_product_hl)) 
        {
	?>
								    		<div class="product_item_small">
								    			<div class="left_item">
								    				<a href="san-pham/<?php echo $row_product_hl['slug_type']; ?>/<?php echo $row_product_hl['slug']; ?>-<?php echo $row_product_hl['sku_product']; ?>.html">
								    					<img src="admin/pages/public/images/products/<?php echo $row_product_hl['image']; ?>" alt="<?php echo $row_product_hl['image']; ?>" title="<?php echo $row_product_hl['name_product']; ?>">
								    				</a>
								    			</div>
								    			<div class="product_info">
								    				<h3>
								    					<a href="san-pham/<?php echo $row_product_hl['slug_type']; ?>/<?php echo $row_product_hl['slug']; ?>-<?php echo $row_product_hl['sku_product']; ?>.html" title="<?php echo $row_product_hl['name_product']; ?>">
								    					<?php echo mb_substr($row_product_hl['name_product'], 0, 35, 'UTF-8')."..."; ?>
								    					</a>
								    				</h3>
								    				<div class="price_box_mini">
								    					<span><?php echo number_format($row_product_hl['price']); ?>đ</span>
								    				</div>
								    			</div>
								    		</div>
								    		<!-- product_item_small -->
	<?php 
		}
	?>
								    	</div>
								    	<!-- product aside -->
								    </div>
								    <!-- col-lg-3 col xs-12 -->
								</div>
							</div>
						</div>
						<!-- col-lg-12 -->
					</div>
					<!-- row -->
				</div>
				<!-- cotainer -->
			</div>
			<!-- middle content -->
			<!-- bottom content -->
		</div>
		<!-- content -->
<?php 
	
	// footer
	include('includes/footer.php');
?>