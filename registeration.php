<?php
    include_once 'header.php';

    /**
     *  show alert messages to users based on session variables 
     */

     /**
      *  sessions for status of activation email after filling out the registeration form
      */
    if(isset($_SESSION['activation']) && $_SESSION['activation'] == 'sent'){
        echo "<div class='alert alert-success' style='text-align: center;'>We have sent an activation link on your email. Please activate your registration now.</div>";
    }
    elseif(isset($_SESSION['activation']) && $_SESSION['activation'] == 'sentfailed'){
        echo "<div class='alert alert-danger' style='text-align: center;'>There was an error in sending activation mail to the email provided</div>";
    }
    elseif(isset($_SESSION['activation']) && $_SESSION['activation'] == 'failed'){
        echo "<div class='alert alert-danger' style='text-align: center;'>Error sending mail on email entered. Try again with different mail.</div>";
    }
  
    /**
     * sessions for updated activation status of users 
     */
    if(isset($_SESSION['activation_status']) && $_SESSION['activation_status'] == 'updatesuccess'){
        echo "<div class='alert alert-success' style='text-align: center;'>Congratulations, you have successfully registered with us.</div>";
    }
    elseif(isset($_SESSION['activation_status']) && $_SESSION['activation_status'] == 'updatefailed'){
        echo "<div class='alert alert-danger' style='text-align: center;'>Activation failed</div>";
    }
    ?>
    <main>
    

<section class="contact-us registration-form">
    <div class="container px-3 pb-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
            <?php include_once './includes/class_cards_registration.php'; ?>
            </div>
            <div class="col-lg-6 text-capitalize text-white text-center">
                <div class="d-flex align-items-center registration my-5">
                    <div class="registration-form-container">
                    <img src="/includes/images/register.png" alt="" class="mb-4">
                    <!-- Registeration Form -->
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
                            <label for="select-class" class="mt-3">Select the class for which you want to register</label>
                                <select name="registeration_role" id="registration_role" class="membership-select" required>
                                    <option value="" disabled selected>Select Class</option>
                                    <option value="Master Blaster">Master Blaster</option>
                                    <option value="Ace the pitch">Ace the pitch</option>
                                    <option value="Early Birds">Early Birds</option>
                              </select> 
                        </form>
                        <button class="cmn-btn mt-4 registration_submit_btn" type="submit" form="registration_form"
                            value="registration_form_submit" name="registration_submit">REGISTER</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>

<?php
    include_once 'footer.php';
?>