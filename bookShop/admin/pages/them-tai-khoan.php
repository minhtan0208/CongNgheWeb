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

        // add account
        if(isset($_POST['add']))
        {
            $target_dir = "public/images/avatars/";
            $name = $_POST['name'];
            $email_reg = $_POST['email_reg'];
            $password = $_POST['password'];
            $repass = $_POST['repass'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $date_create = date("Y-m-d H:i:s");
            $level = $_POST['level'];

            // create var to check image
            $image = $_FILES['image']['name'];
            $name_code = name_code($image);
            $file_type = strtolower(pathinfo($name_code,PATHINFO_EXTENSION));
            $target_file = $target_dir . $name_code;

            // create var to check email exists
            $e = "SELECT email FROM account WHERE email = '$email_reg'";
            $rs_e = mysqli_query($conn, $e);


            if($image)
            {
                if($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png" && $file_type != "gif")
                {
                    echo "<script>alert('Chỉ nhận file dạng: jpg, jpeg, png, gif.');</script>";
                }
                else
                {
                    if($name && $email_reg)
                    {
                        if(mysqli_num_rows($rs_e) > 0)
                        {
                            echo "<script>alert('Email đã được sử dụng!. Vui lòng chọn email khác.');</script>";
                        }
                        else
                        {
                            if($password != $repass)
                            {
                                echo "<script>alert('Mật khẩu không trùng nhau!.');</script>";
                            }
                            else
                            {
                                // move file to folder
                                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                                $ins = "INSERT account(name, email, password, phone, address, image, date_create, level) VALUES('$name', '$email_reg', '$password', '$phone', '$address', '$name_code', '$date_create', $level)";
                                mysqli_query($conn, $ins);
                                echo "<script>alert('Tạo tài khoản thành công');</script>";
                                echo "<script>location.href='tai-khoan.php';</script>";
                            }
                            // end check pass
                        }
                        // end check email exists
                    }
                    else
                    {
                        echo "<script>alert('Vui lòng điền đầy đủ thông tin!.');</script>";
                    }
                }
            }
            else
            {
                if($name && $email_reg)
                {
                    if(mysqli_num_rows($rs_e) > 0)
                    {
                        echo "<script>alert('Email đã được sử dụng!. Vui lòng chọn email khác.');</script>";
                    }
                    else
                    {
                        if($password != $repass)
                        {
                            echo "<script>alert('Mật khẩu không trùng nhau!.');</script>";
                        }
                        else
                        {
                            // move file to folder
                            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                            $ins = "INSERT account(name, email, password, phone, address, image, date_create, level) VALUES('$name', '$email_reg', '$password', '$phone', '$address', 'no-image.jpg', '$date_create', $level)";
                            mysqli_query($conn, $ins);
                            echo "<script>alert('Tạo tài khoản thành công');</script>";
                            echo "<script>location.href='tai-khoan.php';</script>";
                        }
                        // end check pass
                    }
                    // end check email exists
                }
                else
                {
                    echo "<script>alert('Vui lòng điền đầy đủ thông tin!.');</script>";
                }
            }
        }
        // end submit
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
                                <h2 class="pageheader-title" style="font-family: 'Roboto Condensed', sans-serif;">Quản trị Website Thư Viện</h2>
                                <!--
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                -->
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Trang chính</a></li>
                                            <li class="breadcrumb-item"><a href="tai-khoan.php" class="breadcrumb-link">Tài khoản</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Thêm tài khoản</li>
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
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Tạo tài khoản</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12 col-xs-12">
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="card">
                                                    <img class="img-fluid" src="public/images/avatars/no-image.jpg" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h3 class="card-title" style="font-family: 'Roboto Condensed', sans-serif;">Ảnh đại diện</h3>
                                                        <input type="file" name="image" class="form-control">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Họ tên*:</label>
                                                    <input type="text" name="name" class="form-control" value="<?php if(isset($name)){ echo $name; } ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email*:</label>
                                                    <input type="email" name="email_reg" class="form-control" value="<?php if(isset($email_reg)){ echo $email_reg; } ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mật khẩu*:</label>
                                                    <input type="password" name="password" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nhập lại mật khẩu*:</label>
                                                    <input type="password" name="repass" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Số điện thoại:</label>
                                                    <input type="text" name="phone" class="form-control"  value="<?php if(isset($phone)){ echo $phone; } ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Địa chỉ:</label>
                                                    <textarea name="address" class="form-control"><?php if(isset($address)){ echo $address; } ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Quyền hạn: </label>
                                                    <select class="form-control" name="level">
                                                        <option value="1">Quản trị viên</option>
                                                        <option value="0">Nhân viên</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ngày tạo:</label>
                                                    <input type="date" name="date_create" class="form-control" value="<?php echo date("Y-m-d"); ?>"
                                                    disabled>
                                                </div>
                                                <button type="submit" class="btn btn-primary" name="add">Tạo tài khoản</button>
                                                <a class="btn btn-default" href="tai-khoan.php" role="button">Quay lại <i class="fas fa-undo-alt"></i></a>
                                            </form>
                                        </div>
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