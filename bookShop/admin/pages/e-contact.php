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


        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $contact = "SELECT * FROM contact WHERE id_contact = '$id'";
            $rs_contact = mysqli_query($conn, $contact);
            $row_contact = mysqli_fetch_array($rs_contact);
        }

        // create type
        if(isset($_POST['save']))
        {
            $content = $_POST['content'];
            $date_create = date("Y-m-d H:i:s");

            if($content)
            {
                

                // insert data
                $ins = "UPDATE contact SET content = \"$content\" WHERE id_contact = $id";
                mysqli_query($conn, $ins);
                echo "<script>alert('Lưu lại thành công');</script>";
                echo "<script>location.href='footer.php';</script>";
            }
            else
            {
                echo "<script>alert('Vui lòng nhập nội dung!.');</script>";
            }
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
                                            <li class="breadcrumb-item"><a href="footer.php" class="breadcrumb-link">Chân trang</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Cấu hình chân trang</li>
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
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Thêm thông tin liên hệ</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                                <form method="POST">
                                                    <div class="form-group">
                                                        <label>Nội dung*:</label>
                                                        <input type="text" name="content" class="form-control" value="<?php echo $row_contact['content']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ngày tạo:</label>
                                                        <input type="text" name="date_create" class="form-control" value="<?php echo date('d-m-Y H:i:s'); ?>" disabled>
                                                    </div>
                                                    <?php 

                                                        if($level == 1)
                                                        {
                                                            echo "<button type='submit' class='btn btn-warning' name='save'>Lưu lại</button>";
                                                        }
                                                        else
                                                        {
                                                            echo "<button type='submit' class='btn btn-warning' disabled>Lưu lại</button>";
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
                        </div>
                        <!-- row -->
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