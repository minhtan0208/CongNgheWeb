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
                                            <li class="breadcrumb-item"><a href="history.php" class="breadcrumb-link">Lịch sử</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Tất cả lịch sử</li>
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
                        <!-- table -->
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Lịch sử
                                </h5>
                                <div class="card-body pr-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Ảnh</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Thông báo</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Thời gian</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            <?php 
                                
                                $his = "SELECT text, time, image, name FROM history h, account a WHERE a.id_acc = h.id_acc ORDER BY time DESC";
                                $rs_his = mysqli_query($conn, $his);
                                while ($row_his = mysqli_fetch_array($rs_his)) 
                                {
                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="m-r-10"><img src="public/images/avatars/<?php echo $row_his['image']; ?>" alt="<?php echo $row_his['image']; ?>" class="rounded" width="45"></div>
                                                    </td>
                                                    <td><?php echo "<b>" . $row_his['name'] . "</b>" . $row_his['text']; ?></td>
                                                    <td>
                                                    <?php 
                                                        $date = date_create($row_his['time']);
                                                        echo date_format($date, "d-m-Y H:i:s");
                                                    ?>
                                                    </td> 
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