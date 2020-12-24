<?php 
	
	// logout
	session_start();
	session_destroy();
	echo "<script>location.href='trang-chu.html';</script>";
	
?>