<?php 

	session_start();

	if(isset($_SESSION['customer']) && isset($_SESSION['level']))
	{
		$customer = $_SESSION['customer'];
		$level = $_SESSION['level'];
	}
	// include db
	require_once('admin/pages/modules/config.php');

	// get data logo
	$logo = "SELECT image, link FROM logo WHERE id_lg = 1";
	$rs_logo = mysqli_query($conn, $logo);
	$row_logo = mysqli_fetch_array($rs_logo);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<base href="http://localhost/CongNgheWeb/bookShop/">
	<!-- neu co ten mien khac thi thay doi base -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LIBRARY | WEBSITE THU VIEN</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<!-- Bootstrap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Font Google -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" type="text/css" href="public/owlcarousel/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="public/owlcarousel/owl.theme.default.css">

</head>
<style type="text/css">
	.loader {
        position: fixed;
        z-index: 99;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0.8;
    }
    .loader img {
        width: 540px;
        height: 260px;
    }
    .loader.hidden {
        animation: fadeOut 1s;
        animation-fill-mode: forwards; 
    }
    .language-php{
        background-color: ;
    }
    @keyframes fadeOut {
        100% {
            opacity: 0;
            visibility: hidden;
        }
    }
</style>
<body>
	<div class="loader">
	    <img src="public/images/loading.gif" alt="Loading...">
	</div>
<!-- Comment Facebook -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>
