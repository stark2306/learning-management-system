<?php   
    // script to get the registered user details and build a user table for admin view

    class get_user_details{

         /**
         * description: fetch the registered_user from db
         * @param void
         * @return (array) $results
         */
        public static function user_query(){
            require '../../db-queries/connect.php';
            $query = "SELECT individual_name, email, contact, role_selected, is_active FROM registered_user";
            if(mysqli_query($connection, $query)){
                $results = mysqli_fetch_all(mysqli_query($connection, $query), MYSQLI_ASSOC);
                if(count($results) >0){
                    return $results;
                }
                else{
                    return $results;
                }
            }
            else{
               die(mysqli_error($connection));
            }
            mysqli_close($connection);
        }

         /**
         * description: build the user table for admin view
         * @param array
         * @return void
         */
        public static function build_table($dataarray = NULL){
            if($dataarray)
            {
                $serial_number = 1;
            ?>
             <section class="col-10 py-5">
            <h3 align="center">Registered Users</h3>
             <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>Serial No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Membership</th>
                                <th>Status</th> 
                            </tr>
                        </thead>
                        <?php
                            foreach($dataarray as $data){
                                ?>
                                <tr class="text-center">
                                <td><?php echo $serial_number."."; $serial_number = $serial_number+1;?></td>
                                <?php
                                foreach($data as $key => $value){
                                    ?>
                                    <td>
                                        <?php 
                                            if($key == 'is_active') 
                                            {
                                                if($value == 1)
                                                {
                                                    $value = "<span class='text-success'>Active</span>";
                                                }
                                                elseif($value == 0)
                                                {
                                                    $value = "<span class='text-danger'>Inactive</span>";
                                                }
                                            }
                                            echo $value;
                                            ?>
                                        </td>
                                    <?php
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
        else
        {
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
    //conditional to restrict only admins to view this section and prevent unauthenticated access to this section
    if(isset($_SESSION['sid']) && isset($_SESSION['member_type']) && $_SESSION['member_type'] == 'admin')
    {
        include_once "./admin-sidebar.php";
        ?>
            <?php 
               $user_data = get_user_details::user_query();
               get_user_details::build_table($user_data);
            ?>
        <?php
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