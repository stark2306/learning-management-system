<?php
    /**
     *  Template: contact us
     */

    include_once 'header.php';

    /**
     *  show alert messages to users based on session variables 
     */
    if(isset($_SESSION['contact_request_status']) && $_SESSION['contact_request_status'] == 'success'){
        echo "<div class='alert alert-success' style='text-align: center;'>Your request has been raised. We will reach out to you within 24 hrs.</div>";
    }
    elseif(isset($_SESSION['contact_request_status']) && $_SESSION['contact_request_status'] == 'failed'){
        echo "<div class='alert alert-danger' style='text-align: center;'>There was an error in raising your request. Please try again.</div>";
    }
    ?>

<main>
<section class="hero-banner parallax overlay contact-us" style="background-image:url('/includes/images/contact.jpg')">
    <div class="container px-3">
        <div class="row align-items-center">
            <div class="col-lg-6 text-capitalize text-white text-center">
                <div class="d-flex align-items-center registration my-5">
                    <div class="registration-form-container">

                        <!-- Contact Us form-->
                        <h1>Connect With Us</h1>    
                        <form method="post" name="contact_us" id="contact_us" action="contact-us-process.php">
                            <input type="text" id="name" class="register-inputs" name="name" placeholder="NAME" required>
                            <input type="email" id="email" class="register-inputs" name="email" placeholder="EMAIL" required>
                            <input type="text" id="contact" class="register-inputs" name="contact"
                                placeholder="CONTACT" required>
                            <textarea name="message" id="message" cols="30" rows="5" placeholder="MESSAGE" required></textarea>
                        </form>
                        <button class="cmn-btn mt-4" type="submit"
                            form="contact_us" value="contact_us_submit"
                            name="contact_us_form">SUBMIT</button>
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