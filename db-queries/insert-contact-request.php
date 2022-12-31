<?php
     require 'connect.php';
     $query = "INSERT INTO contact_request (name, email, contact, message) VALUES ('$recipient_name','$recipient_email',$recipient_contact,'$message')";
     if (mysqli_query($connection, $query)) {
        header('Location: ./contact.php?status=success');
     }
     else{
        header('Location: ./contact.php?status=failed');
     }
     mysqli_close($connection);
?>