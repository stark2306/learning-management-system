<?php
    /**
     *   script to show testimonials on admin section and the functionality to approve/revoke the testimonials 
     */
 

    class testimonials{
        /**
         * description: fetch the testimonial history from db
         * @param void
         * @return (array) $results
         */
        public static function testimonial_query(){
            require "../../db-queries/connect.php";
            $query = "SELECT testimonial.date_of_publishing, registered_user.individual_name, testimonial.description, testimonial.approved, testimonial.username
                                FROM testimonial INNER JOIN registered_user ON testimonial.username = registered_user.username 
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

          /**
         * description: build the testimonial history from db inside the admin panel for admin view
         * @param array
         * @return (array) $results
         */
        public static function build_table($data = NULL){
            if($data)
            {
                ?>
              <section class="col-10 py-5">
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
            </section>
  </article>
  </section>
  </main>
              <?php
            }
        else{
            ?>
            <section class="col-10 py-5">
            <?php echo "<h3>No results found</h3>";?>
            </section>
            </article>
            </section>
            </main>
            <?php
        }
     }
    }

include_once './show-admin-page-header.php';

   //conditional to restrict only admins to view the testimonial history section in admin panel
    if(isset($_SESSION['sid']) && isset($_SESSION['member_type']) && $_SESSION['member_type'] == 'admin')
    {
        if(isset($_SESSION['testimonial_admin_approval']) && $_SESSION['testimonial_admin_approval'] == "update_success"){
            echo "<div class='alert alert-success text-center'>Status Updated</div>";
        }
        elseif(isset($_SESSION['testimonial_admin_approval']) && $_SESSION['testimonial_admin_approval'] == "update_failed"){
            echo "<div class='alert alert-danger text-center'>Update Failed</div>";
        }
        include_once "./admin-sidebar.php";
        $results = testimonials::testimonial_query();
        testimonials::build_table($results);
    }
    else
    {
        ?>
        <main>
        <?php echo("<h3 class='mt-4 text-center'>Sorry, you don't have the sufficient rights to access this page. Contact the admin</h3>");?>
       </main>
        <?php
    }
    include_once '../../footer.php';
?>