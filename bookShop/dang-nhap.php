<?php 
	
	// includes
	include('includes/header.php');
	include('includes/top.php');

	// login
	if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		if($email && $password)
		{
			$pass = ($password);

			// check
			$sql = "SELECT email, level FROM account WHERE email = '$email' AND password = '$pass' AND level = 2";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$level = $row['level'];


			if(mysqli_num_rows($result) > 0)
			{
				$_SESSION['customer'] = $email;
				$_SESSION['level'] = $level;
				echo "<script>location.href='trang-chu.html';</script>";
			}
			else
			{
				echo "<script>alert('Tài khoản không tồn tại!.');</script>";
			}
		}
		else
		{
			echo "<script>alert('Vui lòng nhập tài khoản!.');</script>";
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
								<li><a href="trang-chu.html">Trang chủ</a></li>
								<li><i class="fas fa-caret-right"></i></li>
								<li>Đăng nhập tài khoản</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="login_content">
				<div class="container">
					<h1 class="title_head" style="color: #339AF0;"><span> ĐĂNG NHẬP TÀI KHOẢN </span></h1>
					<div class="row">
						<div class="col-lg-6">
							<div class="login_form">
								<span>Nếu đã có tài khoản, đăng nhập tại đây.</span>
								<form class="pt-5" action="" method="POST">
								  	<div class="form-group">
								    	<label for="exampleInputEmail1">Email* </label>
								    	<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email của bạn" name="email" value="<?php if(isset($email)){ echo $email; } ?>">
								  	</div>
								  	<div class="form-group">
								    	<label for="exampleInputPassword1">Mật khẩu* </label>
								    	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu" name="password">
								  	</div>
								  	<button type="submit" class="btn btn-primary" name="login">Đăng nhập</button>
								  	<a href="dang-ky.html" class="btn-link-style btn-register" style="margin-left: 20px;text-decoration: underline; ">Đăng ký</a>
								</form>
							</div>
						</div>
						<!--
						<div class="col-lg-6">
							<div class="login_form">
								<span>Bạn quên mật khẩu? Nhập địa chỉ email để lấy lại mật khẩu qua email.</span>
								<form class="pt-5">
								  	<div class="form-group">
								    	<label for="exampleInputEmail1">Email* </label>
								    	<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email của bạn">
								  	</div>
								  	<button type="submit" class="btn btn-primary">Lấy lại mật khẩu</button>
								</form>
							</div>
						</div>
						-->
					</div>
					<!-- row -->
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