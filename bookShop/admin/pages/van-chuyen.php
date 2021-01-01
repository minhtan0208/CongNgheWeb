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
            $update = "UPDATE invoice SET flag = 3 WHERE code_invoice = '$code_invoice'";
            $rs_update = mysqli_query($conn, $update);
            
            echo "<script>alert('Thu hồi đơn hàng thành công');</script>";
            echo "<script>location.href='don-hang-thu-hoi.php';</script>";
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
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Đơn hàng</a></li>
                                            <li class="breadcrumb-item"><a href="van-chuyen.php" class="breadcrumb-link">Đang giao</a></li>
                                            
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
    <?php 
        
        $invoice = "SELECT code_invoice, order_date, info_receive, info_product, name, address, phone  FROM invoice inv, account a WHERE inv.id_customer = a.id_acc AND flag = 1 ORDER BY order_date DESC";
        $rs_invoice = mysqli_query($conn, $invoice);
        while ($row_invoice = mysqli_fetch_array($rs_invoice)) 
        {
    ?>
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                   <i class="fas fa-file-invoice"></i> Mã đơn hàng: 
                                        <?php echo $row_invoice['code_invoice']; ?>
                                        <?php 
                                            $date = date_create($row_invoice['order_date']);
                                            echo "(" . date_format($date, "d/m/Y H:i:s") . ")";
                                        ?>
                                        <a href="chi-tiet-don-hang.php?code_invoice=<?php echo $row_invoice['code_invoice']; ?>&delivery" class="btn btn-outline-info float-right" title="Xem chi tiết đơn hàng">
                                            Chi tiết sách
                                        </a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-2 text-center">
                                            <img src="public/images/invoice.png" width="75%">
                                        </div>
                                        <!-- col-lg-2 -->
                                        <div class="col-lg-10" style="text-align:  justify;">
                                            <p style="font-family: 'Roboto Condensed', sans-serif;">Họ tên khách hàng: <b><?php echo $row_invoice['name']; ?></b></p>
                                            <p style="font-family: 'Roboto Condensed', sans-serif; margin-top: -15px;">Địa chỉ: <b> <?php echo $row_invoice['address']; ?></b><p>
                                            <p style="font-family: 'Roboto Condensed', sans-serif; margin-top: -15px;">Số điện thoại: <b> <?php echo $row_invoice['phone']; ?></b><p>
                                            <p style="font-family: 'Roboto Condensed', sans-serif; margin-top: -15px;">Thông tin nhận hàng mới: <b> <?php echo $row_invoice['info_receive']; ?></b><p>
                                        </div>
                                        <!-- col-lg-10 -->
                                    </div>
                                    <!-- row -->
                                </div>
                                <div class="card-footer">
                                    <a href="delivery.php?code_invoice=<?php echo $row_invoice['code_invoice']; ?>&confirm_delivery" class="btn btn-success" title="Vận chuyển thành công">
                                        <i class="fas fa-check"></i> Giao thành công
                                   
                                   
                                    <a href="cancel-invoice.php?cancel=<?php echo $row_invoice['code_invoice']; ?>&delivery" class="btn btn-danger" title="Hủy bỏ đơn hàng" onclick="return confirm('Đơn hàng này sẽ được hủy vĩnh viễn. Đồng ý?')">
                                        <i class="fas fa-times"></i> Hủy bỏ đơn hàng
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- col-lg-12 -->
    <?php 
        }
        // end while
    ?>                
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