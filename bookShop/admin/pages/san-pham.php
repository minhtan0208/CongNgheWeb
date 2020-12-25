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
            $target_dir = "public/images/products/";
            $id = $_GET['id'];
            $sql = "SELECT sku_product, image, name_product FROM product WHERE sku_product = '$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $delname = $row['name_product'];
            $sku_product = $row['sku_product'];

            // remove old image attach and delete record
            $attach = "SELECT name_image FROM image WHERE sku_product = '$sku_product'";
            $rs_attach = mysqli_query($conn, $attach);
            while ($row_attach = mysqli_fetch_array($rs_attach)) 
            {
                $image_attach = $row_attach['name_image'];
                $remove_attach = $target_dir.$image_attach;
                if($image_attach != 'no-image.png')
                {
                    unlink($remove_attach);
                }

                // remove record image attach
                $del_attach = "DELETE FROM image WHERE sku_product = '$sku_product'";
                mysqli_query($conn, $del_attach);
            }

            // remove image of product
            $old_image = $row['image'];
            $target_file = $target_dir . $old_image;
            if($old_image != "no-image.png")
            {
                unlink($target_file);
            }


            // insert to history
            $text = " đã xóa sản phẩm <b>". $delname . "</b>";
            $time = date('Y-m-d H:i:s');
            $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
            mysqli_query($conn, $ins_his);

            // delete record product
            $del = "DELETE FROM product WHERE sku_product = '$id'";
            mysqli_query($conn, $del);
            echo "<script>alert('Xóa sản phẩm thành công');</script>";
            echo "<script>location.href='san-pham.php';</script>";
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
                                            <li class="breadcrumb-item"><a href="san-pham.php" class="breadcrumb-link">Sản phẩm</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
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
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Danh sách các loại sách
                                    <div class="btn_function float-right">
                                        <a href='upload-san-pham.php' class='btn btn-outline-primary'><i class='fas fa-plus'></i>Thêm Sách</a>
                                    </div>
                                </h5>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">STT</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Ảnh sản phẩm</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Tên sản phẩm</th>
                                                     <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Mô tả</th>
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
                                $product = "SELECT sku_product, image, name_product, date_upload, summary, typename, flag FROM product p, type_product tp WHERE p.id_type = tp.id_type ORDER BY date_upload DESC";
                                $rs_product = mysqli_query($conn, $product);
                                $count = 0;
                                while ($row_product = mysqli_fetch_array($rs_product)) 
                                {
                                    $count++;
                        ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td>
                                                        <div class="m-r-10">
                                                            <a href="anh-san-pham.php?id=<?php echo $row_product['sku_product']; ?>" title="Click để thêm ảnh sách">
                                                                <img src="public/images/products/<?php echo $row_product['image']; ?>" alt="<?php echo $row_product['image']; ?>" class="rounded" width="60">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row_product['name_product']; ?></td>
                                                    <td><?php echo $row_product['summary']; ?></td>
                                                    <td width="10%"><?php echo $row_product['typename']; ?></td>
                                                    <td width="10%">
                                                    <?php 
                                                        $date = date_create($row_product['date_upload']);
                                                        echo date_format($date, "d-m-Y H:i:s");
                                                    ?>
                                                    </td>
                                                    <td>
                                                <?php 

                                                    if($row_product['flag'] == 1)
                                                    {
                                                        echo "<a href='modules/flags.php?id=".$row_product['sku_product']."&tbl=product' class='btn btn-light'>
                                                                <i class='fas fa-times'></i>
                                                            </a>";
                                                    }
                                                    else
                                                    {
                                                        echo "<a href='modules/flags.php?id=".$row_product['sku_product']."&tbl=product' class='btn btn-success'>
                                                                <i class='fas fa-check'></i>
                                                            </a>";
                                                        
                                                    }
                                                ?> 
                                                    </td>
                                                    <td><a href="e-upload-san-pham.php?id=<?php echo $row_product['sku_product']; ?>" class="btn btn-info"><i class="fas fa-pen-nib"></i></a></td>
                                                    <td><a href="san-pham.php?id=<?php echo $row_product['sku_product']; ?>" onclick="return confirm('Dữ liệu này sẽ được xóa vĩnh viễn. Đồng ý?');" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                                                </tr>
                        <?php 
                                }
                                // end while
                            }
                            else
                            {
                                $product2 = "SELECT sku_product, p.image as image, name_product, date_upload, p.slug as slug, typename, flag FROM product p, type_product tp, account a WHERE p.id_type = tp.id_type AND a.id_acc = p.author AND email = '$users' ORDER BY date_upload DESC";
                                $rs_product2 = mysqli_query($conn, $product2);
                                $count = 0;
                                while ($row_product2 = mysqli_fetch_array($rs_product2)) 
                                {
                                    $count++;

                        ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td>
                                                        <div class="m-r-10">
                                                            <?php
                                                                
                                                                if($row_product2['flag'] == 1)
                                                                {
                                                                    echo "<img src='public/images/products/".$row_product2['image']."' alt='".$row_product2['image']."' class='rounded' width='60'>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<a href='anh-san-pham.php?id=".$row_product2['sku_product']."' title='Click để thêm ảnh sách'>
                                                                        <img src='public/images/products/".$row_product2['image']."' alt='".$row_product2['image']."' class='rounded' width='60'>
                                                                        </a>";
                                                                }
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row_product2['name_product']; ?></td>
                                                    <td><?php echo $row_product2['slug']; ?></td>
                                                    <td width="10%"><?php echo $row_product2['typename']; ?></td>
                                                    <td width="10%">
                                                    <?php 
                                                        $date = date_create($row_product2['date_upload']);
                                                        echo date_format($date, "d-m-Y H:i:s");
                                                    ?>
                                                    </td>
                                                    <td>
                                                <?php
                                                    if($row_product2['flag'] == 1)
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

                                                    if($row_product2['flag'] == 1)
                                                    {
                                                        // da duyet ko duoc sua xoa
                                                        echo "<td><button type='button' class='btn btn-info' disabled><i class='fas fa-pen-nib'></i></button></td>";
                                                        echo "<td><button type='button' class='btn btn-danger' disabled><i class='fas fa-trash-alt'></i></button></td>";
                                                    }
                                                    else
                                                    {
                                                        echo "<td><a href='e-upload-san-pham.php?id=".$row_product2['sku_product']."' class='btn btn-info'><i class='fas fa-pen-nib'></i></a></td>";
                                                        echo "<td><a href='san-pham.php?id=".$row_product2['sku_product']."' onclick='return confirm('Dữ liệu này sẽ được xóa vĩnh viễn. Đồng ý?');' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></td>";
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