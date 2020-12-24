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
        $email_id = $_SESSION['user'];
        $level_check = $_SESSION['level'];
        $user = "SELECT * FROM account WHERE email = '$email'";
        $rs_user = mysqli_query($conn, $user);
        $row_user = mysqli_fetch_array($rs_user);
        $old_image = $row_user['image'];

        // save
        if(isset($_POST['save']))
        {
            $target_dir = "public/images/avatars/";
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $image = $_FILES['image']['name'];
            $name_code = name_code($image);
            $file_type = strtolower(pathinfo($name_code,PATHINFO_EXTENSION));
            $target_file = $target_dir . $name_code;


            if($image)
            {
                if($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png" && $file_type != "gif")
                {
                    echo "<script>alert('Chỉ nhận file dạng: jpg, jpeg, png, gif.');</script>";
                }
                else
                {
                    if($name)
                    {

                        // remove old image
                        $remove_image = $target_dir . $old_image;
                        if($old_image != "no-image.jpg")
                        {
                            unlink($remove_image);
                        }
                    
                        // move file to folder
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                        $update = "UPDATE account SET name = '$name', phone = '$phone', address = '$address', image = '$name_code' WHERE email = '$email_id'";
                        mysqli_query($conn, $update);
                        echo "<script>alert('Lưu thành công');</script>";
                        echo "<script>location.href='thong-tin-tai-khoan.php';</script>";
                    }
                    else
                    {
                        echo "<script>alert('Tên không thể bỏ trống!.');</script>";
                    }
                }
            }
            else
            {
                if($name)
                {
                    $update = "UPDATE account SET name = '$name', phone = '$phone', address = '$address' WHERE email = '$email_id'";
                    mysqli_query($conn, $update);
                    echo "<script>alert('Lưu thành công');</script>";
                    echo "<script>location.href='thong-tin-tai-khoan.php';</script>";
                }
                else
                {
                    echo "<script>alert('Tên không thể bỏ trống!.');</script>";
                }
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
                                <h2 class="pageheader-title" style="font-family: 'Roboto Condensed', sans-serif;">Quản trị Website Thư Viện</h2>
                                <!--
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                -->
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Trang chính</a></li>
                                            <li class="breadcrumb-item"><a href="tai-khoan.php" class="breadcrumb-link">Tài khoản</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
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
                                        <div class="col-lg-4 col-sm-12 col-xs-12">
                                            <form method="POST" enctype="multipart/form-data">
                                            <div class="card">
                                                <img class="img-fluid" src="public/images/avatars/<?php echo $old_image; ?>" alt="Card image cap">
                                                <div class="card-body">
                                                    <h3 class="card-title" style="font-family: 'Roboto Condensed', sans-serif;">Ảnh đại diện</h3>
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-12 col-xs-12">
                                            <h4 class="mb-4" style="font-family: 'Roboto Condensed', sans-serif;">Xin chào, <strong> <?php echo $row_user['name']; ?> </strong>!</h4>
                                            <h5 class="mb-4" style="font-family: 'Roboto Condensed', sans-serif;">Tên tài khoản: <strong> <?php echo $row_user['email']; ?> </strong></h5>
                                                <div class="form-group">
                                                    <label>Họ tên:</label>
                                                    <input type="text" name="name" class="form-control" value="<?php echo $row_user['name']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone:</label>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $row_user['phone']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Địa chỉ:</label>
                                                    <textarea class="form-control" name="address"><?php echo $row_user['address']; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ngày tạo:</label>
                                                    <input type="text" name="date_create" class="form-control"
                                                    value="<?php 
                                                        $date = date_create($row_user['date_create']); 
                                                        echo date_format($date, "d-m-Y H:i:s");
                                                    ?>"
                                                    disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Quyền hạn: </label>
                                                    <input type="text" name="level" class="form-control"
                                                    value="<?php if($level_check == 1)
                                                        {
                                                            echo 'Quản trị viên';
                                                        }
                                                        else
                                                        {
                                                            echo 'Nhân viên';
                                                        }
                                                    ?>" disabled>
                                                </div>
                                                <button type="submit" class="btn btn-primary" name="save">Lưu thay đổi</button>
                                                <a class="btn btn-success" href="doi-mat-khau.php" role="button">Thay đổi mật khẩu <i class="fas fa-arrow-right"></i></a>
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