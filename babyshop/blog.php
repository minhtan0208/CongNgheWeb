<?php 

	// include
	include('includes/header.php');
	include('includes/top.php');

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$type = "SELECT id_type, typename, slug_type FROM type_blog WHERE id_type = $id";
		$rs_type = mysqli_query($conn, $type);
		$row_type = mysqli_fetch_array($rs_type);
		$slug_type = $row_type['slug_type'];

		// pagination
		// BƯỚC 2: TÌM TỔNG SỐ RECORDS
		$sql = "SELECT count(id_blog) as total FROM blog WHERE id_type = $id";
	    $result = mysqli_query($conn, $sql);
	    $row = mysqli_fetch_assoc($result);
	    $total_records = $row['total'];

	    // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
	    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	    $limit = 16;

	    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
	    // tổng số trang
	    $total_page = ceil($total_records / $limit);

	    // Giới hạn current_page trong khoảng 1 đến total_page
	    if ($current_page > $total_page){
	        $current_page = $total_page;
	    }
	    else if ($current_page < 1){
	        $current_page = 1;
	    }

	    // Tìm Start
	    $start = ($current_page - 1) * $limit;
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
								<li><?php echo $row_type['typename']; ?></li>
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
							<div class="title_module_main">
								<h2>
									<a href="loai-blog/<?php echo $row_type['slug_type']; ?>-<?php echo $row_type['id_type']; ?>-<?php echo $current_page; ?>.html" title="<?php echo $row_type['typename']; ?>"><?php echo $row_type['typename']; ?></a>
								</h2>
							</div>
							<div class="product_main">
								<div class="row">
								    <div class="col-lg-9 col-xs-12">
	<?php 
                                
        $blog = "SELECT id_blog, b.image as image, title, date_upload, b.slug as slug, slug_type, typename, author, summary, name FROM blog b, type_blog tb, account a WHERE b.id_type = tb.id_type AND a.id_acc = b.author AND b.id_type = $id AND flag = 1 ORDER BY date_upload DESC LIMIT $start, $limit";
        $rs_blog = mysqli_query($conn, $blog);
        while ($row_blog = mysqli_fetch_array($rs_blog))
        {
    ?>
								    	<div class="blog_item">
								    		<div class="image_blog_left">
								    			<a href="blog/<?php echo $row_blog['slug_type']; ?>/<?php echo $row_blog['slug']; ?>-<?php echo $row_blog['id_blog']; ?>.html">
								    				<img src="admin/pages/public/images/blogs/<?php echo $row_blog['image']; ?>" alt="<?php echo $row_blog['image']; ?>" title="<?php echo $row_blog['title']; ?>">
								    			</a>
								    		</div>
								    		<div class="content_right_blog">
								    			<div class="title_blog_home">
								    				<h3>
								    					<a href="blog/<?php echo $row_blog['slug_type']; ?>/<?php echo $row_blog['slug']; ?>-<?php echo $row_blog['id_blog']; ?>.html" title="<?php echo $row_blog['title']; ?>">
								    						<?php echo $row_blog['title']; ?>
								    					</a>
								    				</h3>
								    			</div>
								    			<div class="content_day_blog">
								    				<span class="fix_left_blog">
								    					<i class="far fa-calendar-alt"></i>
								    					<span>
								    				<?php

							    					 	// get day
							    					 	$day = date('D', $time = strtotime($row_blog['date_upload']) );

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
							    					?>, 
								    					</span>
									    				<span class="news_home_content_short_time">
									    					<?php 
									    						$date = date_create($row_blog['date_upload']);
									    						echo date_format($date, "d/m/Y");
									    					?>
									    				</span>
								    				</span>
								    			</div>
								    			<p class="blog_item_summary">
								    				<?php 
														echo mb_substr($row_blog['summary'], 0, 100, 'UTF-8')."..."; 
													?>
								    			</p>
								    		</div>
								    	</div>
								    	<!-- blog_item -->
	<?php 
		}
		// end while
	?>							    	

								    	<div class="clearfix"></div>
								    	<!-- content blog -->
										<ul class="pagination_list">
										<?php 

											// pagination
											if($current_page > 1)
											{
												
												echo "<li><a href='loai-blog/".$slug_type."-".$id."-1.html'><i class='fas fa-angle-double-left'></i></a></li>";

												echo "<li><a href='loai-blog/".$slug_type."-".$id."-".($current_page - 1).".html'><i class='fas fa-angle-left'></i></a></li>";
											}

											for($i = 1; $i <= $total_page; $i++)
											{
												if($current_page == $i)
												{
													echo "<li><a href='loai-blog/".$slug_type."-".$id."-".$i.".html' class='active'>".$i."</a></li>";
												}
												else
												{
													echo "<li><a href='loai-blog/".$slug_type."-".$id."-".$i.".html'>".$i."</a></li>";
												}
											}

											if($current_page < $total_page)
											{
												echo "<li><a href='loai-blog/".$slug_type."-".$id."-".($current_page + 1).".html'><i class='fas fa-angle-right'></i></a></li>";
												echo "<li><a href='loai-blog/".$slug_type."-".$id."-".($total_page).".html'><i class='fas fa-angle-double-right'></i></a></li>";
											}
										
										?>
										</ul>
										<!-- pagination -->
								    </div>
								    <!-- col-lg-9 col-xs-12 -->
								    <div class="col-lg-3 col-xs-12">
								    	<div class="sidebar_blog">
								    		<h2 class="title_head">
								    			<span> Danh mục tin tức </span>
								    		</h2>
								    		<ul class="aside_category">
		<?php 
                    
            $typeb = "SELECT * FROM type_blog WHERE id_type <> 25 AND id_type <> 26 ORDER BY typename DESC";
            $rs_typeb = mysqli_query($conn, $typeb);
            while ($row_typeb = mysqli_fetch_array($rs_typeb)) 
            {
        ?>
									    		<li><a href="loai-blog/<?php echo $row_typeb['slug_type']; ?>-<?php echo $row_typeb['id_type']; ?>-1.html"><?php echo $row_typeb['typename']; ?></a></li>
		<?php 
			}
			// end while
		?>
									    	</ul>
								    	</div>
								    	<!-- sidebar blog -->
								    	<div class="blog_aside">
								    		<h2 class="title_head">
								    			<span> Bài viết nổi bật</span>
								    		</h2>
	<?php
		
		// get id type in file chi-tiet-blog.php 
		$blog_hl = "SELECT id_blog, b.image as image, title, date_upload, b.slug as slug, slug_type, typename, author, summary, name, view, content FROM blog b, type_blog tb, account a WHERE b.id_type = tb.id_type AND a.id_acc = b.author AND flag = 1 AND highlight = 1 ORDER BY date_upload DESC LIMIT 10";
		$rs_blog_hl = mysqli_query($conn, $blog_hl);
		while ($row_blog_hl = mysqli_fetch_array($rs_blog_hl))
		{

	?>
								    		<div class="blog_list">
								    			<div class="loop_blog">
								    				<div class="thumb_left">
								    					<a href="blog/<?php echo $row_blog_hl['slug_type']; ?>/<?php echo $row_blog_hl['slug']; ?>-<?php echo $row_blog_hl['id_blog']; ?>.html">
								    						<img src="admin/pages/public/images/blogs/<?php echo $row_blog_hl['image']; ?>" alt="<?php echo $row_blog_hl['image']; ?>" title="<?php echo $row_blog_hl['title']; ?>">
								    					</a>
								    				</div>
								    				<!-- thumb_left -->
								    				<div class="name_right">
								    					<h3 class="text2line">
								    						<a href="blog/<?php echo $row_blog_hl['slug_type']; ?>/<?php echo $row_blog_hl['slug']; ?>-<?php echo $row_blog_hl['id_blog']; ?>.html" title="<?php echo $row_blog_hl['title']; ?>">
								    							<?php 
																	echo mb_substr($row_blog_hl['title'], 0,40, 'UTF-8')."..."; 
																?>
								    						</a>
								    					</h3>
								    					<div class="date">
								    						<i class="far fa-calendar-alt"></i>
								    						<span>
								    						<?php

									    					 	// get day
									    					 	$day = date('D', $time = strtotime($row_blog_hl['date_upload']) );

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
									    					?>, 
							    							</span>
								    						<span>
								    							<?php 
										    						$date = date_create($row_blog_hl['date_upload']);
										    						echo date_format($date, "d/m/Y");
										    					?>
								    						</span>
								    					</div>
								    				</div>
								    				<!-- name right -->
								    			</div>
								    		</div>
								    		<!-- blog list -->
	<?php 
		}
		// end while
	?>							    		
								    	</div>
								    	<!-- blog aside -->
								    	<div class="blog_aside">
								    		<h2 class="title_head">
								    			<span> Sản phẩm nổi bật </span>
								    		</h2>
	<?php

		// product highlight
		$product_hl = "SELECT sku_product, p.image as image, name_product, price FROM product p, type_product tp, account a WHERE p.id_type = tp.id_type AND a.id_acc = p.author AND flag = 1 AND highlight = 1 ORDER BY date_upload DESC LIMIT 10";
        $rs_product_hl = mysqli_query($conn, $product_hl);
        while ($row_product_hl = mysqli_fetch_array($rs_product_hl)) 
        {
	?>
								    		<div class="product_item_small">
								    			<div class="left_item">
								    				<a href="chi-tiet-san-pham.php?id=<?php echo $row_product_hl['sku_product']; ?>">
								    					<img src="admin/pages/public/images/products/<?php echo $row_product_hl['image']; ?>" alt="<?php echo $row_product_hl['image']; ?>" title="<?php echo $row_product_hl['name_product']; ?>">
								    				</a>
								    			</div>
								    			<div class="product_info">
								    				<h3><a href="chi-tiet-san-pham.php?id=<?php echo $row_product_hl['sku_product']; ?>" title="<?php echo $row_product_hl['name_product']; ?>">
								    					<?php 
															echo mb_substr($row_product_hl['name_product'], 0,40, 'UTF-8')."..."; 
														?>
								    				</a></h3>
								    				<div class="price_box_mini">
								    					<span><?php echo number_format($row_product_hl['price']); ?>đ</span>
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