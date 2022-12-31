<?php

class testimonials{
    private $username;
    public $membership, $testimonial_text, $date_of_publishing;

    function __construct($membership,$username){
        $this->membership = $membership;
        $this->username = $username;
        // $this->testimonial_text = htmlspecialchars(trim($testimonial));
        // $this->date_of_publishing = $datetime;
    }

    public function set_testimonial_data($testimonial, $datetime){
        $this->testimonial_text = htmlspecialchars(trim($testimonial));
        $this->date_of_publishing = $datetime;
    }

    public function add_my_testimonial_to_db(){
        $username = $this->username;
        $description = $this->testimonial_text;
        $datetime = $this->date_of_publishing;
        include './db-queries/connect.php';
        $add_testimonial_query = "INSERT INTO testimonial (username, description, date_of_publishing) VALUES ('$username','$description','$datetime')";
        $testimonial_added = mysqli_query($connection,$add_testimonial_query);
        if($testimonial_added){
            echo "<div class='alert alert-success alert-dismissible text-center'><button type='button' class='close' data-dismiss='alert'>&times;</button>Your testimonial has been added and is under admin review for publishing</div>";
        }
        else{
            echo "<div class='alert alert-danger text-center'>There was an error in adding this testimonial</div>".mysqli_error($connection);
        }
    mysqli_close($connection);
    }

    public static function show_testimonials($username = NULL){
        include './db-queries/connect.php';
        if($username)
        {
            $show_testimonial_query = "SELECT testimonial.description, registered_user.individual_name, registered_user.role_selected, testimonial.date_of_publishing, testimonial.approved
                                                                    FROM testimonial LEFT JOIN registered_user ON testimonial.username = registered_user.username
                                                                    WHERE testimonial.username= '$username' ORDER BY testimonial.date_of_publishing DESC";
        }
        elseif(!$username)
        {
            $show_testimonial_query = "SELECT testimonial.description, registered_user.individual_name, registered_user.role_selected, testimonial.date_of_publishing
                                                                    FROM testimonial LEFT JOIN registered_user ON testimonial.username = registered_user.username
                                                                    WHERE testimonial.approved = 1 ORDER BY testimonial.date_of_publishing DESC";
        }
        if(mysqli_query($connection, $show_testimonial_query)){
            $results= mysqli_fetch_all(mysqli_query($connection, $show_testimonial_query), MYSQLI_ASSOC);
            return $results;
        }
        else{
            die("Error");
        }
    mysqli_close($connection);
    }
}
?>