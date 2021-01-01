<?php 
    
    // open session
    session_start();

    if(isset($_SESSION['user']) && isset($_SESSION['level']))
    {
        $level = $_SESSION['level'];
        $users = $_SESSION['user'];
        // include
        include('includes/header.php');
        include('includes/navbar.php');
        include('includes/left-sidebar.php');

        // include function
        require('modules/functions.php');

        // get date from session
        $session = "SELECT * FROM account WHERE email = '".$users."'";
        $rs_session = mysqli_query($conn, $session);
        $row_session = mysqli_fetch_array($rs_session);
        $name_user = $row_session['name'];
        $id_acc = $row_session['id_acc'];


        // show data
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $data = "SELECT image, link FROM slider WHERE id_slider = $id";
            $rs_data = mysqli_query($conn, $data);
            $row_data = mysqli_fetch_array($rs_data);
            $old_image = $row_data['image'];
        }
        
        // edit slider
        if(isset($_POST['add-slider']))
        {

            $link = $_POST['link'];
            $date_create = date("Y-m-d H:i:s");

            // setup image thumbnail
            $target_dir = "public/images/sliders/";
            $image = $_FILES['image']['name'];
            $name_code = name_code($image);
            $imageFileType = strtolower(pathinfo($name_code, PATHINFO_EXTENSION));
            $target_file = $target_dir.$name_code;

            if($image)
            {
                $remove_image = $target_dir . $old_image;
                unlink($remove_image);

                // move file to folder
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                
                // update data
                $update = "UPDATE slider SET
                        image = '$name_code',
                        link = '$link'
                        WHERE id_slider  = $id";
                mysqli_query($conn, $update);
                echo "<script>alert('Lưu lại thành công');</script>";
                echo "<script>location.href='slider.php';</script>";

                
            }
            else
            {
                // update data
                $update = "UPDATE slider SET
                        link = '$link'
                        WHERE id_slider  = $id";
                mysqli_query($conn, $update);
                echo "<script>alert('Lưu lại thành công');</script>";
                echo "<script>location.href='slider.php';</script>";

                // insert to history
                $text = " đã chỉnh sửa slider";
                $time = date('Y-m-d H:i:s');
                $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
                mysqli_query($conn, $ins_his);
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
                                            <li class="breadcrumb-item"><a href="slider.php" class="breadcrumb-link">Giao diện</a></li>
                                            <li class="breadcrumb-item"><a href="slider.php" class="breadcrumb-link">Đầu trang</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Slider</li>
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
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Tạo slider</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-xs-12">
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Ảnh slider*:</label>
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Đường dẫn liên kết:</label>
                                                    <input type="text" name="link" class="form-control" placeholder="https://" value="<?php echo $row_data['link']; ?>">
                                                </div>
                                                <?php 

                                                    if($level == 1)
                                                    {
                                                        echo "<button type='submit' class='btn btn-warning' name='add-slider'>Lưu lại</button>";
                                                    }
                                                    else
                                                    {
                                                        echo "<button type='submit' class='btn btn-warning' disabled>Lưu lại</button>";
                                                    }
                                                ?>
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