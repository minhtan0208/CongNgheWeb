<?php 
    
    // open session
    session_start();

    if(isset($_SESSION['user']) && isset($_SESSION['level']))
    {
        // include
        include('includes/header.php');
        include('includes/navbar.php');
        include('includes/left-sidebar.php');

        // include function
        require('modules/functions.php');

        // get info
        // get user
        $level_session = $_SESSION['level'];
        $username = $_SESSION['user'];
        $user = "SELECT password FROM account WHERE email = '$username'";
        $rs_user = mysqli_query($conn, $user);
        $row_user = mysqli_fetch_array($rs_user);
        $old_pass = $row_user['password'];

        // save
        if(isset($_POST['change-pass']))
        {
            $password_old = md5($_POST['password_old']);
            $password_new = md5($_POST['password_new']);
            $repass_new = md5($_POST['repass_new']);

            if($password_old && $password_new && $repass_new)
            {
                if($password_old != $old_pass)
                {
                    echo "<script>alert('Mật khẩu cũ không đúng!.');</script>";
                }
                else
                {
                    if($password_new != $repass_new)
                    {
                        echo "<script>alert('Mật khẩu mới không trùng nhau!.');</script>";
                    }
                    else
                    {
                        if($password_new == "d41d8cd98f00b204e9800998ecf8427e" && $repass_new == "d41d8cd98f00b204e9800998ecf8427e")
                        {
                            echo "<script>alert('Vui lòng đặt mật khẩu mới');</script>";
                        }
                        else
                        {
                            $update = "UPDATE account SET password = '$password_new' WHERE email = '$username'";
                            mysqli_query($conn, $update);
                            echo "<script>alert('Đổi mật khẩu thành công');</script>";
                            echo "<script>location.href='doi-mat-khau.php';</script>";
                        }
                    }
                }
            }
            else
            {
                echo "<script>alert('Vui lòng nhập đầy đủ!.');</script>";
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
                                <h2 class="pageheader-title" style="font-family: 'Roboto Condensed', sans-serif;">Quản trị Website Thư Viện</h2>
                                <!--
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                -->
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Trang chính</a></li>
                                            <li class="breadcrumb-item"><a href="tai-khoan.php" class="breadcrumb-link">Tài khoản</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Danh sách tài khoản</li>
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
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Danh sách tài khoản
                                    <div class="btn_function float-right">
                                    <?php

                                        if($level_session == 1)
                                        {
                                            echo "<a href='them-tai-khoan.php' class='btn btn-outline-primary'><i class='fas fa-plus'></i> tài khoản</a>";
                                        }
                                        else
                                        {
                                            echo "<button type='button' class='btn btn-outline-primary' disabled>
                                                    <i class='fas fa-plus'></i> tài khoản
                                                </button>";
                                        }
                                    ?>  
                                    </div>
                                </h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">STT</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Avatar</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Họ tên</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Email</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Số điện thoại</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Địa chỉ</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Ngày lập</th>
                                                    <th class="border-0" style="font-family: 'Roboto Condensed', sans-serif;">Phân quyền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
    <?php 

        // include
        $acc = "SELECT * FROM account ORDER BY date_create DESC";
        $rs_acc = mysqli_query($conn, $acc);
        $count = 0;
        while ($row_acc = mysqli_fetch_array($rs_acc))
        {
            $count++;

    ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td>
                                                        <div class="m-r-10"><img src="public/images/avatars/<?php echo $row_acc['image']; ?>" alt="user" class="rounded" width="45"></div>
                                                    </td>
                                                    <td><?php echo $row_acc['name']; ?></td>
                                                    <td><?php echo $row_acc['email']; ?></td>
                                                    <td><?php echo $row_acc['phone']; ?></td>
                                                    <td width="20%"><?php echo $row_acc['address']; ?></td>
                                                    <td>
                                                    <?php 
                                                        $date = date_create($row_acc['date_create']);
                                                        echo date_format($date, "d-m-Y");
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                        if($row_acc['level'] == 1)
                                                        {
                                                            echo "<span class='badge-dot badge-success mr-1'></span> Quản trị";
                                                        }
                                                        else if($row_acc['level'] == 0)
                                                        {
                                                            echo "<span class='badge-dot badge-brand mr-1'></span> Nhân viên";
                                                        }
                                                        else
                                                        {
                                                            echo "<span class='badge-dot badge-info mr-1'></span> Khách hàng";
                                                        }
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