<?php
    include_once 'header.php';

    if(isset($_GET['membership']))
    {
        $bullet = new stdClass();
        $membership = $_GET['membership'];
        switch($membership){
            case 'master_blaster': $membership = 'Master Blaster';
            $feature_img = "./includes/images/master-blaster.jpeg";
            $bullet->point1 = "Get expert guidance from world class coaches and professionals";
            $bullet->point2 = "Weekly net practices with trained professionals from different countries.";
            $bullet->point3 = "Perfomance analysis with high grade equipments to nurture high level skills";
            $bullet->point4 = "4000+ practice sessions, club competitions, 1-On-1 24x7 training counselling";
            $bullet->point5 = "Incentives and scholarships for exceptional talent";
            break;

            case 'ace_the_pitch': $membership = 'Ace the pitch';
            $feature_img = "./includes/images/ace-the-pitch.png";
            break;

            case 'early_birds': $membership = 'Early Birds';
            $feature_img = "./includes/images/early-birds.png";
            break;

            default: die("Access denied!");
            break;
        }
        $bullet = json_encode($bullet);
        if(isset($_SESSION['sid']) && isset($_SESSION['member_type']) && ($_SESSION['member_type'] == 'member' || $_SESSION['member_type'] == 'admin')){
            include './db-queries/connect.php';
            $query = "SELECT class.description, fee.fee FROM fee LEFT JOIN class ON class.title = fee.membership WHERE class.title = '$membership'";
            if(mysqli_query($connection, $query)){
                $row = mysqli_fetch_row(mysqli_query($connection, $query));
                echo "<img src='$feature_img'>";
                echo "<h2>".$membership." - $".$row[1]."/month</h2>";
                echo "<h3>".$row[0]."</h3>";
                echo "Key highlights of the program : -";
                $points = json_decode($bullet, true);
                $index = 1;
                foreach($points as $key => $value){
                    echo $index.". ".$value;
                    $index ++;
                }
            }
            mysqli_close($connection);
        }
    
        else{
            ?>
            <script>window.location.href="http://cricketacademy.test/login.php"</script>
            <?php
        }
    }
    else{
        die('Access Denied!');
    }

    include_once 'footer.php';
?>