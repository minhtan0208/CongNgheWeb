<?php 
    
    // open session
    session_start();

    if(isset($_SESSION['user']) && isset($_SESSION['level']))
    {
        // include
        include('includes/header.php');
        include('includes/navbar.php');
        include('includes/left-sidebar.php');

        // include function
        require('modules/functions.php');

        // get info
        // get user
        $username = $_SESSION['user'];
        $user = "SELECT password FROM account WHERE email = '$username'";
        $rs_user = mysqli_query($conn, $user);
        $row_user = mysqli_fetch_array($rs_user);
        $old_pass = $row_user['password'];

        // save
        if(isset($_POST['change-pass']))
        {
            $password_old = $_POST['password_old'];
            $password_new = $_POST['password_new'];
            $repass_new = $_POST['repass_new'];

            if($password_old && $password_new && $repass_new)
            {
                if($password_old != $old_pass)
                {
                    echo "<script>alert('Mật khẩu cũ không đúng!.');</script>";
                }
                else
                {
                    if($password_new != $repass_new)
                    {
                        echo "<script>alert('Mật khẩu mới không trùng nhau!.');</script>";
                    }
                    else
                    {
                       
                            $update = "UPDATE account SET password = '$password_new' WHERE email = '$username'";
                            mysqli_query($conn, $update);
                            echo "<script>alert('Đổi mật khẩu thành công');</script>";
                            echo "<script>location.href='doi-mat-khau.php';</script>";
                        
                    }
                }
            }
            else
            {
                echo "<script>alert('Vui lòng nhập đầy đủ!.');</script>";
            }
        }
?>
<body>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content " >
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header" >
                                <h2 class="pageheader-title" style="font-family: 'Roboto Condensed', sans-serif;">Quản trị Website Bán Sách</h2>
                                <!--
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                -->
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Trang chính</a></li>
                                            <li class="breadcrumb-item"><a href="tai-khoan.php" class="breadcrumb-link">Tài khoản</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Thông tin cá nhân</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-xs-12">
                                            <form method="POST">
                                                <div class="form-group">
                                                    <label>Nhập mật khẩu cũ:</label>
                                                    <input type="password" name="password_old" class="form-control" placeholder="Nhập mật khẩu cũ">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nhập mật khẩu mới:</label>
                                                    <input type="password" name="password_new" class="form-control" placeholder="Nhập mật khẩu mới">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nhập lại mật khẩu mới:</label>
                                                    <input type="password" name="repass_new" class="form-control" placeholder="Nhập lại mật khẩu mới">
                                                </div>
                                                <button type="submit" class="btn btn-primary" name="change-pass">Lưu mật khẩu</button>
                                            </form>
                                        </div>
                                        <!-- col-lg-12 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- col-lg-12 -->
                    </div>
                </div>
            </div>
<?php 
        // footer
        include('includes/footer.php');
    }
    else
    {
        echo "<script> location.href='dang-nhap.php'; </script>";
    }
?>