<?php
    /**
     *  script to register users on filling out the registeration form 
     */
      session_start();
      unset($_SESSION['activation']);
      $password_hash = md5($password);      //md5 encryption on user created password
      require 'connect.php';  
      
      //create a registeration activation url for users to activate their account for use by trigerring them an activation mail to their registered emails (for security reasons)
      $url = "http://cricketacademy.test/db-queries/update-activation-status.php?activation_key=".$activation_key.""; 

      //email template triggered on successfully filling the registeration form for account activation
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .="From: <admin@somedomain.com>"."\r\n";
      $subject = 'Activate Registration';
      
      $message = 'Dear '.$name.',<br><br>';
      $message .='Thank you for showing your interest in our academy. Please <a href='.$url.'>click</a> here to activate your registration with us.<br><br><br>';
      $message .='Following are your login credentials :-<br><br>';
      $message .='<b><u>Username:</u></b> '.$username.'<br>';
      $message .='<b><u>Password:</u></b> '.$password.'<br><br>';
      $message .='Admin';
      if(mail($email,$subject,$message,$headers))
      {
        $query = "INSERT INTO registered_user (individual_name, email, contact, username, user_password, activation_key, role_selected) VALUES ('$name','$email',$contact,'$username','$password_hash', '$activation_key', '$user_role_selected')";
        if (mysqli_query($connection, $query)) {
          $_SESSION['activation'] = 'sent';
          header('Location: ./registeration.php');
        }
        else{
          $_SESSION['activation'] = 'failed';
          header('Location: ../registeration.php');
        }  
      }
      else
      {
         $_SESSION['activation'] = 'sentfailed';
          header('Location: ./registeration.php');
      }
    mysqli_close($connection);
?>
