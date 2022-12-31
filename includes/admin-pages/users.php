<?php   
    class get_user_details{
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
        public static function build_table($dataarray = NULL){
            if($dataarray)
            {
                $serial_number = 1;
            ?>
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
            <?php
            }
        else
        {
            echo "<h3>No results found</h3>";
        }
        }
    }
    include_once '../../header.php';
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
        echo("<h3>Sorry, you don't have the sufficient rights to access this page. Contact the admin</h3>");
    }
    include_once '../../footer.php';
?>