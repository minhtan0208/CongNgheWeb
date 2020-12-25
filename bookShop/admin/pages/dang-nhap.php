<?php 
    
    // open session
    session_start();

    if(isset($_SESSION['user']) && isset($_SESSION['level']))
    {
        echo "<script>location.href='index.php';</script>";
    }
    else
    {
        // include db
        include('modules/config.php');

        // login function
        if(isset($_POST['dangnhap']))
        {
            $email = $_POST['email'];
            $password = ($_POST['password']);

            if($email)
            {
                
                if($password != "d41d8cd98f00b204e9800998ecf8427e") // check space
                {
                
                    $sql = "SELECT email, level FROM account WHERE email = '$email' AND password = '$password'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $level = $row['level'];
                    if(mysqli_num_rows($result) == 1)
                    {
                        // create session
                        $_SESSION['user'] = $email;
                        $_SESSION['level'] = $level;
                        echo "<script>location.href='index.php';</script>";
                    }
                    else
                    {
                        echo "<script>alert('Tài khoản không tồn tại!.');</script>";
                    }
                }
                else
                {
                   echo "<script>alert('Vui lòng nhập mật khẩul!.');</script>";    
                }
            }
            else
            {
                echo "<script>alert('Vui lòng nhập email!.');</script>";   
            }
        }
        // end funtion

?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản trị - Website bán hàng</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        font-family: 'Roboto Condensed', sans-serif;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="index.html"><img class="logo-img" src="public/images/logo/logoShop.png" alt="logo" width = "300px"></a><span class="splash-description">Đăng nhập tài khoản</span></div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" type="email" placeholder="Nhập email" name="email" value="<?php if(isset($email)){ echo $email; } ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" placeholder="Nhập mật khẩu" name="password">
                    </div>
                    <!-- 
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="dangnhap">Đăng nhập</button>
                </form>
            </div>
            <!-- 
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div>
            -->
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>
<?php 
    }
    // end check session
?>