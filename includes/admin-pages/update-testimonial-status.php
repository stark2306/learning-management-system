<?php
    session_start();

    function update_status($action, $dop, $username){
        require '../../db-queries/connect.php';
        if($action == 'approve'){
            $query = "UPDATE testimonial SET approved=1 WHERE date_of_publishing ='$dop' AND username='$username'";
        }
        elseif($action == 'revoke'){
            $query = "UPDATE testimonial SET approved=0 WHERE date_of_publishing ='$dop' AND username='$username'";
        }
        if(mysqli_query($connection, $query)){
            $_SESSION['testimonial_admin_approval'] = "update_success";
        }
        else{
            $_SESSION['testimonial_admin_approval'] = "update_failed";
        }
        mysqli_close($connection);
        header("Location: http://cricketacademy.test/includes/admin-pages/show-testimonial.php");
    }

    if(isset($_SESSION['sid']) && isset($_SESSION['member_type']) && $_SESSION['member_type'] == 'admin'){
        if(isset($_GET['action']) && $_GET['action'] == 'approve'){
            if(isset($_GET['dop']) && isset($_GET['username'])){
                update_status($_GET['action'],$_GET['dop'],$_GET['username']);
            }
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'revoke'){
            if(isset($_GET['dop']) && isset($_GET['username'])){
                update_status($_GET['action'],$_GET['dop'],$_GET['username']);
            }
        }
    }
    else{
        die("Access Denied!");
    }
?>