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

        // get data
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $data = "SELECT image, sku_product, name_product, highlight, qty, price, summary FROM product WHERE sku_product = '$id'";
            $rs_data = mysqli_query($conn, $data);
            $row_data = mysqli_fetch_array($rs_data);
            $old_image = $row_data['image'];
        }

        // upload blog
        if(isset($_POST['upload']))
        {
            // get data
            $name_product = $_POST['name_product'];
            $slug = generateURL($name_product);
            $summary = $_POST['summary'];
            
            $qty = $_POST['qty'];
            $price = $_POST['price'];
            $highlight = $_POST['highlight'];
            $id_type = $_POST['id_type'];


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
                        

                        // remove old file
                        $remove_image = $target_dir . $old_image;
                        if($old_image != "no-image.png")
                        {
                            unlink($remove_image);
                        }

                        // upload file to host
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                        // add new record
                        $update = "UPDATE product SET
                                image = '".$name_code."',
                                name_product = '".$name_product."',
                                slug = '".$slug."',
                                summary = '".$summary."',
                              
                                qty = '".$qty."',
                                price = '".$price."',
                                highlight = '".$highlight."',
                                id_type = '".$id_type."'
                                WHERE sku_product = '$id'";
                        mysqli_query($conn, $update);
                        echo "<script>alert('Lưu lại thành công');</script>";
                        echo "<script>location.href='san-pham.php';</script>";
                    }
                }
                else
                {
                    echo "<script>alert('Vui lòng nhập tên sản phẩm');</script>";
                }
            }
            else
            {
                if($name_product)
                {
                    // insert to history
                    $text = " đã chỉnh sửa sản phẩm <b>". $name_product . "</b>";
                    $time = date('Y-m-d H:i:s');
                    $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
                    mysqli_query($conn, $ins_his);

                    // add new record
                    $update = "UPDATE product SET
                            name_product = '".$name_product."',
                            slug = '".$slug."',
                            summary = '".$summary."',
                            
                            qty = '".$qty."',
                            price = '".$price."',
                            highlight = '".$highlight."',
                            id_type = '".$id_type."'
                            WHERE sku_product = '$id'";
                    mysqli_query($conn, $update);
                    echo "<script>alert('Lưu lại thành công');</script>";
                    echo "<script>location.href='san-pham.php';</script>";
                }
                else
                {
                    echo "<script>alert('Vui lòng nhập tên sản phẩm');</script>";
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
                                            <li class="breadcrumb-item active" aria-current="page">Đăng tải sách</li>
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
                                                    <input class="form-control" type="text" name="sku_product" value="<?php echo $row_data['sku_product']; ?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tên sách*:</label>
                                                    <textarea class="form-control" name="name_product"><?php echo $row_data['name_product']; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Chọn ảnh sách:</label>
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                                <div class="form-group">
                                                    <label>Chọn loại sách:</label>
                                                    <select class="form-control" name="id_type">
                                                    <?php 

                                                        // show type blog
                                                        $type_ac = "SELECT tp.id_type as id_type, typename FROM type_product tp, product p WHERE p.id_type = tp.id_type AND sku_product = '$id'";
                                                        $rs_type_ac = mysqli_query($conn, $type_ac);
                                                        $row_type_ac = mysqli_fetch_array($rs_type_ac);
                                                        $id_type_ac = $row_type_ac['id_type'];

                                                    ?>
                                                        <option value="<?php echo $row_type_ac['id_type']; ?>"><?php echo $row_type_ac['typename']; ?></option>

                                                    <?php 

                                                        // show type blog
                                                        $type_op = "SELECT id_type, typename FROM type_product WHERE id_type <> $id_type_ac";
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
                                                    <?php 

                                                        if($row_data['highlight'] == 1)
                                                        {
                                                    ?>
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                    ?>
                                                        <option value="0">Không</option>
                                                        <option value="1">Có</option>
                                                    <?php
                                                        }
                                                    ?>    
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Số lượng nhập hàng:</label>
                                                    <input class="form-control" type="text" name="qty"value="<?php echo $row_data['qty']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Giá sách:</label>
                                                    <input class="form-control" type="text" name="price" value="<?php echo $row_data['price']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mô tả ngắn:</label>
                                                    <textarea class="form-control" name="summary"><?php echo $row_data['summary']; ?></textarea>
                                                </div>
                                                
                                                <button type='submit' class='btn btn-warning' name='upload'>Lưu lại</button>
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