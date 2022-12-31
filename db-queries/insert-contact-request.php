<?php
    /**
     * script to update contact requests raised by users by filling contact us form
     */
     session_start();
     unset($_SESSION['contact_request_status']);     //unset session status variable
     require 'connect.php';
     $query = "INSERT INTO contact_request (date_of_request, name, email, contact, message) VALUES ('$date','$recipient_name','$recipient_email',$recipient_contact,'$message')";
     if (mysqli_query($connection, $query)) {
        $_SESSION['contact_request_status'] = 'success';  //create a success parameter if the query runs successfully
        header('Location: ./contact.php');   
     }
     else{
        $_SESSION['contact_request_status'] = 'failed';   //create a failure parameter if the query fails
        header('Location: ./contact.php');      
     }
     mysqli_close($connection);
?>