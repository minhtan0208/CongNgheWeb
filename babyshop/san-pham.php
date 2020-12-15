<?php 
	
	// include
	include('includes/header.php');
	include('includes/top.php');




	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$type = "SELECT id_type, typename, slug_type FROM type_product WHERE id_type = $id";
		$rs_type = mysqli_query($conn, $type);
		$row_type = mysqli_fetch_array($rs_type);
		$slug_type = $row_type['slug_type'];


		// pagination
		// BƯỚC 2: TÌM TỔNG SỐ RECORDS
		$sql = "SELECT count(sku_product) as total FROM product WHERE id_type = $id";
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
			<div class="mid_content">
				<div class="container">
					<div class="row">
						<!-- advertisement none -->
						<div class="col-lg-12 padding-30">
							<div class="title_module_main">
								<h2>
									<a href="loai-san-pham/<?php echo $row_type['slug_type']; ?>-<?php echo $row_type['id_type']; ?>-<?php echo $current_page; ?>.html" title="<?php echo $row_type['typename']; ?>"><?php echo $row_type['typename']; ?></a>
								</h2>
							</div>
							<div class="product_main">
								<div class="row">
	<?php 

		$product = "SELECT sku_product, p.image as image, name_product, price, slug, slug_type FROM product p, type_product tp, account a WHERE p.id_type = tp.id_type AND a.id_acc = p.author AND p.id_type = $id AND flag = 1 ORDER BY date_upload DESC LIMIT $start, $limit";
        $rs_product = mysqli_query($conn, $product);
        while ($row_product = mysqli_fetch_array($rs_product)) 
        {
	?> 
								    <div class="col-lg-3 col-6 pt-2 pb-2">
								    	<div class="product_box">
								    		<div class="product_image">
								    			<img src="admin/pages/public/images/products/<?php echo $row_product['image']; ?>" alt="<?php echo $row_product['image']; ?>" title="<?php echo $row_product['name_product']; ?>" width="100%">
								    		</div>
								    		<div class="detail_product">
								    			<h2 class="product_name">
								    				<a href="san-pham/<?php echo $row_product['slug_type']; ?>/<?php echo $row_product['slug']; ?>-<?php echo $row_product['sku_product']; ?>.html"><?php echo mb_substr($row_product['name_product'], 0, 50, 'UTF-8')."..."; ?></a>
								    			</h2>
								    			<span class="price_box">
								    				<h4 class="price"><?php echo number_format($row_product['price']); ?>đ</h4>
								    				<a href="san-pham/<?php echo $row_product['slug_type']; ?>/<?php echo $row_product['slug']; ?>-<?php echo $row_product['sku_product']; ?>.html">Chi tiết</a>
								    			</span>
								    		</div>
								    	</div>
								    </div>
								    <!-- col-lg-3 col-6 -->
	<?php 
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
									
									echo "<li><a href='loai-san-pham/".$slug_type."-".$id."-1.html'><i class='fas fa-angle-double-left'></i></a></li>";

									echo "<li><a href='loai-san-pham/".$slug_type."-".$id."-".($current_page - 1).".html'><i class='fas fa-angle-left'></i></a></li>";
								}

								for($i = 1; $i <= $total_page; $i++)
								{
									if($current_page == $i)
									{
										echo "<li><a href='loai-san-pham/".$slug_type."-".$id."-".$i.".html' class='active'>".$i."</a></li>";
									}
									else
									{
										echo "<li><a href='loai-san-pham/".$slug_type."-".$id."-".$i.".html'>".$i."</a></li>";
									}
								}

								if($current_page < $total_page)
								{
									echo "<li><a href='loai-san-pham/".$slug_type."-".$id."-".($current_page + 1).".html'><i class='fas fa-angle-right'></i></a></li>";
									echo "<li><a href='loai-san-pham/".$slug_type."-".$id."-".($total_page).".html'><i class='fas fa-angle-double-right'></i></a></li>";
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