		<div id="footer">
			<div class="content_footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="logo_footer">
								<a href="<?php echo $row_logo['link']; ?>">
									<img src="admin/pages/public/images/logo/<?php echo $row_logo['image']; ?>" width="200">
								</a>
							</div>
							<div class="classes_widget">
				<?php 

					// show contact
					$contact = "SELECT content FROM contact ORDER BY date_create ASC";
					$rs_contact = mysqli_query($conn, $contact);
					while ($row_contact = mysqli_fetch_array($rs_contact)) 
					{
						echo "<p>".$row_contact['content']."</p>";
					}
				?>
							</div>
						</div>
						<!-- col-lg-4 -->
						<div class="col-lg-2">
							<h4 class="clicked">Về chúng tôi</h4>
							<ul class="toggle_menu">
								<li><a href="#" title="Trang chủ">Trang chủ</a></li>
								<li><a href="#" title="Giới thiệu">Giới thiệu</a></li>
								<li><a href="#" title="Sản phẩm">Sản phẩm</a></li>
								<li><a href="#" title="Liên hệ">Liên hệ</a></li>
							</ul>
						</div>
						<!-- col-lg-2 -->
						<div class="col-lg-2">
							<h4 class="clicked">Chính sách</h4>
							<ul class="toggle_menu">
								<li><a href="#" title="Trang chủ">Trang chủ</a></li>
								<li><a href="#" title="Giới thiệu">Giới thiệu</a></li>
								<li><a href="#" title="Sản phẩm">Sản phẩm</a></li>
								<li><a href="#" title="Liên hệ">Liên hệ</a></li>
							</ul>
						</div>
						<!-- col-lg-2 -->
						<div class="col-lg-4">
							
							<!-- form khuyen mai -->
							<h4 class="clicked">Theo dõi ngay</h4>
							<ul class="follow_option">
								<li>
									<a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
								</li>
								<li>
									<a href="https://mail.google.com/mail/u/0/?tab=wm#inbox" target="_blank"><i class="fab fa-google"></i></a>
								</li>
								<li>
									<a href="https://join.skype.com" target="_blank"><i class="fab fa-skype"></i></a>
								</li>
								<li>
									<a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
							<!-- clear-fix -->
							<!--
							<div class="col-lg-12 pl-0 pr-0 mt-2 mb-2">
								<div class="fb-post" data-href="https://www.facebook.com/photo.php?fbid=850604548671929&set=a.122901681442223&type=3&theater" data-width="350" data-height="100" data-show-text="true"><blockquote cite="https://developers.facebook.com/20531316728/posts/10154009990506729/" class="fb-xfbml-parse-ignore">Người đăng: <a href="https://www.facebook.com/dthanhhuy1998">Facebook</a> vào&nbsp;<a href="https://developers.facebook.com/20531316728/posts/10154009990506729/">Thứ Năm, 27 tháng 8, 2015</a></blockquote></div>
							</div>
							-->
						</div>
						<!-- col-lg-4 -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- content_footer -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h2 class="title_school">Tên Thư Viện</h2>
							<h4 class="title_name">Địa chỉ liên hệ: 280 An Dương Vương -  QUẬN 5 - TPHCM</h4>
							<h4 class="title_name">Số điện thoại: 0777508501</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- footer -->
	</div>
	<!-- wrapper -->
</body>

<!-- Bootstrap 4 -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- JQuery 3.4.1 -->
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<!-- Vue JS -->
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<!-- Owl Carousel -->
<script src="public/owlcarousel/owl.carousel.min.js"></script>
<script>
	
		$(document).ready(function(){
			
			// owl product
			$('.owl-product').owlCarousel({
			    loop:false,
			    margin:10,
			    autoplay:true,
				autoplayTimeout:5000,
			    responsiveClass:true,
			    responsive:{
			        0:{
			            items:2,
			            nav:false
			        },
			        600:{
			            items:3,
			            nav:false
			        },
			        1000:{
			            items:4,
			            nav:false,
			            loop:false
			        }
			    }
			})

			// owl thumb
			$('.owl-product-thumb').owlCarousel({
			    loop:false,
			    margin:10,
			    autoplay:true,
				autoplayTimeout:3000,
			    responsiveClass:true,
			    responsive:{
			        0:{
			            items:4,
			            nav:false
			        },
			        600:{
			            items:4,
			            nav:false
			        },
			        1000:{
			            items:4,
			            nav:false,
			            loop:false
			        }
			    }
			})

			// owl blog
			$('.owl-blog').owlCarousel({
			    loop: false,
			    margin:10,
			    autoplay:true,
				autoplayTimeout:5000,
			    responsiveClass:true,
			    responsive:{
			        0:{
			            items:1,
			            nav:false
			        },
			        600:{
			            items:3,
			            nav:false
			        },
			        1000:{
			            items:3,
			            nav:false,
			            loop:false
			        }
			    }
			})

			// owl blog
			$('.owl-product-rela').owlCarousel({
			    loop: false,
			    margin:10,
			    autoplay:true,
				autoplayTimeout:5000,
			    responsiveClass:true,
			    responsive:{
			        0:{
			            items:2,
			            nav:false
			        },
			        600:{
			            items:3,
			            nav:false
			        },
			        1000:{
			            items:6,
			            nav:false,
			            loop:false
			        }
			    }
			})

		});


		// toggle menu header
		$( ".iconbar" ).click(function() {
		  $( ".ul_collections" ).slideToggle(400);
		});

		// toggle submenu header
		$(".slide").click(function(){
		    var target = $(this).parent().children(".slideContent");
		    $(target).slideToggle();
		});

		// change image clicked
		var image_show = document.getElementById('img-container');
		function change_img(image){
			image_show.src = image.src;
		}

		// https://css-tricks.com/snippets/jquery/smooth-scrolling/
		// Select all links with hashes
		$('a[href*="#"]')
		  	// Remove links that don't actually link to anything
		  	.not('[href="#"]')
		  	.not('[href="#0"]')
		  	.click(function(event) {
		    // On-page links
		    if (
		      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
		      && 
		      location.hostname == this.hostname
		    ) {
		      // Figure out element to scroll to
		      var target = $(this.hash);
		      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		      // Does a scroll target exist?
		      if (target.length) {
		        // Only prevent default if animation is actually gonna happen
		        event.preventDefault();
		        $('html, body').animate({
		          scrollTop: target.offset().top
		        }, 600, function() {
		          // Callback after animation
		          // Must change focus!
		          var $target = $(target);
		          $target.focus();
		          if ($target.is(":focus")) { // Checking if the target was focused
		            return false;
		          } else {
		            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
		            $target.focus(); // Set focus again
		          };
		        });
		      }
		    }
		});

		// make tab by vue js
		new Vue({
			el: '#app-tabs',
			data: {
				tab1: true,
				tab2: false,
				tab3: false
			},
			create: function () {
				this.tab1btn()
			},
			methods: {
				tab1btn: function () {
					// add class select
					$('#selecttab1').addClass('selection')
					$('#selecttab2').removeClass('selection')
					$('#selecttab3').removeClass('selection')
					// add class active
					$('#tab1btn').addClass('active')
					$('#tab2btn').removeClass('active')
					$('#tab3btn').removeClass('active')
					this.tab1 = true
					this.tab2 = false
					this.tab3 = false
				},
				tab2btn: function () {
					// add class select
					$('#selecttab1').removeClass('selection')
					$('#selecttab2').addClass('selection')
					$('#selecttab3').removeClass('selection')
					// add class active
					$('#tab1btn').removeClass('active')
					$('#tab2btn').addClass('active')
					$('#tab3btn').removeClass('active')
					this.tab1 = false
					this.tab2 = true
					this.tab3 = false
				},
				tab3btn: function () {
					// add class select
					$('#selecttab1').removeClass('selection')
					$('#selecttab2').removeClass('selection')
					$('#selecttab3').addClass('selection')
					// add class active
					$('#tab1btn').removeClass('active')
					$('#tab2btn').removeClass('active')
					$('#tab3btn').addClass('active')
					this.tab1 = false
					this.tab2 = false
					this.tab3 = true
				}
			}
		})

		// back to top
		$('.scrolltop').click(function(){ 
	        $("html, body").animate({ scrollTop: 0 }, 1000); 
	        return false; 
	    });

	    // loading 
	    window.addEventListener("load", function (){
	      const loader = document.querySelector(".loader");
	      loader.className += " hidden";
	    });

</script>
</html>