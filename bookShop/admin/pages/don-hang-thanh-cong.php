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

        if(isset($_GET['code_invoice']))
        {
            $code_invoice = $_GET['code_invoice'];
            // update flag invoice
            $update = "UPDATE invoice SET flag = 2 WHERE code_invoice = '$code_invoice'";
            $rs_update = mysqli_query($conn, $update);

            // insert to history
            $text = " đã xác nhận  thành công  <b>". $code_invoice . "</b>";
            $time = date('Y-m-d H:i:s');
            $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
            mysqli_query($conn, $ins_his);
            
            echo "<script>alert('Hoàn tất ');</script>";
            echo "<script>location.href='van-chuyen.php';</script>";
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
                                            <li class="breadcrumb-item"><a href="don-hang.php" class="breadcrumb-link">Mượn sách</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Quản lý mượn sách</li>
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
                                <div class="card-header">
                                     <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Trả sách thành công</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Mã sách</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Tên khách hàng</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Địa chỉ</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Số điện thoại</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Ngày mượn</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Xem chi tiết</th>
                                                </tr>
                                            </thead>
                                            <tbody>
    <?php

        $invoice = "SELECT code_invoice, order_date, info_receive, info_product, name, address, phone  FROM invoice inv, account a WHERE inv.id_customer = a.id_acc AND flag = 2 ORDER BY order_date DESC";
        $rs_invoice = mysqli_query($conn, $invoice);
        while ($row_invoice = mysqli_fetch_array($rs_invoice)) 
        {
    ?>
                                                <tr>
                                                    <td><?php echo $row_invoice['code_invoice']; ?></td>
                                                    <td><?php echo $row_invoice['name']; ?></td>
                                                    <td><?php echo $row_invoice['address']; ?></td>
                                                    <td><?php echo $row_invoice['phone']; ?></td>
                                                    <td>
                                                        <?php
                                                            $date = date_create($row_invoice['order_date']);
                                                            echo date_format($date, 'd/m/Y H:i:s'); 
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="chi-tiet-don-hang.php?code_invoice=<?php echo $row_invoice['code_invoice']; ?>&delivery" class="btn btn-outline-info" title="Xem chi tiết đơn hàng">
                                                            Chi tiết
                                                        </a>
                                                    </td>
                                                </tr>
    <?php 
        }
        // end while
    ?>
                                            </tbody>
                                        </table>                       
                                    </div>
                                    <!-- row -->
                                </div>
                                <!-- card body -->
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