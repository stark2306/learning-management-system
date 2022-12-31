<?php
    /**
     * Process the form data filled in registration form and trigger an email to activate the account
     * 
     * @param string $name, string $email, string $contact, string $username, string $password : variables to store form data
     * 
     * @return void
     */
    function process_registration_data($name,$email,$contact,$username,$password, $activation_key, $user_role_selected){
        require './db-queries/insert-registered-users.php';
    }

    /**
     * Sanitize the input field data
     * 
     * @param char $field_data
     * 
     * @return char
     */
    function sanitize_form_data($field_data){
        return htmlspecialchars(trim($field_data));
    }

/**
 *  Conditionals to run on submitting the registration form 
*/
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['registration_submit']) && $_POST['registration_submit'] == 'registration_form_submit')
            {
                if($_POST['name'] && $_POST['email'] && $_POST['contact'] && $_POST['username'] && $_POST['original_password'] && $_POST['confirm_password'] && $_POST['registeration_role'])
                {
                    $name = sanitize_form_data($_POST['name']);
                    $email = sanitize_form_data($_POST['email']);
                    $contact = sanitize_form_data($_POST['contact']);
                    $username = sanitize_form_data($_POST['username']);
                    $password1 = trim($_POST['original_password']);
                    $password2 = trim($_POST['confirm_password']);
                    $user_role_selected = $_POST['registeration_role'];
                    if($password1 == $password2)
                    {
                        $activation_key = uniqid();
                        process_registration_data($name,$email,$contact,$username,$password1,$activation_key, $user_role_selected);
                    }
                    else
                    {
                        echo "Sorry, passwords do not match. Please fill out the form again.";
                    }
                }
                else
                {
                    echo "Fields marked with * needs to be filled";
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