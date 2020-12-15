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
        if(isset($_POST['save']))
        {
            $name_type = $_POST['name_type'];
            $slug = generateURL($name_type);
            $date_create = date("Y-m-d H:i:s");

            if($name_type)
            {
                // insert data
                $ins = "INSERT INTO type_product(typename, slug_type, date_create) VALUES('$name_type', '$slug', '$date_create')";
                mysqli_query($conn, $ins);
                echo "<script>alert('Tạo loại sản phẩm thành công');</script>";
                echo "<script>location.href='loai-san-pham.php';</script>";

                // insert to history
                $text = " đã tạo loại sản phẩm <b>". $name_type . "</b>";
                $time = date('Y-m-d H:i:s');
                $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
                mysqli_query($conn, $ins_his);
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
            $target_dir = "public/images/products/";

            // get data type product
            $data = "SELECT id_type, typename FROM type_product WHERE id_type = $id";
            $rs_data = mysqli_query($conn, $data);
            $row_data = mysqli_fetch_array($rs_data);
            $delname = $row_data['typename'];
            $id_type = $row_data['id_type'];

            // remove image product and products of type
            $p = "SELECT sku_product, image FROM product WHERE id_type = $id";
            $rs_p = mysqli_query($conn, $p);
            while($row_p = mysqli_fetch_array($rs_p))
            {
                $sku_product = $row_p['sku_product'];
                
                // remove image attach product and record attach product
                $attach = "SELECT name_image FROM image WHERE sku_product = '$sku_product'";
                $rs_attach = mysqli_query($conn, $attach);
                while ($row_image_attach = mysqli_fetch_array($rs_attach)) 
                {
                    // remove image attach
                    $image_attach = $row_image_attach['name_image'];
                    $remove_attach = $target_dir . $image_attach;
                    if($image_attach != "no-image.png")
                    {
                        unlink($remove_attach);
                    }

                    // delete record image attach
                    $del_attach = "DELETE FROM image WHERE sku_product = '$sku_product'";
                    mysqli_query($conn, $del_attach);
                }
                

                // remove image product
                $image_p = $row_p['image'];
                $remove_image_p = $target_dir . $image_p;
                if($image_p != "no-image.png")
                {
                    unlink($remove_image_p);
                }

                // remove record products
                $del_p = "DELETE FROM product WHERE id_type = $id";
                mysqli_query($conn, $del_p);
            }
            

            // insert to history
            $text = " đã xóa loại sản phẩm <b>". $delname . "</b>";
            $time = date('Y-m-d H:i:s');
            $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
            mysqli_query($conn, $ins_his);

            // delete record type product
            $del = "DELETE FROM type_product WHERE id_type = $id";
            mysqli_query($conn, $del);
            echo "<script>alert('Xóa thành công');</script>";
            echo "<script>location.href='loai-san-pham.php';</script>";
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
                                            <li class="breadcrumb-item"><a href="san-pham.php" class="breadcrumb-link">Sản phẩm</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Tạo loại sản phẩm</li>
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
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Tạo loại sản phẩm</h5>
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
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Danh sách loại sản phẩm
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
                                
                                $typep = "SELECT * FROM type_product ORDER BY typename DESC";
                                $rs_typep = mysqli_query($conn, $typep);
                                $count = 0;
                                while ($row_typep = mysqli_fetch_array($rs_typep)) 
                                {
                                    $count++;
                            ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $row_typep['typename']; ?></td>
                                                    <td><?php echo $row_typep['slug_type']; ?></td>
                                                    <td>
                                                    <?php 
                                                        $date = date_create($row_typep['date_create']);
                                                        echo date_format($date, "d-m-Y H:i:s");
                                                    ?>
                                                    </td>



                                                <?php 
                                                    if($level == 1)
                                                    {
                                                ?>
                                                        <td><a href="e-loai-san-pham.php?id=<?php echo $row_typep['id_type']; ?>" class="btn btn-info"><i class="fas fa-pen-nib"></i></a></td>
                                                        <td><a href="loai-san-pham.php?id=<?php echo $row_typep['id_type']; ?>" onclick="return confirm('Dữ liệu này sẽ được xóa vĩnh viễn. Đồng ý?');" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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