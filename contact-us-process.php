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
 *  handling of contact us form data and backend validations
 */
if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        if(isset($_POST['contact_us_form']) && $_POST['contact_us_form'] == 'contact_us_submit')
        {
            if($_POST['name'] && $_POST['email'] && $_POST['contact'] && $_POST['message'])
            {
                $date = date('Y-m-d H:i:s');
                $recipient_name = sanitize_form_data($_POST['name']);
                $recipient_email = sanitize_form_data($_POST['email']);
                $recipient_contact = sanitize_form_data($_POST['contact']);
                $message = sanitize_form_data($_POST['message']);
                include './db-queries/insert-contact-request.php';
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