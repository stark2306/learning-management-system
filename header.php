<?php
     session_start();
?>
<!-- header of the file-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricket Academy</title>

    <!-- global stylesheet for the web application-->
    <link rel="stylesheet" href="/includes/css/style.css">

    <!-- include jquery -->
    <script src="/includes/js/jquery-3.6.2.min.js"></script> 

     <!-- Bootstrap cdn link for css -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- google font cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- font awesome icon cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    
      <!-- links for slick slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
				
</head>

<body>
    <header class="shadow  bg-grey">
        <div class="container">
            <div class="top-header py-2">
                <div class="row">
                    <div class="col-6 col-md-8">
                        <a class=" mr-4" href="#" data-toggle="tooltip" data-placement="bottom"
                            title="28 jackson street, dublin, 7788569 IRE">
                            <span class="material-icons">
                                location_on
                            </span>
                            <span class="d-none d-md-inline">
                                28 jackson street, Dublin, 7789 IRE
                            </span>
                        </a>

                        <a href="mailto: info.dento@gmail.com" data-toggle="tooltip" data-placement="bottom"
                            title="info.dento@gmail.com">
                            <span class="material-icons">
                                mail
                            </span>
                            <span class="d-none d-md-inline">
                                dublin.cricketinfo@gmail.com
                            </span>
                        </a>
                    </div>

                    <div class="col-6 col-md-4 social-icons text-right">
                        <a href="#"><i class="fa fa-facebook-f"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>

            <nav class="navbar pt-4 pb-3 navbar-expand-lg navbar-light bg-light">
              <button type="button" class="btn-lg cmn-btn  d-md-none mobile-on text-uppercase rounded-0 ">booking
                    now</button>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="toggler-icon"></span> <span class="toggler-icon"></span> <span
                        class="toggler-icon"></span>


                </button>

             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-right">
                        <?php
                            include './db-queries/connect.php';
                            $page_query = "SELECT * FROM page";
                            if(mysqli_query($connection, $page_query)){
                                $results = mysqli_fetch_all(mysqli_query($connection, $page_query), MYSQLI_ASSOC);
                                if(count($results) >0 ){

                                    //loop to make nav bar options dynamic by querying the pages in db
                                    for($i=0;$i<count($results);$i++)
                                   {
                                        if(isset($_SESSION['sid']) && isset($_SESSION['member_type']) && ($_SESSION['member_type'] == 'member' || $_SESSION['member_type'] == 'admin')){
                                            if($i == 4){
                                                ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/logout.php">logout</a>
                                            </li>
                                                <?php
                                                break;
                                            }
                                        }
                                        elseif(!isset($_SESSION['sid']) || !isset($_SESSION['member_type'])){
                                            if($i==4 || $i==5)
                                            {
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo $results[$i]['uri']?>"><?php echo $results[$i]['page']?><span class="sr-only">(current)</span></a>
                                            </li>
                                            <?php
                                            }
                                        }
                                        if($i<4)
                                        {
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo $results[$i]['uri']?>"><?php echo $results[$i]['page']?><span class="sr-only">(current)</span></a>
                                            </li>
                                        <?php
                                        }
                                    }
                                }
                            }
                            mysqli_close($connection);
                        ?>
                        <li  class="nav-item">
                            <?php 
                            if(isset($_SESSION['sid']) && isset($_SESSION['member_type']) &&$_SESSION['member_type'] == admin ){
                                ?>
                                 <a class="nav-link" href="<?php echo '/admin.php'?>">Admin Section</span></a>
                                <?php
                            } 
                            ?>
                        </li>
                    </ul>
                    <?php
                        if(isset($_SESSION['sid']) && isset($_SESSION['member_type']) && ($_SESSION['member_type'] == 'member' || $_SESSION['member_type'] == 'admin')){
                            echo "<span class='logged-in-user ml-auto pr-4 pl-2'><span class='material-icons material-icons-outlined'>account_box</span>Hello, ".$_SESSION['user_display_name']."</span>";
                        }
                    ?>
                </div>
                <form class="form-inline my-2 my-lg-0">
                </form> 
            </nav>
        </div>
    </header> 
    
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

