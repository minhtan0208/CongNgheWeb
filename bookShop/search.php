

<?php 
	
	if(isset($_POST['tim_kiem']))
	{
		$key_word = $_POST['key_word'];
		$link = "tim-kiem.php?key=".$key_word;
		echo "<script>location.href='".$link."';</script>";
	}
?>