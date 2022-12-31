<?php
    include_once 'header.php';

    if(isset($_GET['membership']))
    {
        if(isset($_SESSION['sid']) && isset($_SESSION['member_type']) && ($_SESSION['member_type'] == 'member' || $_SESSION['member_type'] == 'admin')){

        }
    
        else{
            ?>
            <script>window.location.href="http://cricketacademy.test/login.php"</script>
            <?php
        }
    }

    include_once 'footer.php';
?>