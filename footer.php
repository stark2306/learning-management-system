</body>
<?php
    /**
     *  add a particular js on a particular page to avoid loading unncessary js on every page
     */
    function enqueue_script()
    {
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? $current_url = "https://" : $current_url = "http://";
        $current_url.= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];    
        if(substr_compare($current_url,'http://cricketacademy.test/register.php',0,strlen('http://cricketacademy.test/register.php'),false) == 0 || substr_compare($current_url,'http://cricketacademy.test/register.php',0,strlen('http://cricketacademy.test/register.php'),false)>0){
                echo "<script src='/includes/js/registration-form-validation.js'></script>";
        }
        //if()
        // switch("$current_url")
        // {
        //     case 'http://cricketacademy.test/register.php': echo "<script src='/includes/js/registration-form-validation.js'></script>";
        //     break;
        // }
    }
    enqueue_script();
?>
</html>