<?php
    include_once 'header.php';

    if(isset($_GET['activation']) && $_GET['activation'] == 'sent'){
        echo "<div class='alert alert-success' style='text-align: center;'>We have sent an activation link on your email. Please activate your registration now.</div>";
    }
    elseif(isset($_GET['activation']) && $_GET['activation'] == 'sentfailed'){
        echo "<div class='alert alert-danger' style='text-align: center;'>There was an error in sending activation mail to the email provided</div>";
    }
    elseif(isset($_GET['activation']) && $_GET['activation'] == 'failed'){
        echo "<div class='alert alert-danger' style='text-align: center;'>Error sending mail on above email. Try again with different mail.</div>";
    }
  

    if(isset($_GET['activation_status']) && $_GET['activation_status'] == 'updatesuccess'){
        echo "<div class='alert alert-success' style='text-align: center;'>Congratulations, you have successfully registered with us.</div>";
    }
    elseif(isset($_GET['activation_status']) && $_GET['activation_status'] == 'updatefailed'){
        echo "<div class='alert alert-danger' style='text-align: center;'>Sorry, there was an error in updating your request status.</div>";
    }

    include_once './includes/class_cards_registration.php';
    ?>


<section class="contact-us registration-form">
    <div class="container px-3 pb-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <img src="/includes/images/register.png" alt="">
            </div>
            <div class="col-lg-6 text-capitalize text-white text-center">
                <div class="d-flex align-items-center registration my-5">
                    <div class="registration-form-container">
                        <h3>Register Now</h3>
                        <form method="post" name="register_yourself" id="registration_form" action="registration-process.php">
                            <input type="text" id="name" class="register-inputs" name="name" placeholder="NAME">
                            <input type="email" id="email" class="register-inputs" name="email" placeholder="EMAIL">
                            <input type="text" id="contact" class="register-inputs" name="contact"
                                placeholder="CONTACT">
                            <input type="text" id="username" class="register-inputs" name="username"
                                placeholder="CREATE USERNAME">
                            <input type="password" id="original_password" class="register-inputs"
                                name="original_password" placeholder="ENTER PASSWORD">
                            <input type="password" id="confirm_password" class="register-inputs" name="confirm_password"
                                placeholder="RE-ENTER PASSWORD">
                            <label for="select-class">Select the class for which you want to register</label>
                                <select name="registeration_role" id="registration_role">
                                    <option value="" disabled selected>Select Class</option>
                                    <option value="Master Blaster">Master Blaster</option>
                                    <option value="Ace the pitch">Ace the pitch</option>
                                    <option value="Early Birds">Early Birds</option>
                              </select> 
                        </form>
                        <button class="cmn-btn mt-4" type="submit" form="registration_form"
                            value="registration_form_submit" name="registration_submit">REGISTER</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    include_once 'footer.php';
?>