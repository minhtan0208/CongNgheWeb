
	<div id="wrapper">
		<!-- croll top -->
		<!--<div class="scrolltop">
			<span><i class="fas fa-arrow-up"></i></span>
		</div>-->
		<div id="header">
			<div class="top_header">
				<div class="container">
					<div class="row">
						<div class="col-lg-9 col-6 sm_hidden">
							Library | Phone: *********
						</div>
						<!-- col-10 -->
						<div class="col-lg-3 col-12">
							<ul class="account">
							<?php 

								if(isset($customer) && isset($level))
								{
									$name = "SELECT name FROM account WHERE email = '$customer'";
									$rs_name = mysqli_query($conn, $name);
									$row_name = mysqli_fetch_array($rs_name);

									echo "<li>Hi, ".$row_name['name']."</li>";
									echo "<li><a href='dang-xuat.php'><i class='fas fa-sign-out-alt'></i> Đăng xuất</a></li>";
								}
								else
								{
									echo "<li><a href='dang-nhap.html'><i class='fas fa-user-plus'></i> Đăng nhập</a></li>";
									echo "<li><a href='dang-ky.html'><i class='fas fa-sign-in-alt'></i> Đăng ký </a></li>";
								}
							?>		
							</ul>
							<!-- account -->
						</div>
						<!-- col-2 -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- top header -->
			<div class="mid_header">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-xs-12">
							<div class="logo">
								<a href="<?php echo $row_logo['link']; ?>" class="logo_wrapper">
									<img src="admin/pages/public/images/logo/<?php echo $row_logo['image']; ?>" width="100%">
								</a>
							</div>
						</div>
						<!-- row -->
						<div class="col-lg-9 col-12">
							<div class="header_right">
								<div class="heading_cart">
									<a href="gio-hang.html" class="img_hover_cart" title="Giỏ hàng">
										<div class="icon_hotline">
											<i class="fa fa-shopping-basket"></i>
										</div>
										<!-- icon hotline -->	
									</a>
								</div>
								<!-- heading cart -->
							</div>
							<!-- header_right -->
							<div class="support sm_hidden">
								<p>Tư vấn bán hàng</p>
								<span>xxxxxxxxx</span>
							</div>
							<!-- support -->
							<div class="col_search_engine">
								<div class="header_search">
									<form class="search_bar" action="search.php" method="POST">
										<input type="search" name="key_word" placeholder="Sản phẩm cần tìm... " class="input_group_field">
										<span class="input_group_btn">
											<button type="submit" class="btn icon_fallback_text" name="tim_kiem">
												<i class="fa fa-search"></i>
											</button>
										</span>
									</form>
								</div>
							</div>
							<!-- col-search engine -->
							<div class="iconbar lg_hidden">
								<a href="#" onclick="return false;">
									<i class="fa fa-align-justify"></i>
								</a>
							</div>
						</div>
						<!-- row -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- mid header -->
			<div class="bot_header">
				<div class="navbar_header">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 sm_hidden">
								<nav class="header_nav">
									<ul class="item_big">
										<li class="nav_item"><a href="trang-chu.html" title="Trang chủ">Trang chủ</a></li>
										
										<li class="nav_item">
											<a href="#" title="Sản phẩm" onclick="return false;">
												<span> Sản phẩm </span>
												<i class="fa fa-caret-down"></i>
											</a>
											<ul class="item_small">
						<?php 
                                
                            $typep = "SELECT * FROM type_product ORDER BY typename DESC";
                            $rs_typep = mysqli_query($conn, $typep);
							
                            $count = 0;
                            while ($row_typep = mysqli_fetch_array($rs_typep)) 
                            {
                                $count++;
                                $id_type = $row_typep['id_type'];
								
                        ?>
												<li>
													<a href="loai-san-pham/<?php echo $row_typep['slug_type']; ?>-<?php echo $row_typep['id_type']; ?>-1.html" title="<?php echo $row_typep['typename']; ?>"><?php echo $row_typep['typename']; ?>
							<?php 
								// // hiển thị tổng số sách
								$total_p = "SELECT count(sku_product) as tong_sp FROM product WHERE flag = 1 AND id_type = $id_type";
								$rs_total_p = mysqli_query($conn, $total_p);
								$row_total_p = mysqli_fetch_array($rs_total_p);
								$tong_sp = $row_total_p['tong_sp'];
							?>
														<span class="badge badge-pill badge-primary">
															<?php echo $tong_sp; ?>
														</span>
													</a>
												</li>
						<?php 
						
							}
							// end while
						?>
											</ul>
										</li>
										<li class="nav_item"><a href="gio-hang.html" title="Giỏ hàng">Giỏ hàng của bạn</a></li>
										<li class="nav_item"><a href="don-hang.php" title="Đơn hàng">Đơn hàng của bạn</a></li>
										<li class="nav_item">
											
											<ul class="item_small">
						<?php 
                                
                            $typeb = "SELECT * FROM type_blog WHERE id_type <> 25 AND id_type <> 26 ORDER BY typename DESC";
                            $rs_typeb = mysqli_query($conn, $typeb);
                            $count = 0;
                            while ($row_typeb = mysqli_fetch_array($rs_typeb)) 
                            {
                                $count++;
                        ?>
												<li><a href="loai-blog/<?php echo $row_typeb['slug_type']; ?>-<?php echo $row_typeb['id_type']; ?>-1.html" title="<?php echo $row_typeb['typename']; ?>"><?php echo $row_typeb['typename']; ?></a></li>
						<?php 
							}
							// end while
						?>
											</ul>
										</li>
										
									</ul>
								</nav>
								<!-- header nav -->
							</div>
							<!-- col-lg-12 -->
						</div>
						<!-- row -->
					</div>
					<!-- container -->
				</div>
				<!-- navbar header -->
				<div class="navbar_mobile lg_hidden">
					<ul class="ul_collections">
						<li class="special">
							<a href="#">Tất cả danh mục</a>
						</li>
						<li class="parent">
							<a href="trang-chu.html">Trang chủ</a> 
						</li>
						
						<li class="parent">
							<a href="#" class="slide" onclick="return false;">Sản phẩm</a> <i class="fa fa-angle-down"></i></i>
							<ul class="level10 slideContent">
		<?php 
                                
	        $typep_mb = "SELECT * FROM type_product ORDER BY typename DESC";
	        $rs_typep_mb = mysqli_query($conn, $typep_mb);
	        $count = 0;
	        while ($row_typep_mb = mysqli_fetch_array($rs_typep_mb)) 
	        {
	            $count++;
	    ?>						
								<li class="level1">
									<a href="san-pham.php?id=<?php echo $row_typep_mb['id_type']; ?>"><span><?php echo $row_typep_mb['typename']; ?></span></a>
								</li>
		<?php 
			}
			// end while
		?>
							</ul>
						</li>
						
						<li class="parent">
							<a href="#" class="slide" onclick="return false;">Tin tức</a>  <i class="fa fa-angle-down"></i></i>
							<ul class="level10 slideContent">
		<?php 
                                
            $typeb_mb = "SELECT * FROM type_blog WHERE id_type <> 25 AND id_type <> 26 ORDER BY typename DESC";
            $rs_typeb_mb = mysqli_query($conn, $typeb_mb);
            $count = 0;
            while ($row_typeb_mb = mysqli_fetch_array($rs_typeb_mb)) 
            {
                $count++;
        ?>
								<li class="level1">
									<a href="loai-blog/<?php echo $row_typeb_mb['slug_type']; ?>-<?php echo $row_typeb_mb['id_type']; ?>-1.html"><span><?php echo $row_typeb_mb['typename']; ?></span></a>
								</li>
		<?php 
			}
			// end while
		?>
							</ul>
						</li>
						
						
					</ul>
				</div>
				<div class="clearfix"></div>