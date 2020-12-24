<?php 
	
	// include
	include('includes/header.php');
	include('includes/top.php');




	if(isset($_GET['key']))
	{
		$key = $_GET['key'];
		//echo "<script>alert('$key');</script>";

		// pagination
		// BƯỚC 2: TÌM TỔNG SỐ RECORDS
		$sql = "SELECT count(sku_product) as total FROM product WHERE name_product LIKE '%$key%'";
	    $result = mysqli_query($conn, $sql);
	    $row = mysqli_fetch_assoc($result);
	    $total_records = $row['total'];

	    if($total_records == 0)
	    {
	    	$limit = 0;
	    	$start = 0;
	    	$current_page = 0;
	    	$total_page = 0;
	    	$mess = "Không có kết quả cần tìm";
	    }
	    else
	    {
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
	}
?>
		<div id="content">
			<!-- top slider none -->
			<div class="breadcrumb_me">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<ul class="breadcrumb_list">
								<li><a href="index.php">Trang chủ</a></li>
								<li><i class="fas fa-caret-right"></i></li>
								<li><a href="san-pham.php?id=7">Sản phẩm</a></li>
								<li><i class="fas fa-caret-right"></i></li>
								<li>Tìm kiếm sản phẩm</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="mid_content">
				<div class="container">
					<div class="row">
						<!-- advertisement none -->
						<div class="col-lg-12 padding-30">
							<div class="title_module_main">
								<h2>
									<?php 

										if($total_records != 0)
										{
											echo "<a href='tim-kiem.php?key=".$key."'>Từ khóa: ".$key."</a>";
										}
										else
										{
											echo "<a href='#'>Không có TỪ KHÓA cần tìm</a>";
										}
									?>
								</h2>
							</div>
							<div class="product_main">
								<div class="row">
	<?php 

		$product = "SELECT sku_product, p.image as image, name_product, price FROM product p, type_product tp, account a WHERE p.id_type = tp.id_type AND a.id_acc = p.author AND name_product LIKE '%$key%' AND flag = 1 ORDER BY date_upload DESC LIMIT $start, $limit";
        $rs_product = mysqli_query($conn, $product);
        while ($row_product = mysqli_fetch_array($rs_product)) 
        {
        	if($row_product['name_product'] != "")
        	{
	?> 
								    <div class="col-lg-3 col-6 pt-2 pb-2">
								    	<div class="product_box">
								    		<div class="product_image">
								    			<img src="admin/pages/public/images/products/<?php echo $row_product['image']; ?>" alt="<?php echo $row_product['image']; ?>" title="<?php echo $row_product['name_product']; ?>" width="100%">
								    		</div>
								    		<div class="detail_product">
								    			<h2 class="product_name">
								    				<a href="chi-tiet-san-pham.php?id=<?php echo $row_product['sku_product']; ?>"><?php echo mb_substr($row_product['name_product'], 0, 50, 'UTF-8')."..."; ?></a>
								    			</h2>
								    			<span class="price_box">
								    				<h4 class="price"><?php echo number_format($row_product['price']); ?>đ</h4>
								    				<a href="chi-tiet-san-pham.php?id=<?php echo $row_product['sku_product']; ?>">Chi tiết</a>
								    			</span>
								    		</div>
								    	</div>
								    </div>
								    <!-- col-lg-3 col-6 -->
	<?php 
			}
			else
			{
				echo "Không có kết quả cần tìm";
			}
		}
		// end while
	?>						    
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
			<div class="pagination_huy">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<ul class="pagination_list">
							<?php 

								// pagination

								if($current_page > 1)
								{
									
									echo "<li><a href='tim-kiem.php?key=".$key."&page=1'><i class='fas fa-angle-double-left'></i></a></li>";

									echo "<li><a href='tim-kiem.php?key=".$key."&page=".($current_page - 1)."'><i class='fas fa-angle-left'></i></a></li>";
								}

								for($i = 1; $i <= $total_page; $i++)
								{
									if($current_page == $i)
									{
										echo "<li><a href='tim-kiem.php?key=".$key."&page=".$i."' class='active'>".$i."</a></li>";
									}
									else
									{
										echo "<li><a href='tim-kiem.php?key=".$key."&page=".$i."'>".$i."</a></li>";
									}
								}

								if($current_page < $total_page)
								{
									echo "<li><a href='tim-kiem.php?key=".$key."&page=".($current_page + 1)."'><i class='fas fa-angle-right'></i></a></li>";
									echo "<li><a href='tim-kiem.php?key=".$key."&page=".($total_page)."'><i class='fas fa-angle-double-right'></i></a></li>";
								}
							
							?>
							</ul>
						</div>
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- pagination -->
		</div>
		<!-- content -->
<?php 
	
	// footer 
	include('includes/footer.php');
?>