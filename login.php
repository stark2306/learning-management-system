<?php
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
    <form method="POST" name="login_form" id="login_form" action="login-processing.php">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="register-inputs">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="register-inputs">
    </form>
    <button class="btn btn-lg btn-warning text-center registration_submit_btn" type="submit"
            form="login_form" value="login_form_submit" name="login_submit">Login</button>
</main>
<?php
    include_once 'footer.php';
?>