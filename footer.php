</body>

<footer class="parallax overlay pt-5 pb-1" style="background-image: url(images/footer.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4 mb-5">
                    <img class="mb-4" src="images/dento-logo.png" alt="">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit nostrum porro ipsam tenetur
                        excepturi fugiat soluta.
                    </p>
                    <a class="mb-2" href="#">
                        <span class="material-icons">
                            location_on
                        </span>
                        <span>
                            28 jackson street, Dublin, 7789 IRE
                        </span>
                    </a>
                    <a class="mb-2" href="#">
                        <span class="material-icons">
                            call
                        </span>
                        <span>
                            +84. 2252. 2250. 122
                        </span>
                    </a>
                    <a href="mailto: info.dento@gmail.com">
                        <span class="material-icons">
                            mail
                        </span>
                        <span>
                            info.cricket@gmail.com
                        </span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg mb-5 px-5">
                    <h5 class="mb-4">Opening Hours</h5>
                    <ul>
                        <li class="d-flex  justify-content-between">
                            <span>Mon-Wed</span>
                            <span>8.00-18.00</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Thu-Fri</span>
                            <span>8.00-17.00</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Sat</span>
                            <span>9.00-17.00</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Sun</span>
                            <span>10.00-17.00</span>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-lg mb-5 quick-link pl-5">
                    <h5 class="mb-4">Quick Link</h5>
                    <ul class="d-flex flex-wrap">
                        <li>
                            <a href="http://cricketacademy.test/about.php">About</a>
                        </li>
                        <li>
                            <a href="http://cricketacademy.test/contact.php">Contact</a>
                        </li>
                        <li>
                            <a href="http://cricketacademy.test/gallery.php">Gallery</a>
                        </li>
                        <li>
                            <a href="http://cricketacademy.test/class.php">Memberships</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-lg mb-5">
                    <h5 class="mb-4">
                        Newsletter
                    </h5>
                    <p>
                        We will send out weekly newest article and some great offers
                    </p>
                    <form action="" class="my-4 position-relative">
                        <input type="e-mail" placeholder="Email Address" class="p-2">
                        <button type="submit">
                            <span><i class="fa fa-paper-plane"></i></span>
                        </button>
                    </form>
                    <div class="social-icons">
                        <a href="#"><i class="fa fa-facebook-f"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center border-top pt-3">
                <p>Copyright ©2022 All rights reserved | The Dublin Cricket Academy</p>
            </div>
        </div>
    </footer>

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