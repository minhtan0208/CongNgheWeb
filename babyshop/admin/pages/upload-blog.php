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

        // upload blog
        if(isset($_POST['upload']))
        {
            // get data
            $title = $_POST['title'];
            $slug = generateURL($title);
            $id_type = $_POST['id_type'];
            $highlight = $_POST['highlight'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $author =  $id_acc;
            $date_upload = date("Y-m-d H:i:s");
            $view = 0;
            $flag = 0;

            // setup image thumbnail
            $target_dir = "public/images/blogs/";
            $image = $_FILES['image']['name'];
            $name_code = name_code($image);
            $imageFileType = strtolower(pathinfo($name_code, PATHINFO_EXTENSION));
            $target_file = $target_dir.$name_code;

            if($image)
            {
                if($title)
                {
                    if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif")
                    {
                        echo "<script>alert('Chỉ nhận file ảnh dạng: jpg, jpeg, png, gif.');</script>";
                    }
                    else
                    {
                        // insert to history
                        $text = " đã đăng bài viết <b>". $title . "</b>";
                        $time = date('Y-m-d H:i:s');
                        $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
                        mysqli_query($conn, $ins_his);

                        // upload file to host
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                        // add new record
                        $ins = "INSERT INTO blog(image, title, slug, summary, content, date_upload, author, highlight, view, flag, id_type) VALUES('".$name_code."', '".$title."', '".$slug."', '".$summary."', '".$content."', '".$date_upload."', '".$author."', ".$highlight.", ".$view.", ".$flag.", ".$id_type.")";
                        mysqli_query($conn, $ins);
                        echo "<script>alert('Đăng tải bài viết thành công');</script>";
                        echo "<script>location.href='blog.php';</script>";
                    }
                }
                else
                {
                    echo "<script>alert('Vui lòng nhập tiêu đề bài viết');</script>";
                }
            }
            else
            {
                if($title)
                {
                    // insert to history
                    $text = " đã đăng bài viết <b>". $title . "</b>";
                    $time = date('Y-m-d H:i:s');
                    $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
                    mysqli_query($conn, $ins_his);
                            
                    $name_code = "no-image.jpg";
                    // add new record
                    $ins = "INSERT INTO blog(image, title, slug, summary, content, date_upload, author, highlight, view, flag, id_type) VALUES('".$name_code."', '".$title."', '".$slug."', '".$summary."', '".$content."', '".$date_upload."', '".$author."', ".$highlight.", ".$view.", ".$flag.", ".$id_type.")";
                    mysqli_query($conn, $ins);
                    echo "<script>alert('Đăng tải bài viết thành công');</script>";
                    echo "<script>location.href='blog.php';</script>";
                }
                else
                {
                     echo "<script>alert('Vui lòng nhập tiêu đề bài viết');</script>";
                }
            }
        }
        // end submit upload blog
        
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
                                            <li class="breadcrumb-item"><a href="blog.php" class="breadcrumb-link">Bài viết</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Đăng tải bài viết</li>
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
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Đăng bài mới</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-xs-12">
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Tiêu đề bài viết*:</label>
                                                    <textarea class="form-control" name="title"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Chọn ảnh thumbnail:</label>
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                                <div class="form-group">
                                                    <label>Chọn loại bài viết:</label>
                                                    <select class="form-control" name="id_type">
                                <?php 

                                    // show type blog
                                    $type_op = "SELECT id_type, typename FROM type_blog";
                                    $rs_type_op = mysqli_query($conn, $type_op);
                                    while ($row_type_op = mysqli_fetch_array($rs_type_op))
                                    {
                                ?>
                                                        <option value="<?php echo $row_type_op['id_type']; ?>"><?php echo $row_type_op['typename']; ?></option>
                                <?php 
                                    }
                                    // end while
                                ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Bài viết nổi bật:</label>
                                                    <select class="form-control" name="highlight">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tóm tắt:</label>
                                                    <textarea class="form-control" name="summary"><?php if(isset($summary)){ echo $summary; } ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nội dung bài viết:</label>
                                                     <textarea class="form-control" id="ckeditor" name="content"><?php if(isset($content)){ echo $content; } ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ngày đăng:</label>
                                                    <input type="text" name="date_upload" class="form-control" value="<?php echo date('d-m-Y H:i:s'); ?>" disabled>
                                                </div>
                                                <button type='submit' class='btn btn-primary' name='upload'>Đăng lên</button>
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