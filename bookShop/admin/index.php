<?php 
	
    session_start();

	if(isset($_SESSION['user']) && isset($_SESSION['level']))
    {
    	// go to admin
    	header('Location: pages/index.php');
    }
    else
    {
    	// comeback home
    	header('Location: pages/dang-nhap.php');
    }
?>