<?php

function sanitize_form_data($field_data){
    return htmlspecialchars(trim($field_data));
}

if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        if(isset($_POST['contact_us_form']) && $_POST['contact_us_form'] == 'contact_us_submit')
        {
            if($_POST['name'] && $_POST['email'] && $_POST['contact'] && $_POST['message'])
            {
                $recipient_name = sanitize_form_data($_POST['name']);
                $recipient_email = sanitize_form_data($_POST['email']);
                $recipient_contact = sanitize_form_data($_POST['contact']);
                $message = sanitize_form_data($_POST['message']);
                include './db-queries/insert-contact-request.php';
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