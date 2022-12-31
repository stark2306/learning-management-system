<?php

/**
 *  description: function to sanitize the form data to prevent malicious scripts in input fields
 *  @param string
 *   @return (string) $field_data
 */
function sanitize_form_data($field_data){
    return htmlspecialchars(trim($field_data));
}

/**
 *  handling of login form data and backend validations
 */
if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        if(isset($_POST['login_submit']) && $_POST['login_submit'] == 'login_form_submit')
        {
            if($_POST['username'] && $_POST['password'])
            {
                include './db-queries/process-login-details.php';
                $username = sanitize_form_data($_POST['username']);
                $password = sanitize_form_data($_POST['password']);
                $password_hash = md5($password);
                $loginobj = new process_login_details($username, $password_hash);     //instantiate login object
                $user_details = $loginobj->usertype();

                /**
                 *  create login session variables to keep track of logged in/ logged out users
                 */
                session_start();
                $_SESSION['sid'] = session_id();
                $_SESSION['member_type'] = $user_details[0];
                $_SESSION['user_display_name'] = $user_details[1];
                $_SESSION['logged_in_username'] = $username;
                $_SESSION['membership_class'] = $user_details[2];
                if($user_details[0] == 'admin')
                {
                    header("Location: /admin.php");      //redirection to admin dashboard for admins only
                }
                elseif($user_details[0] == 'member')
                {
                    header("Location: /index.php");      //redirection to homepage for registered members only
                }
            }
            else
            {
                echo "Please provide information in all the fields";
            }
        }
    
        else
        {
            die('Sorry, you are not allowed to access this page');
        }
    }

    else
    {
        die('Sorry, you are not allowed to access this page');
    }
?>