
<?php 
		
	// count qty product by type
	// count girl product
	$girl = "SELECT count(sku_product) as total FROM product WHERE id_type = 7 AND flag = 1";
	$rs_girl = mysqli_query($conn, $girl);
	$row_girl = mysqli_fetch_array($rs_girl);
	$total_girl = $row_girl['total'];

	// count boy product
	$boy = "SELECT count(sku_product) as total FROM product WHERE id_type = 1 AND flag = 1";
	$rs_boy = mysqli_query($conn, $boy);
	$row_boy = mysqli_fetch_array($rs_boy);
	$total_boy= $row_boy['total'];

	// count new-born product
	$new_born = "SELECT count(sku_product) as total FROM product WHERE id_type = 10 AND flag = 1";
	$rs_new_born = mysqli_query($conn, $new_born);
	$row_new_born = mysqli_fetch_array($rs_new_born);
	$total_new_born = $row_new_born['total'];
?>

				<!-- navbar mobile -->
				<div class="slider">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					  	<div class="carousel-inner">
	<?php 
		// get slider active
		$slider_ac = "SELECT id_slider, image, link FROM slider ORDER BY id_slider DESC LIMIT 1";
		$rs_slider_ac = mysqli_query($conn, $slider_ac);
		$row_slider_ac = mysqli_fetch_array($rs_slider_ac);
		$id_slider_ac = $row_slider_ac['id_slider'];
	?>
						    <div class="carousel-item active">
						    	<a href="<?php echo $row_slider_ac['link']; ?>">
						      		<img class="d-block w-100" src="admin/pages/public/images/sliders/<?php echo $row_slider_ac['image']; ?>" alt="<?php echo $row_slider_ac['image']; ?>">
						      	</a>
						    </div>
	<?php

		// get slider active
		$slider = "SELECT image, link FROM slider WHERE id_slider <> $id_slider_ac ORDER BY id_slider DESC";
		$rs_slider = mysqli_query($conn, $slider);
		while($row_slider = mysqli_fetch_array($rs_slider))
		{
	?>
						    <div class="carousel-item">
						    	<a href="<?php echo $row_slider['link']; ?>">
						      		<img class="d-block w-100" src="admin/pages/public/images/sliders/<?php echo $row_slider['image']; ?>" alt="<?php echo $row_slider['image']; ?>">
						      	</a>
						    </div>
	<?php 
		}
		// end slider
	?>
					  	</div>
					  	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    	<span class="sr-only">Previous</span>
					 	</a>
					  	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
					    	<span class="sr-only">Next</span>
					  	</a>
					</div>
				</div>
				<!-- slider -->
			</div>
			<!-- bot header -->
		</div>
		<!-- header -->
		<div id="content">
			<div class="top_content">
				<div class="container">
					<div class="row">
						<div class="col-4 sm_hidden">
							<div class="box">
								<a href="loai-san-pham/Do-be-trai-1-1.html">
									<div class="figure">
										<img src="public/images/tieuthuyet.jpg">
										<div class="caption">
											<div class="about">
												<h2>Sách Tiểu Thuyết</h2>
												<p>Cập nhật những quyển tiểu Thuyết mới nhất</p>
												<p>
													<?php echo number_format($total_boy); ?> sản phẩm
												</p>
											</div>
										</div>
									</div>
								</a>
							</div>
							<!-- box banner -->
						</div>
						<!-- col-lg-4 -->
						<div class="col-4 sm_hidden">
							<div class="box">
								<a href="loai-san-pham/Do-be-gai-7-1.html">
									<div class="figure">
										<img src="public/images/SGK.jpg" alt="banner_project_3.jpg">
										<div class="caption">
											<div class="about">
												<h2>Sách Giáo Khoa</h2>
												<p>Cập nhật những quyển sách giáo khoa mới nhất</p>
												<p><?php echo number_format($total_girl); ?> sản phẩm</p>
											</div>
										</div>
									</div>
								</a>
							</div>
							<!-- box banner -->
						</div>
						<!-- col-lg-4 -->
						<div class="col-4 sm_hidden">
							<div class="box">
								<a href="loai-san-pham/Do-tre-so-sinh-10-1.html">
									<div class="figure">
										<img src="public/images/TA.jpg" alt="banner_project_4.jpg">
										<div class="caption">
											<div class="about">
												<h2>Sách Tiếng Anh</h2>
												<p>Cập nhật những quyển sách tiếng anh mới nhất</p>
												<p><?php echo number_format($total_new_born); ?> sản phẩm</p>
											</div>
										</div>
									</div>
								</a>
							</div>
							<!-- box banner -->
						</div>
						<!-- col-lg-4 -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- top content -->