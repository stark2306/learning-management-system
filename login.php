<?php
  
   // Template: login page

    include_once 'header.php';

    if(isset($_GET['status']) && $_GET['status'] == 'activate_registration'){
        echo "<div class='alert alert-danger' style='text-align: center;'>Please activate your registration</div>";
    }
    elseif(isset($_GET['status']) && $_GET['status'] == 'login_failed'){
        echo "<div class='alert alert-danger' style='text-align: center;'>Username or password incorrect</div>";
    }
    elseif(isset($_GET['status']) && $_GET['status'] == 'not_found'){
        echo "<div class='alert alert-danger' style='text-align: center;'>Invalid Login Credentials</div>";
    }
?>
<main>
    <!-- login form -->
    <section class="login-form container my-5 text-center">
    <form method="POST" name="login_form" id="login_form" action="login-processing.php" class="mx-auto text-left">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="register-inputs" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="register-inputs" required>
    </form>
    <button class="btn btn-lg btn-success text-center text-white registration_submit_btn" type="submit"
            form="login_form" value="login_form_submit" name="login_submit">Login</button>
   </section>
</main>
<?php
    include_once 'footer.php';
?>