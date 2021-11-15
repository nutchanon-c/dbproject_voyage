<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Information</title>
    <!-- user admincss.css -->
    <link rel="stylesheet" href="admincss.css">


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
            <!-- logout button to go back to home.php -->
            <a href='logout.php' class='navbar-brand'>Logout</a>
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
                        // echo "<table><tr><td><img src='./assets/hotels/".$row['Picture']."'></td><td><b>Hotel Name:</b> ".$row['HotelName']."<br><b>Full Address:</b> ".$row['FullAddress']."<br><b>District:</b> ".$row['District']."<br><b>City:</b> ".$row['City']."<br><b>Post Code:</b> ".$row['PostCode']."<br><b>Tel:</b> ".$row['Tel']."<br><b>Email:</b> ".$row['Email']."</td></tr></table>";
                        // echo "<a href='hotel_edit.php?HotelID=".$row['hotel_id']."'><button>Edit</button></a>";

                        
                        // echo "</table>";

                        // new table layout
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>Hotel Picture</th>";
                        echo "<th>Hotel ID</th>";
                        echo "<th>Hotel Name</th>";
                        echo "<th>Address</th>";
                        echo "<th>District</th>";
                        echo "<th>City</th>";
                        echo "<th>Country</th>";
                        echo "<th>PostCode</th>";
                        echo "<th>Tel</th>";
                        echo "<th>Email</th>";
                        // add edit and delete button
                        echo "<th></th>";
                        // echo "<th></th>";
                        echo "</tr>";
                        while($row = $result->fetch_array()){
                            echo "<tr>";
                            echo "<td><img src='./assets/hotels/".$row['Picture']."'></td>";
                            echo "<td>" . $row['hotel_id'] . "</td>";
                            echo "<td>" . $row['HotelName'] . "</td>";
                            echo "<td>" . $row['FullAddress'] . "</td>";
                            echo "<td>" . $row['District'] . "</td>";
                            echo "<td>" . $row['City'] . "</td>";
                            echo "<td>" . $row['Country'] . "</td>";
                            echo "<td>" . $row['PostCode'] . "</td>";
                            echo "<td>" . $row['Tel'] . "</td>";
                            echo "<td>" . $row['Email'] . "</td>";
                            
                            // add edit and delete button
                            echo "<td><a href='hotel_edit.php?AS_ID=".$row['hotel_id']."'><button>Edit</button></a></td>";
                            // echo "<td><a href='admin_addser_delete.php?AS_ID=".$row['AS_ID']."'><button>Delete</button></a></td>";
                            echo "</tr>";
                        }
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
