<?php
    include_once 'header.php';
    ?>

<div class="container d-flex align-items-center registration">
    <div class="registration-form-container">
        <h1>Connect With Us</h1>
        <p>Fields marked with <sup class="required-mark">*</sup> are mandatory</p>
        <form method="post" name="register_yourself" id="registration_form" action="functions.php">
            <label for="name">Name<sup class="required-mark">*</sup></label>
            <input type="text" id="name" class="register-inputs" name="name">
            <label for="email">Email<sup class="required-mark">*</sup></label>
            <input type="email" id="email" class="register-inputs" name="email">
            <label for="contact">Contact<sup class="required-mark">*</sup></label>
            <input type="text" id="contact" class="register-inputs" name="contact">
            <label for="contact">Message<sup class="required-mark">*</sup></label>
            <textarea name="" id="" cols="41" rows="8"></textarea>
            <!-- <label for="registration_role">Registering as<sup class="required-mark">*</sup></label> -->
            <!-- <select name="registeration_role" id="registration_role">
            <option value="">Select Role</option>
            <option value="admin">Admin</option>
            <option value="member">Coach/Player</option>
            <option value="public">Public</option>
        </select> -->
        </form>
        <button class="btn btn-lg btn-warning text-center registration_submit_btn" type="submit"
            form="registration_form" value="registration_form_submit" name="registration_submit">Register</button>
    </div>
</div>
<?php
    if(isset($_GET['activation']) && $_GET['activation'] == 'sent'){
        echo "Please refer the mail entered above to activate your registration.";
    }
    elseif(isset($_GET['activation']) && $_GET['activation'] == 'failed'){
        echo "Error sending mail on above email. Try again with different mail.";
    }
    elseif(isset($_GET['activation']) && $_GET['activation'] == 'failed'){
        echo "There was an error processing your request. Please try again.";
    }
    elseif(isset($_GET['activation']) && $_GET['activation'] == 'success'){
        echo "Congratulations! You are now registered with us.";
    }

    if(isset($_GET['activation_status']) && $_GET['activation_status'] == 'updatesuccess'){
        echo "Congratulation, you are now registered with us.";
    }
    elseif(isset($_GET['activation_status']) && $_GET['activation_status'] == 'updatefailed'){
        echo "Sorry, there was an error in updating your request status.";
    }
    include_once 'footer.php';
?>