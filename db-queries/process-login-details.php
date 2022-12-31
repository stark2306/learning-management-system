<?php
    /**
     *  class to handle and process the login data entered via the login form to access the user account 
     */
    class process_login_details{
        /**
         * properties : (string) $username_entered, (string) $password_entered 
         */
        private $username_entered, $password_entered;
        
        function __construct($username, $password){
            $this->username_entered = $username;
            $this->password_entered = $password;
        }

        /**
         * description: determines the usertype by the login credentials entered and redirect them to the window as per access rights, i.e.,
         *                          admin to the admin dashboard and registered users (also called members) to the homepage
         *  @param void
         *  @return (array) $results 
         */
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
?>
