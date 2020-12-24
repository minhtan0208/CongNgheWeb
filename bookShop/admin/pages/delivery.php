
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

            // insert to history
            $text = " đã xác nhận mượn thành công  <b>". $code_invoice . "</b>";
            $time = date('Y-m-d H:i:s');
            $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
            mysqli_query($conn, $ins_his);


            // recalculate the number of products
            $detail_invoice = "SELECT sku_product, qty FROM detail_invoice WHERE code_invoice = '$code_invoice'";
            $rs_detail_invoice = mysqli_query($conn, $detail_invoice);
            while ($row_detail_invoice = mysqli_fetch_array($rs_detail_invoice)) 
            {
                $qty_invoice = $row_detail_invoice['qty'];
                $sku_product = $row_detail_invoice['sku_product'];
                
                // recalculate
                $product = "SELECT qty FROM product WHERE sku_product = '$sku_product'";
                $rs_product = mysqli_query($conn, $product);
                $row_product = mysqli_fetch_array($rs_product);
                $qty_product = $row_product['qty'];

                $recalcu = $qty_product - $qty_invoice;

                // re-update
                $update = "UPDATE product SET qty = '$recalcu' WHERE sku_product = '$sku_product'";
                mysqli_query($conn, $update);
            }


            // update flag invoice
            $update = "UPDATE invoice SET flag = 2 WHERE code_invoice = '$code_invoice'";
            $rs_update = mysqli_query($conn, $update);
            
            echo "<script>alert('Hoàn tất ');</script>";

            if(isset($_GET['confirm_delivery']))
            {
            	echo "<script>location.href='van-chuyen.php';</script>";
            }

            if(isset($_GET['recalled']))
            {
            	echo "<script>location.href='don-hang-thu-hoi.php';</script>";
            }
        }
	}        
?>