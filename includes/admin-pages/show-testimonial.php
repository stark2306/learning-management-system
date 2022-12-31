<?php
    class testimonials{
        public static function testimonial_query(){
            require "../../db-queries/connect.php";
            $query = "SELECT testimonial.date_of_publishing, registered_user.individual_name, testimonial.description, testimonial.approved, testimonial.username
                                FROM testimonial LEFT JOIN registered_user ON testimonial.username = registered_user.username 
                                ORDER BY testimonial.date_of_publishing DESC";
            
            if(mysqli_query($connection, $query)){
                $resuts = mysqli_fetch_all(mysqli_query($connection, $query), MYSQLI_NUM);
                if(count($resuts) >0){
                    return $resuts;
                }
                else{
                    return $resuts;
                }
            }
            else{
                die(mysqli_error($connection));
            }
            mysqli_close($connection);
        }

        public static function build_table($data = NULL){
            if($data)
            {
                ?>
            <h3 align="center">Testimonials</h3>
             <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>Serial No.</th>
                                <th>Date of publishing</th>
                                <th>Name</th>
                                <th>Testimonial</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                <?php
              for($i=0;$i<count($data); $i++){
                ?>
                    <tr class="text-center">
                        <td><?php echo ($i+1);?></td>
                <?php
                for($j=0;$j<(count($data[$i]));$j++){
                        if($j==(count($data[$i])-2)){
                            if($data[$i][$j] == 0){
                                ?>
                                <td class="text-danger"><span style="font-size: 25px;">&times;</span></td>
                                <?php
                            }
                            elseif($data[$i][$j] == 1){
                                ?>
                                <td class="text-success"><span style="font-size: 25px;">&check;</span></td>
                                <?php
                            }
                        }
                        if($j == (count($data[$i])-1) ){
                            if($data[$i][3] == 0){
                                ?>
                                <td><a href="http://cricketacademy.test/includes/admin-pages/update-testimonial-status.php?action=approve&dop=<?php echo $data[$i][0];?>&username=<?php echo $data[$i][$j];?>">Approve</a></td>
                                <?php
                            }
                            elseif($data[$i][3] == 1){
                                ?>
                            <td><a href="http://cricketacademy.test/includes/admin-pages/update-testimonial-status.php?action=revoke&dop=<?php echo $data[$i][0];?>&username=<?php echo $data[$i][$j];?>">Revoke</a></td>
                                <?php
                            }
                            ?>
                            <?php
                        }
                        elseif($j!=(count($data[$i])-2) &&$j!=(count($data[$i])-1)){
                            ?>
                             <td><?php echo $data[$i][$j];?></td>
                            <?php
                        }
                    }
                ?>
                    </tr>
                <?php
              }
              ?>
                </table>
            </div>
              <?php
            }
        else{
            echo "<h3>No results found</h3>";
        }
     }
    }

include_once '../../header.php';
    if(isset($_SESSION['sid']) && isset($_SESSION['member_type']) && $_SESSION['member_type'] == 'admin')
    {
        if($_SESSION['testimonial_admin_approval'] == "update_success"){
            echo "<div class='alert alert-success text-center'>Status Updated</div>";
        }
        elseif($_SESSION['testimonial_admin_approval'] == "update_failed"){

        }
        include_once "./admin-sidebar.php";
        $results = testimonials::testimonial_query();
        testimonials::build_table($results);
    }
    else
    {
        echo("<h3>Sorry, you don't have the sufficient rights to access this page. Contact the admin</h3>");
    }
    include_once '../../footer.php';
?>