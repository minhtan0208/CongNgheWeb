<?php

	session_start();

	//include db
	require_once('config.php');

	if(isset($_SESSION['user']) && isset($_SESSION['level']))
    {
    	$level = $_SESSION['level'];
        $users = $_SESSION['user'];

         // get date from session
        $session = "SELECT * FROM account WHERE email = '".$users."'";
        $rs_session = mysqli_query($conn, $session);
        $row_session = mysqli_fetch_array($rs_session);
        $id_acc = $row_session['id_acc'];
        $name_user = $row_session['name'];

   	} 


	// get value
	if(isset($_GET['id']) && isset($_GET['tbl']))
	{
		$id = $_GET['id'];
		$table = $_GET['tbl'];

		if($table == "blog")
		{
			// get flag
			$sql = "SELECT flag, title FROM blog WHERE id_blog = $id";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$flag = $row['flag'];
			$title = $row['title'];

			if($flag == 1)
			{
				
				// insert to history
                $text = " đã tắt duyệt bài <b>". $title . "</b>";
                $time = date('Y-m-d H:i:s');
                $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
                mysqli_query($conn, $ins_his);

                // update flag
				$update = "UPDATE blog SET flag = 0 WHERE id_blog = $id";
				mysqli_query($conn, $update);
				echo "<script>location.href='../blog.php';</script>";
			}
			else
			{
                // insert to history
                $text = " đã duyệt bài <b>". $title . "</b>";
                $time = date('Y-m-d H:i:s');
                $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
                mysqli_query($conn, $ins_his);

                // update flag
				$update = "UPDATE blog SET flag = 1 WHERE id_blog = $id";
				mysqli_query($conn, $update);
				echo "<script>location.href='../blog.php';</script>";
			}
		}
		// end flag blog


		if($table == "product")
		{
			// get flag
			$sql = "SELECT flag, name_product FROM product WHERE sku_product = '$id'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$flag = $row['flag'];
			$name_product = $row['name_product'];

			if($flag == 1)
			{
				// insert to history
                $text = " đã tắt duyệt sản phẩm <b>". $name_product . "</b>";
                $time = date('Y-m-d H:i:s');
                $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
                mysqli_query($conn, $ins_his);

                // update flag
				$update = "UPDATE product SET flag = 0 WHERE sku_product = '$id'";
				mysqli_query($conn, $update);
				echo "<script>location.href='../san-pham.php';</script>";
			}
			else
			{
				// insert to history
                $text = " đã duyệt sản phẩm <b>". $name_product . "</b>";
                $time = date('Y-m-d H:i:s');
                $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
                mysqli_query($conn, $ins_his);

                // update flag
				$update = "UPDATE product SET flag = 1 WHERE sku_product = '$id'";
				mysqli_query($conn, $update);
				echo "<script>location.href='../san-pham.php';</script>";
			}
		}
		// end flag product

	}


?>