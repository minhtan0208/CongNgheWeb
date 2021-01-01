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

        // get last record product to set SKU
        $last = "SELECT sku_product FROM product ORDER BY sku_product DESC";
        $rs_last = mysqli_query($conn, $last);
        $row_last = mysqli_fetch_array($rs_last);
        $sku_last = $row_last['sku_product'];
        $cut_num = substr($sku_last, 1);
        $number_last = (int)$cut_num;
        $number_inc = $number_last + 1;

        if($number_inc < 10)
        {
            $sku_product = "S0" . $number_inc;
        }
        else
        {
            $sku_product = "S" . $number_inc;
        }

        // upload product
        if(isset($_POST['upload']))
        {
            // get data
            $name_product = $_POST['name_product'];
            $slug = generateURL($name_product);
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $date_upload = date("Y-m-d H:i:s");
            $author = $id_acc;
            $qty = $_POST['qty'];
            $price = $_POST['price'];
            $highlight = $_POST['highlight'];
            $view = 0;
            $id_type = $_POST['id_type'];
            $flag = 0;


            // setup image thumbnail
            $target_dir = "public/images/products/";
            $image = $_FILES['image']['name'];
            $name_code = name_code($image);
            $imageFileType = strtolower(pathinfo($name_code, PATHINFO_EXTENSION));
            $target_file = $target_dir.$name_code;

            if($image)
            {
                if($name_product)
                {
                    if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif")
                    {
                        echo "<script>alert('Chỉ nhận file ảnh dạng: jpg, jpeg, png, gif.');</script>";
                    }
                    else
                    {
                       

                        // upload file to host
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                        // add new record
                        $ins = "INSERT INTO product(sku_product, image, name_product, slug, summary, date_upload, author, qty, price, highlight, view, id_type, flag) VALUES('".$sku_product."', '".$name_code."', '".$name_product."', '".$slug."', '".$summary."', '".$date_upload."', '".$author."', '".$qty."', '".$price."', '".$highlight."', '".$view."', '".$id_type."', '".$flag."')";
                        mysqli_query($conn, $ins);
                        echo "<script>alert('Upload  thành công');</script>";
                        echo "<script>location.href='san-pham.php';</script>";
                    }
                }
                else
                {
                    echo "<script>alert('Vui lòng nhập tên ');</script>";
                }
            }
            else
            {
                if($name_product)
                {
                    
                            
                    $name_code = "no-image.png";

                    // add new record
                    $ins = "INSERT INTO product(sku_product, image, name_product, slug, summary, date_upload, author, qty, price, highlight, view, id_type, flag) VALUES('".$sku_product."', '".$name_code."', '".$name_product."', '".$slug."', '".$summary."', '".$date_upload."', '".$author."', '".$qty."', '".$price."', '".$highlight."', '".$view."', '".$id_type."', '".$flag."')";
                        mysqli_query($conn, $ins);
                    echo "<script>alert('Upload thành công');</script>";
                    echo "<script>location.href='san-pham.php';</script>";
                }
                else
                {
                    echo "<script>alert('Vui lòng nhập tên ');</script>";
                }
            }
        }
        // end submit upload product
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
                                            <li class="breadcrumb-item"><a href="san-pham.php" class="breadcrumb-link">Sản phẩm</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Đăng tải sản phẩm</li>
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
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Đăng sách mới</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-xs-12">
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Mã sách (SKU):</label>
                                                    <input class="form-control" type="text" name="sku_product" value="<?php echo $sku_product; ?> (Mã tự tạo)" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tên sách*:</label>
                                                    <textarea class="form-control" name="name_product"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Chọn ảnh sách:</label>
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                                <div class="form-group">
                                                    <label>Chọn loại sách:</label>
                                                    <select class="form-control" name="id_type">
                                <?php 

                                    // show type product
                                    $type_op = "SELECT id_type, typename FROM type_product";
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
                                                    <label>Sản phẩm nổi bật:</label>
                                                    <select class="form-control" name="highlight">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Số lượng nhập hàng:</label>
                                                    <input class="form-control" type="text" name="qty"value="1">
                                                </div>
                                                <div class="form-group">
                                                    <label>Giá sản phẩm:</label>
                                                    <input class="form-control" type="text" name="price" value="1000">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mô tả ngắn:</label>
                                                    <textarea class="form-control" name="summary"><?php if(isset($summary)){ echo $summary; } ?></textarea>
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