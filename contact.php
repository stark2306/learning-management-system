<?php
    include_once 'header.php';
    ?>

<!-- <div class="container d-flex align-items-center registration my-5">
    <div class="registration-form-container bg-secondary">
        <h1>Connect With Us</h1>
        <form method="post" name="register_yourself" id="registration_form" action="functions.php">
            <input type="text" id="name" class="register-inputs" name="name" placeholder="NAME">
            <input type="email" id="email" class="register-inputs" name="email" placeholder="EMAIL">
            <input type="text" id="contact" class="register-inputs" name="contact" placeholder="CONTACT">
            <textarea name="message" id="message" cols="30" rows="5" placeholder="MESSAGE"></textarea>
        </form>
        <button class="btn btn-lg btn-primary text-center registration_submit_btn mt-4" type="submit"
            form="registration_form" value="registration_form_submit" name="registration_submit">SUBMIT</button>
    </div>
</div> -->

<section class="hero-banner parallax overlay contact-us" style="background-image:url('/includes/images/contact.jpg')">
    <div class="container px-3">
        <div class="row align-items-center">
            <div class="col-lg-6 text-capitalize text-white text-center">
                <div class="d-flex align-items-center registration my-5">
                    <div class="registration-form-container">
                        <h1>Connect With Us</h1>
                        <form method="post" name="register_yourself" id="registration_form" action="functions.php">
                            <input type="text" id="name" class="register-inputs" name="name" placeholder="NAME">
                            <input type="email" id="email" class="register-inputs" name="email" placeholder="EMAIL">
                            <input type="text" id="contact" class="register-inputs" name="contact"
                                placeholder="CONTACT">
                            <textarea name="message" id="message" cols="30" rows="5" placeholder="MESSAGE"></textarea>
                        </form>
                        <button class="cmn-btn mt-4" type="submit"
                            form="registration_form" value="registration_form_submit"
                            name="registration_submit">SUBMIT</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

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