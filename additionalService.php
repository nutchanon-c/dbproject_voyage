<?php 
    //Start session
    session_start();
    //

    // checkboxes for additional services
    // links to reservation summary
    // query chosen choices to RR_AS
    require_once('connect.php');

    // select all from additional_service table
    echo "<form action='reservation_summary.php?signin=69' method='post'>";
    $query = "SELECT * FROM additional_service";
    if($result = $mysqli->query($query)){
        while($row = $result->fetch_array()){
            $as_id = $row['AS_ID'];
            $as_name = $row['Type'];
            $as_price = $row['Price'];
            // create form with checkboxes for each additional service and submit button
            echo "<input type='checkbox' name='$as_id' value='$as_id'>$as_name $as_price<br>"; 
        }
    
    }
    
    else{
        echo "Error: " . $query . "<br>" . mysqli_error($dbc);
    }
    // submit button
    echo "<input type='submit' value='Submit'>";
    echo "</form>";
?>