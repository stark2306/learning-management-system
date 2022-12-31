<?php
    class process_login_details{
        private $username_entered, $password_entered, $data;
        
        function __construct($username, $password){
            $this->username_entered = $username;
            $this->password_entered = $password;
        }

        public function usertype(){
            require 'connect.php';
            $user_query = "SELECT login_details.usertype, registered_user.individual_name, registered_user.role_selected 
                                           FROM login_details LEFT JOIN registered_user ON login_details.username = registered_user.username 
                                           WHERE login_details.username = '$this->username_entered' AND login_details.password = '$this->password_entered'";

            if(mysqli_query($connection, $user_query)){
                $results = mysqli_fetch_row(mysqli_query($connection, $user_query));
                if(count($results) >0){
                    return $results;
                }
                else{
                    die("Record not found!");
                }
            }
            else{
                die("Either your account is not activate or you haven't registered with us!".mysqli_error($connection));
            }
        mysqli_close($connection);
        }
    }

        // public function member_login(){
        //     $userdata = user_details($this->username_entered, $this->password_entered);
        //     print_r($userdata);
        //     echo "member login";
        // }

        // public function admin_login(){
        //     $userdata = user_details($this->username_entered, $this->password_entered);
        //     print_r($userdata);
        //     echo "admin login";
        // }
    // $loginobj->usertype();

    // require 'connect.php';
    //     $get_data_query = "SELECT registered_user.individual_name, registered_user.user_password, registered_user.is_active, login_details.usertype 
    //                                             FROM registered_user LEFT JOIN login_details ON registered_user.username = login_details.username
    //                                             WHERE username='$username'";
    //     $get_results = mysqli_query($connection,$get_data_query);
    //     if (mysqli_num_rows($get_results) > 0 && $get_results) {
    //         $row = mysqli_fetch_row($get_results);
    //             if($password_hash == $row[1] && $row[2] == 1)
    //             {
    //                 session_start();
    //                 $_SESSION['sid']=session_id();
    //                 $_SESSION['logged_in_username'] = $username;
    //                 $_SESSION['member_type'] = 'registered_member';
    //                 header('Location: index.php');
    //             }
    //             elseif($password_hash != $row[1])
    //             {
    //                 header('Location: login.php?status=not_found');
    //             }
    //             elseif($row[2]!=1){
    //                 header('Location: login.php?status=activate_registration');
    //             }
    //         } 
            
    //     else 
    //     {
    //         header('Location: login.php?status=not_found');
    //     }
?>
