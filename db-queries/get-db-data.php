<?php
    /**
     * script to create json object for js response to show client side validations on registration form 
     */
    require 'connect.php';
    $get_data_query = "SELECT email, contact,username FROM registered_user";
    $get_results = mysqli_query($connection,$get_data_query);
    if($get_results){
        $i = 0;
        while($results_row = mysqli_fetch_array($get_results))
        {
            $results_json[$i]['email'] = $results_row['email'];
            $results_json[$i]['contact'] = $results_row['contact'];
            $results_json[$i]['username'] = $results_row['username'];
            $i++;
        }
    }
    echo json_encode($results_json);   //json_encoded object for the results from db
    mysqli_close($connection);
?>