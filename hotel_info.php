<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyage</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <style>
        body {
            font-family: 'Ramabhadra', sans-serif;
        }
</style>
</head>
<body>
    
        <!-- 
            Single : room type
            xx Persons : size
            xx xx beds: bedamt, (bedtype_id -> bedtype)  ===== ex. "1 single bed"
            desc
            -------------
            price      


         -->

         <?php 
            //Connect to the database via connect.php
            require_once('connect.php');
            //Start the session
            session_start();
            //Pass the value of the hotelID
            $hotelID = $_GET['hotel_id'];
            //Query command
            $q = "SELECT * FROM room, bedtype WHERE Hotel_ID = '$hotelID' AND room.BedType_ID = bedtype.BedType_ID";
            //Execute the query
            if($result = $mysqli->query($q)){
                //While loop for displaying information
                while($row = $result->fetch_array()){
                    echo '<div>'; //The most outer container of the box of information (Vertical box)
                        echo '<h2>'.$row['Room_Type'].'</h2>';
                        echo '<list>';//Start of the list contain information
                            echo '<ul>';//Unordered list
                                echo '<li>'.$row['Size'].' Person</li>';
                                echo '<li>'.$row['BedAmt']." ".$row['BedType']." beds</li>";
                            echo '</ul>';
                        echo '</list>';
                        echo '<p>'.$row['Room_Desc'].'</p>';
                        echo '<h2>'.$row["Price"].'</h2>';
                    echo '</div>';//Close tag of the most outer container
                }
            }
            
            


         ?>

</body>

</html>