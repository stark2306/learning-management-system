<?php
    require 'connect.php';
    if(isset($_GET['activation_key']))
    {
        $activation_key = $_GET['activation_key'];
    }
    $status_query = "SELECT username, user_password, is_active FROM registered_user WHERE activation_key = '$activation_key'";
    $get_status = mysqli_query($connection,$status_query);
    if (mysqli_num_rows($get_status) > 0 && $get_status) {
        $row = mysqli_fetch_row($get_status);
            if(count($row)>0){
            if($row[2] == 1)
            {
                echo "Your registration is already active.";
            }
            elseif($row[2] == 0)
            {
                $update_query = "UPDATE registered_user SET is_active=1 WHERE activation_key='$activation_key'";
                $update_status= mysqli_query($connection,$update_query);
                if($update_status)
                {
                    $login_query = "INSERT INTO login_details (username, password) VALUES ('$row[0]','$row[1]')";
                    if(mysqli_query($connection, $login_query))
                    {
                        header('Location: ../registeration.php?activation_status=updatesuccess');
                    }
                    else
                    {
                        echo "there was an error in updating your request";
                    }
                }
                else
                {
                    header('Location: ../registeration.php?activation_status=updatefailed');
                }
            }
        }
      } else {
       die("Record not found!!!");
      }
    mysqli_close($connection);
?>