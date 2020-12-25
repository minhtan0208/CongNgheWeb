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
        $id_acc = $row_session['id_acc'];
        $name_user = $row_session['name'];

        // create type
        if(isset($_POST['save']))
        {
            $name_type = $_POST['name_type'];
            $slug = generateURL($name_type);
            $date_create = date("Y-m-d H:i:s");

            if($name_type)
            {
                // insert to history
                $text = " đã tạo loại bài viết <b>". $name_type . "</b>";
                $time = date('Y-m-d H:i:s');
                $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
                mysqli_query($conn, $ins_his);

                // insert data
                $ins = "INSERT INTO type_blog(typename, slug_type, date_create) VALUES('$name_type', '$slug', '$date_create')";
                mysqli_query($conn, $ins);
                echo "<script>alert('Tạo loại bài viết thành công');</script>";
                echo "<script>location.href='loai-blog.php';</script>";
            }
            else
            {
                echo "<script>alert('Vui lòng nhập tên loại!.');</script>";
            }
        }

        // delete
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $target_dir = "public/images/blogs/";

            // get data
            $data = "SELECT id_type, typename FROM type_blog WHERE id_type = $id";
            $rs_data = mysqli_query($conn, $data);
            $row_data = mysqli_fetch_array($rs_data);
            $delname = $row_data['typename'];
            $id_type = $row_data['id_type'];

            // remove image and image blog of type
            $blog = "SELECT image FROM blog WHERE id_type = $id_type";
            $rs_blog = mysqli_query($conn, $blog);
            while ($row_blog = mysqli_fetch_array($rs_blog)) 
            {
                // remove image blog
                $image_blog = $row_blog['image'];
                $remove_image = $target_dir.$image_blog;
                if($image_blog != "no-image.jpg")
                {
                    unlink($remove_image);
                }

                // delete record blog
                $del_blog = "DELETE FROM blog WHERE id_type = $id_type";
                mysqli_query($conn, $del_blog);
            }

            // insert to history
            $text = " đã xóa loại bài viết <b>". $delname . "</b>";
            $time = date('Y-m-d H:i:s');
            $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
            mysqli_query($conn, $ins_his);

            // delete record type blog
            $del = "DELETE FROM type_blog WHERE id_type = $id";
            mysqli_query($conn, $del);
            echo "<script>alert('Xóa thành công');</script>";
            echo "<script>location.href='loai-blog.php';</script>";
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
                                            <li class="breadcrumb-item"><a href="blog.php" class="breadcrumb-link">Bài viết</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Tạo loại bài viết</li>
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
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Tạo loại bài viết</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-xs-12">
                                            <form method="POST">
                                                <div class="form-group">
                                                    <label>Tên loại*:</label>
                                                    <input type="text" name="name_type" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ngày tạo:</label>
                                                    <input type="text" name="date_create" class="form-control" value="<?php echo date('d-m-Y H:i:s'); ?>" disabled>
                                                </div>
                                    <?php 

                                        if($level == 1)
                                        {
                                            echo "<button type='submit' class='btn btn-primary' name='save'>Tạo loại mới</button>";
                                        }
                                        else
                                        {
                                            echo "<button type='submit' class='btn btn-primary' disabled>Tạo loại mới</button>";
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
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Danh sách loại bài viết
                                </h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">STT</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Tên loại</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Slug</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Ngày tạo</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Sửa</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            <?php 
                                
                                $typeb = "SELECT * FROM type_blog ORDER BY typename DESC";
                                $rs_typeb = mysqli_query($conn, $typeb);
                                $count = 0;
                                while ($row_typeb = mysqli_fetch_array($rs_typeb)) 
                                {
                                    $count++;
                            ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $row_typeb['typename']; ?></td>
                                                    <td><?php echo $row_typeb['slug_type']; ?></td>
                                                    <td>
                                                    <?php 
                                                        $date = date_create($row_typeb['date_create']);
                                                        echo date_format($date, "d-m-Y H:i:s");
                                                    ?>
                                                    </td>
                                            <?php 
                                                if($level == 1)
                                                {
                                            ?>
                                                    <td><a href="e-loai-blog.php?id=<?php echo $row_typeb['id_type']; ?>" class="btn btn-info"><i class="fas fa-pen-nib"></i></a></td>
                                                    <td><a href="loai-blog.php?id=<?php echo $row_typeb['id_type']; ?>" onclick="return confirm('Dữ liệu này sẽ được xóa vĩnh viễn. Đồng ý?');" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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