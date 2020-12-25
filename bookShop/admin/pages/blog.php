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

        // delete
        if(isset($_GET['id']))
        {
            $target_dir = "public/images/blogs/";
            $id = $_GET['id'];
            $sql = "SELECT image, title FROM blog WHERE id_blog = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $delname = $row['title'];

            $old_image = $row['image'];
            $target_file = $target_dir.$old_image;
            if($old_image != "no-image.jpg")
            {
                unlink($target_file);
            }

            // insert to history
            $text = " đã xóa bài viết: <b>". $delname . "</b>";
            $time = date('Y-m-d H:i:s');
            $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
            mysqli_query($conn, $ins_his);

            $del = "DELETE FROM blog WHERE id_blog = $id";
            mysqli_query($conn, $del);
            echo "<script>alert('Xóa bài viết thành công');</script>";
            echo "<script>location.href='blog.php';</script>";
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
                                            <li class="breadcrumb-item active" aria-current="page">Danh sách bài viết</li>
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
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Danh sách bài viết
                                    <div class="btn_function float-right">
                                        <a href='upload-blog.php' class='btn btn-outline-primary'><i class='fas fa-plus'></i> Bài viết</a>
                                    </div>
                                </h5>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">STT</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Ảnh</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Tiêu đề</th>
                                                     <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Slug</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Loại</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Ngày đăng</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Duyệt</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Sửa</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                        <?php 
                            
                            // check session 
                            if($level == 1)
                            {
                                $blog = "SELECT id_blog, image, title, date_upload, b.slug as slug, typename, flag FROM blog b, type_blog tb WHERE b.id_type = tb.id_type ORDER BY date_upload DESC";
                                $rs_blog = mysqli_query($conn, $blog);
                                $count = 0;
                                while ($row_blog = mysqli_fetch_array($rs_blog)) 
                                {
                                    $count++;
                        ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td>
                                                        <div class="m-r-10"><img src="public/images/blogs/<?php echo $row_blog['image']; ?>" alt="<?php echo $row_blog['image']; ?>" class="rounded" width="60"></div>
                                                    </td>
                                                    <td><?php echo $row_blog['title']; ?></td>
                                                    <td><?php echo $row_blog['slug']; ?></td>
                                                    <td width="10%"><?php echo $row_blog['typename']; ?></td>
                                                    <td width="10%">
                                                    <?php 
                                                        $date = date_create($row_blog['date_upload']);
                                                        echo date_format($date, "d-m-Y H:i:s");
                                                    ?>
                                                    </td>
                                                    <td>
                                                <?php 

                                                    if($row_blog['flag'] == 1)
                                                    {
                                                        echo "<a href='modules/flags.php?id=".$row_blog['id_blog']."&tbl=blog' class='btn btn-light'>
                                                                <i class='fas fa-times'></i>
                                                            </a>";
                                                    }
                                                    else
                                                    {
                                                        echo "<a href='modules/flags.php?id=".$row_blog['id_blog']."&tbl=blog' class='btn btn-success'>
                                                                <i class='fas fa-check'></i>
                                                            </a>";
                                                        
                                                    }
                                                ?> 
                                                    </td>
                                                    <td><a href="e-upload-blog.php?id=<?php echo $row_blog['id_blog']; ?>" class="btn btn-info"><i class="fas fa-pen-nib"></i></a></td>
                                                    <td><a href="blog.php?id=<?php echo $row_blog['id_blog']; ?>" onclick="return confirm('Dữ liệu này sẽ được xóa vĩnh viễn. Đồng ý?');" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                                                </tr>
                        <?php 
                                }
                                // end while
                            }
                            else
                            {
                                $blog2 = "SELECT id_blog, b.image as image, title, date_upload, b.slug as slug, typename, flag FROM blog b, type_blog tb, account a WHERE b.id_type = tb.id_type AND a.id_acc = b.author AND email = '$users' ORDER BY date_upload DESC";
                                $rs_blog2 = mysqli_query($conn, $blog2);
                                $count = 0;
                                while ($row_blog2 = mysqli_fetch_array($rs_blog2)) 
                                {
                                    $count++;

                        ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td>
                                                        <div class="m-r-10"><img src="public/images/blogs/<?php echo $row_blog2['image']; ?>" alt="<?php echo $row_blog2['image']; ?>" class="rounded" width="60"></div>
                                                    </td>
                                                    <td><?php echo $row_blog2['title']; ?></td>
                                                    <td><?php echo $row_blog2['slug']; ?></td>
                                                    <td width="10%"><?php echo $row_blog2['typename']; ?></td>
                                                    <td width="10%">
                                                    <?php 
                                                        $date = date_create($row_blog2['date_upload']);
                                                        echo date_format($date, "d-m-Y H:i:s");
                                                    ?>
                                                    </td>
                                                    <td>
                                                <?php
                                                    if($row_blog2['flag'] == 1)
                                                    {
                                                        echo "<button type='button' class='btn btn-light' disabled><i class='fas fa-times'></i></button>";
                                                    }
                                                    else
                                                    {
                                                        echo "<button type='button' class='btn btn-success' disabled><i class='fas fa-check'></i></button>";
                                                    }
                                                ?> 
                                                    </td>
                                                <?php 

                                                    if($row_blog2['flag'] == 1)
                                                    {
                                                        // da duyet ko duoc sua xoa
                                                        echo "<td><button type='button' class='btn btn-info' disabled><i class='fas fa-pen-nib'></i></button></td>";
                                                        echo "<td><button type='button' class='btn btn-danger' disabled><i class='fas fa-trash-alt'></i></button></td>";
                                                    }
                                                    else
                                                    {
                                                        echo "<td><a href='e-upload-blog.php?id=".$row_blog2['id_blog']."' class='btn btn-info'><i class='fas fa-pen-nib'></i></a></td>";
                                                        echo "<td><a href='blog.php?id=".$row_blog2['id_blog']."' onclick='return confirm('Dữ liệu này sẽ được xóa vĩnh viễn. Đồng ý?');' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></td>";
                                                    }
                                                ?>
                                                </tr>
                        <?php
                                }
                                // end while 2
                            }
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