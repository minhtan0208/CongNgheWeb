<?php 
    
    if(isset($_SESSION['user']) && isset($_SESSION['level']))
    {
        // get user
        $email = $_SESSION['user'];
        $user = "SELECT image, name FROM account WHERE email = '$email'";
        $rs_user = mysqli_query($conn, $user);
        $row_user = mysqli_fetch_array($rs_user);
        $avatar = $row_user['image'];
        $name = $row_user['name'];
    }
?>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.php">KGU&copy;2020</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Tìm kiếm..">
                            </div>
                        </li>
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-history"></i><!--<span class='indicator'></span>--></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Lịch sử </div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                <?php 
                                    // get data notification
                                    $his = "SELECT text, time, image, name FROM history h, account a WHERE a.id_acc = h.id_acc ORDER BY time DESC LIMIT 10";
                                    $rs_his = mysqli_query($conn, $his);
                                    // set flag 
                                    while ($row_his = mysqli_fetch_array($rs_his)) 
                                    {

                                    ?>
                                            <a href="history.php" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="public/images/avatars/<?php echo $row_his['image']; ?>" alt="<?php echo $row_his['image']; ?>" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block">
                                                        <!--
                                                        <span class="notification-list-user-name">Jeremy Rakestraw</span>-->
                                                        <?php echo "<b>" . $row_his['name'] . "</b>" . $row_his['text']; ?>
                                                        <div class="notification-date">
                                                            <?php 
                                                                $date = date_create($row_his['time']);
                                                                echo date_format($date, "d-m-Y H:i:s");
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                    <?php
                                    }
                                    // end while
                                ?>   
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="history.php">Xem tất cả</a></div>
                                </li>
                            </ul>
                        </li>
                        <!--
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/github.png" alt="" > <span>Github</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dribbble.png" alt="" > <span>Dribbble</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dropbox.png" alt="" > <span>Dropbox</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/bitbucket.png" alt=""> <span>Bitbucket</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/mail_chimp.png" alt="" ><span>Mail chimp</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/slack.png" alt="" > <span>Slack</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="conntection-footer"><a href="#">More</a></div>
                                </li>
                            </ul>
                        </li>
                        -->
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="public/images/avatars/<?php echo $avatar; ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name" style="font-family: 'Roboto Condensed', sans-serif;"><?php echo $name; ?></h5>
                                    <span class="status"></span><span class="ml-2">Online</span>
                                </div>
                                <a class="dropdown-item" href="thong-tin-tai-khoan.php"><i class="fas fa-user mr-2"></i>Thông tin cá nhân</a>
                                <a class="dropdown-item" href="doi-mat-khau.php"><i class="fas fa-cog mr-2"></i>Đổi mật khẩu</a>
                                <a class="dropdown-item" href="dang-xuat.php"><i class="fas fa-power-off mr-2"></i>Đăng xuất</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->