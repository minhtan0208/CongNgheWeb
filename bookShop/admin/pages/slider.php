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

        // create type
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
                // move file to folder
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                // insert data
                $ins = "INSERT INTO slider(image, link, date_create) VALUES('$name_code', '$link', '$date_create')";
                mysqli_query($conn, $ins);
                echo "<script>alert('Tạo slider thành công');</script>";
                echo "<script>location.href='slider.php';</script>";

                
            }
            else
            {
                echo "<script>alert('Vui lòng chọn ảnh!.');</script>";
            }
        }

        // delete
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $target_dir = "public/images/sliders/";
            
            // remove move old file
            $data = "SELECT image FROM slider WHERE id_slider = $id";
            $rs_data = mysqli_query($conn, $data);
            $row_data = mysqli_fetch_array($rs_data);
            $old_file = $row_data['image'];
            $remove_file = $target_dir . $old_file;
            unlink($remove_file);

            // insert to history
            $text = " đã xóa slider";
            $time = date('Y-m-d H:i:s');
            $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
            mysqli_query($conn, $ins_his);

            $del = "DELETE FROM slider WHERE id_slider = $id";
            mysqli_query($conn, $del);
            echo "<script>alert('Xóa thành công');</script>";
            echo "<script>location.href='slider.php';</script>";
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
                                                    <input type="text" name="link" class="form-control" placeholder="https://">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ngày tạo:</label>
                                                    <input type="text" name="date_create" class="form-control" value="<?php echo date('d-m-Y H:i:s'); ?>" disabled>
                                                </div>
                                                <?php 

                                                    if($level == 1)
                                                    {
                                                        echo "<button type='submit' class='btn btn-primary' name='add-slider'>Tạo slider</button>";
                                                    }
                                                    else
                                                    {
                                                        echo "<button type='submit' class='btn btn-primary' disabled>Tạo slider</button>";
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

                        <!-- table -->
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Danh sách slider
                                </h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">STT</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Ảnh</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Link</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Ngày tạo</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Sửa</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            <?php 
                                
                                $slider = "SELECT * FROM slider ORDER BY id_slider DESC";
                                $rs_slider = mysqli_query($conn, $slider);
                                $count = 0;
                                while ($row_slider = mysqli_fetch_array($rs_slider)) 
                                {
                                    $count++;
                            ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td>
                                                        <img src="public/images/sliders/<?php echo $row_slider['image'] ?>" width="120">
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo $row_slider['link']; ?>" target="_blank">
                                                            <?php echo $row_slider['link']; ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                        $date = date_create($row_slider['date_create']);
                                                        echo date_format($date, "d-m-Y H:i:s");
                                                    ?>
                                                    </td>



                                                <?php 
                                                    if($level == 1)
                                                    {
                                                ?>
                                                        <td><a href="e-slider.php?id=<?php echo $row_slider['id_slider']; ?>" class="btn btn-info"><i class="fas fa-pen-nib"></i></a></td>
                                                        <td><a href="slider.php?id=<?php echo $row_slider['id_slider']; ?>" onclick="return confirm('Dữ liệu này sẽ được xóa vĩnh viễn. Đồng ý?');" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                                                <?php
                                                    }
                                                    else
                                                    {
                                                ?>
                                                        <td><button type="button" class="btn btn-info" disabled><i class="fas fa-pen-nib"></i></button></td>
                                                        <td><button type="button" class="btn btn-danger" disabled><i class="fas fa-trash-alt"></i></button></td>
                                                <?php
                                                    }
                                                ?>

                                                    
                                                </tr>
                            <?php 
                                }

                                // end while
                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->
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