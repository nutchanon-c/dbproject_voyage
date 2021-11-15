<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Information</title>


    <style>
        img{
            width: 10em;
            height: 10em;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
    <nav class='navbar'>
            <!-- link to Admin Home Page -->
            <a href='admin_home.php' class='navbar-brand'>Admin Home</a>
            <list>
                <ul>
                    <li><a href='admin_hotel.php'>Hotel Information</a></li>
                    <li><a href='admin_userinfo.php'>User Information</a></li>
                    <li><a href='admin_reservation.php'>Reservation Information</a></li>
                    <li><a href='admin_comment.php'>User Comment</a></li>
                    <li><a href='admin_addser.php'>Additional Service</a></li>
                    <li><a href='admin_Staff.php'>Staff Information</a></li>
                </ul>
            </list>
        </nav>
        <main>
            <?php 
                //Start session and Connect to the database
                session_start();
                require_once('connect.php');
                //The Topic of the page
                echo "<h1>Hotel Information</h1>";
                //Query the data from the hotel tables
                $q = "SELECT * FROM Hotel";
                if($result = $mysqli->query($q)){
                    while($row = $result->fetch_array()){
                        // display HotelName, FullAddress, District, City, PostCode, Tel, Email in a table with border and bold tr
                        // add image to the left of the table
                        echo "<table border='1'><tr><td><img src='./assets/hotels/".$row['Picture']."'></td><td><b>Hotel Name:</b> ".$row['HotelName']."<br><b>Full Address:</b> ".$row['FullAddress']."<br><b>District:</b> ".$row['District']."<br><b>City:</b> ".$row['City']."<br><b>Post Code:</b> ".$row['PostCode']."<br><b>Tel:</b> ".$row['Tel']."<br><b>Email:</b> ".$row['Email']."</td></tr></table>";
                        // add edit button that links to hotel_edit.php
                        echo "<a href='hotel_edit.php?HotelID=".$row['hotel_id']."'><button>Edit</button></a>";
                        // echo "<table border='1'>";
                        // echo "<tr><td>Hotel ID</td><td>".$row['hotel_id']."</td></tr>";
                        // echo "<tr><td>Hotel Name</td><td>".$row['HotelName']."</td></tr>";
                        // echo "<tr><td>Full Address</td><td>".$row['FullAddress']."</td></tr>";
                        // echo "<tr><td>District</td><td>".$row['District']."</td></tr>";
                        // echo "<tr><td>City</td><td>".$row['City']."</td></tr>";
                        // echo "<tr><td>Post Code</td><td>".$row['PostCode']."</td></tr>";
                        // echo "<tr><td>Tel</td><td>".$row['Tel']."</td></tr>";
                        // echo "<tr><td>Email</td><td>".$row['Email']."</td></tr>";
                        
                        echo "</table>";

                        

                        

                    }
                
                }
                else{
                    echo "Wrong coding nibba";
                }

            ?>
        </main>
    </div>
</body>
</html>