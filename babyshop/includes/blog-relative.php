									<!-- sidebar blog -->
								    	<div class="blog_aside">
								    		<h2 class="title_head">
								    			<span> Bài viết liên quan</span>
								    		</h2>
	<?php
		
		// get id type in file chi-tiet-blog.php 
		$id_type = $row['id_type'];
		$blog_rela = "SELECT id_blog, b.image as image, title, date_upload, b.slug as slug, slug_type,  typename, author, summary, name, view, content FROM blog b, type_blog tb, account a WHERE b.id_type = tb.id_type AND a.id_acc = b.author AND flag = 1 AND b.id_type = $id_type and id_blog <> $id ORDER BY date_upload DESC LIMIT 10";
		$rs_blog_rela = mysqli_query($conn, $blog_rela);
		while ($row_blog_rela = mysqli_fetch_array($rs_blog_rela)) {

	?>
								    		<div class="blog_list">
								    			<div class="loop_blog">
								    				<div class="thumb_left">
								    					<a href="blog/<?php echo $row_blog_rela['slug_type']; ?>/<?php echo $row_blog_rela['slug']; ?>-<?php echo $row_blog_rela['id_blog']; ?>.html">
								    						<img src="admin/pages/public/images/blogs/<?php echo $row_blog_rela['image']; ?>" alt="<?php echo $row_blog_rela['image']; ?>" title="<?php echo $row_blog_rela['title']; ?>">
								    					</a>
								    				</div>
								    				<!-- thumb_left -->
								    				<div class="name_right">
								    					<h3 class="text2line">
								    						<a href="blog/<?php echo $row_blog_rela['slug_type']; ?>/<?php echo $row_blog_rela['slug']; ?>-<?php echo $row_blog_rela['id_blog']; ?>.html" title="<?php echo $row_blog_rela['title']; ?>">
								    							<?php 
								    								echo mb_substr($row_blog_rela['title'], 0, 35, 'UTF-8')."...";
								    							?>
								    						</a>
								    					</h3>
								    					<div class="date">
								    						<i class="far fa-calendar-alt"></i>
								    						<span>
								    							<?php

										    					 	// get day
										    					 	$day = date('D', $time = strtotime($row_blog_rela['date_upload']) );

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
								    								$date = date_create($row_blog_rela['date_upload']);
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