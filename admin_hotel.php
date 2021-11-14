<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Information</title>
</head>
<body>
    <div class="container">
    <nav class='navbar'>
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
                        echo "<table>
                                    
                        
                                </table>"
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