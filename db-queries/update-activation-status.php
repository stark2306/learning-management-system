<?php
    require 'connect.php';
    if(isset($_GET['activation_key']))
    {
        $activation_key = $_GET['activation_key'];
    }
    $status_query = "SELECT is_active FROM registered_user WHERE activation_key = '$activation_key'";
    $get_status = mysqli_query($connection,$status_query);
    if (mysqli_num_rows($get_status) > 0 && $get_status) {
        while($row = mysqli_fetch_row($get_status)) {
            if($row[0] == 1)
            {
                echo "Your registration is already active.";
            }
            elseif($row[0] == 0)
            {
                $update_query = "UPDATE registered_user SET is_active=1 WHERE activation_key='$activation_key'";
                $update_status= mysqli_query($connection,$update_query);
                if($update_status)
                {
                    header('Location: ../register.php?activation_status=updatesuccess');
                }
                else
                {
                    header('Location: ../register.php?activation_status=updatefailed');
                }
            }
        }
      } else {
       die("Record not found!!!");
      }
    mysqli_close($connection);
?>