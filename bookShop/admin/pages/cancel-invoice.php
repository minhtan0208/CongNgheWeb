
<?php 
    
    // open session
    session_start();

    if(isset($_SESSION['user']) && isset($_SESSION['level']))
    {
        $level = $_SESSION['level'];
        $users = $_SESSION['user'];

        // add db in header to use all file
        require_once('modules/config.php');

        // include function
        require('modules/functions.php');

        // get date from session
        $session = "SELECT * FROM account WHERE email = '".$users."'";
        $rs_session = mysqli_query($conn, $session);
        $row_session = mysqli_fetch_array($rs_session);
        $id_acc = $row_session['id_acc'];
        $name_user = $row_session['name'];
        
        // cancel invoice
        if(isset($_GET['cancel']))
        {
            $code_invoice = $_GET['cancel'];
            

            // remove detail invoice
            $del_detailinvoice = "DELETE FROM detail_invoice WHERE code_invoice = '$code_invoice'";
            mysqli_query($conn, $del_detailinvoice);

            // remove invoice
            $del_invoice = "DELETE FROM invoice WHERE code_invoice = '$code_invoice'";
            mysqli_query($conn, $del_invoice);

            echo "<script>alert('Hủy đơn hàng thành công');</script>";

            // go to van-chuyen.php
            if(isset($_GET['delivery']))
            {
                echo "<script>location.href='van-chuyen.php';</script>";
            }  

            if(isset($_GET['invoice']))
            {
                echo "<script>location.href='don-hang.php';</script>";
            }
        }
    }
?>