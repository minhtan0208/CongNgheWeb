<?php 

	// includes
	include('includes/header.php');
	include('includes/top.php');

	// register account
	if(isset($_POST['register']))
	{
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$date_create = date("Y-m-d H:i:s");
		$image = "no-image.jpg";
		$level = 2;
		$regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
		if($name && $phone && $address && $email && $password && $repassword)
		{

			$pass = ($password);
			$repass = ($repassword);

			if($pass != $repass)
			{
				echo "<script>alert('Mật khẩu không trùng nhau!.');</script>";
			}
			else if (!preg_match('/^0[0-9]{9}$/', $phone))
			{
				echo "<script>alert('Số điện thoại không đúng định dạng!.');</script>";
			}
			else if(!preg_match($regex, $email))
			{
				echo "<script>alert('Email không đúng định dạng!.');</script>";
			}
			else
			{
				// check account exists
				$ac = "SELECT email FROM account WHERE email = '$email'";
				$rs_ac = mysqli_query($conn, $ac);
				if(mysqli_num_rows($rs_ac) > 0)
				{
					echo "<script>alert('Email này đã được sử dụng!. Vui lòng chọn email khác.');</script>";
				}
				else
				{
					// insert account
					$ins = "INSERT INTO account(name, email, password, phone, address, image, date_create, level) VALUES('".$name."', '".$email."', '".$pass."', '".$phone."', '".$address."', '".$image."', '".$date_create."', '".$level."')";
					mysqli_query($conn, $ins);

					$_SESSION['customer'] = $email;
					$_SESSION['level'] = $level;
					echo "<script>alert('Đăng ký tài khoản thành công');</script>";
					echo "<script>location.href='trang-chu.html';</script>";
				}
			}
		}
		else
		{
			echo "<script>alert('Vui lòng điền đầy đủ thông tin!.');</script>";
		}
	}
?>
		<!-- header -->
		<div id="content">
			<!-- top slider none -->
			<div class="breadcrumb_me">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<ul class="breadcrumb_list">
								<li><a href="trang-chu.html">Trang chủ</a></li>
								<li><i class="fas fa-caret-right"></i></li>
								<li>Đăng ký tài khoản</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="login_content">
				<div class="container">
					<h1 class="title_head"><span> ĐĂNG KÝ TÀI KHOẢN </span></h1>
					<span>Nếu chưa có tài khoản vui lòng đăng ký tại đây</span>
					<form method="POST" action="">
						<div class="row">
							<div class="col-lg-6 pad-top-5">
								<div class="login_form" style="padding-bottom: 0;">
								  	<div class="form-group">
								    	<label for="exampleInputEmail1">Họ tên* </label>
								    	<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?php if(isset($name)){ echo $name; } ?>">
								  	</div>
								  	<div class="form-group">
								    	<label for="exampleInputPassword1">Số điện thoại*:</label>
								    	<input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="<?php if(isset($phone)){ echo $phone; } ?>">
								  	</div>
								  	<div class="form-group">
								    	<label for="exampleInputPassword1">Địa chỉ (Nhận hàng)*:</label>
								    	<textarea class="form-control" name="address"><?php if(isset($address)){ echo $address; } ?></textarea>
								  	</div>
								</div>
							</div>
							<div class="col-lg-6 pad-top-5">
								<div class="login_form" style="padding-bottom: 0;">
								  	<div class="form-group">
								    	<label for="exampleInputEmail1">Email*: </label>
								    	<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php if(isset($email)){ echo $email; } ?>">
								  	</div>
								  	<div class="form-group">
								    	<label for="exampleInputPassword1">Mật khẩu:* </label>
								    	<input type="password" class="form-control" id="exampleInputPassword1" name="password">
								  	</div>
								  	<div class="form-group">
								    	<label for="exampleInputPassword1">Nhập lại mật khẩu:* </label>
								    	<input type="password" class="form-control" id="exampleInputPassword1" name="repassword">
								  	</div>
								</div>
							</div>
							<div class="col-lg-12">
								<button type="submit" class="btn btn-primary" name="register">Đăng ký</button>
					  			<a href="dang-nhap.html" class="btn-link-style btn-register" style="margin-left: 20px;text-decoration: underline; ">Đăng nhập</a>
					  		</div>
						</div>
						<!-- row -->
					</form>
				</div>
				<!-- container -->
			</div>
			<!-- middle content -->
			<!-- bottom content -->
		</div>
		<!-- content -->
<?php 
	
	// footer
	include('includes/footer.php');
?>