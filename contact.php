<?php
    include_once 'header.php';

    if(isset($_GET['status']) && $_GET['status'] == 'success'){
        echo "<div class='alert alert-success' style='text-align: center;'>Your request has been raised. Our officials will reach you within 24 hrs.</div>";
    }
    elseif(isset($_GET['status']) && $_GET['status'] == 'failed'){
        echo "<div class='alert alert-danger' style='text-align: center;'>There was an error in raising your request. Please try again.</div>";
    }
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
                        <form method="post" name="contact_us" id="contact_us" action="contact-us-process.php">
                            <input type="text" id="name" class="register-inputs" name="name" placeholder="NAME">
                            <input type="email" id="email" class="register-inputs" name="email" placeholder="EMAIL">
                            <input type="text" id="contact" class="register-inputs" name="contact"
                                placeholder="CONTACT">
                            <textarea name="message" id="message" cols="30" rows="5" placeholder="MESSAGE"></textarea>
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

<?php
    include_once 'footer.php';
?>