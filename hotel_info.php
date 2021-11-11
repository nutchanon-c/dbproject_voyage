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

        .hotel_info_container {
            /* text-align: center; */
            width: 70vw;
            height: auto;
            display: flex;
            /* align-items: center; */
            /* justify-content: center; */
            vertical-align: middle;
            background-color: #fbfbfb;
            margin-top: 5em;
            border-radius: 15px;
            padding: 2em;
            margin: 0 auto;
            border-radius: 15px;
        }

        .hotel_info_content {
            width: 100%;
            display: flex;
            /* flex-direction: column; */
            align-items: center;
            justify-content: center;
            text-align: center;
            /* margin-left: 2em; */
        }

        .hotel_info_content li {
            padding: 0.5em;

        }

        .hotel_info_content p {
            padding: 0.5em;
        }

        .hotel_info_content button {
            background-color: #FD7767;
            border: none;
            color: white;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
        }

        #book_button {
            margin-top: 1em;
        }

        hr {
            margin: 2em;
        }

        .hotel_img {
            width: 80%;
            height: auto;
            border-radius: 15px;
            border: 1px solid #fbfbfb;
        }

        ul {
            /* list-style-type: none; */
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <?php session_start(); ?>
    <div class="container">
        <div class="headbar">
            <?php
            if (isset($_GET['signin'])) {
                echo '<a href="home.php?signin=69"><img src="./assets/logo.png" width="150px" height="150px" style="cursor: pointer;"></a>';
            } else {
                echo '<a href="home.php"><img src="./assets/logo.png" width="150px" height="150px" style="cursor: pointer;"></a>';
            }
            ?>
            <span>
                <?php
                if (isset($_GET['signin'])) {
                    echo '<button type="submit" id="signin_button" onClick=document.location.href="profile.php?signin=69&user_id=' . $_SESSION['User_ID'] . '">' . $_SESSION['FirstName'] . '</button>';
                    // make sign out text
                    echo '<button type="submit" id="signout_button" onClick=document.location.href="logout.php?signin=69&user_id=' . $_SESSION['User_ID'] . '">Sign Out</button>';
                } else {
                    echo '<button type="submit" id="signin_button" onClick=document.location.href="login.php">Sign in</button>';
                }
                ?>
            </span>
        </div>


    </div>
    <div class="background_image" style="position: absolute; width: 100%">

        <img src="./assets/bg.png">

    </div>
    <!-- 
            Single : room type
            xx Persons : size
            xx xx beds: bedamt, (bedtype_id -> bedtype)  ===== ex. "1 single bed"
            desc
            -------------
            price      


         -->
    <div class="hotel_info_container">
        <div class="hotel_info_content">
            <?php
            //Connect to the database via connect.php
            require_once('connect.php');
            //Start the session
            // session_start();
            //Pass the value of the hotelID
            $hotelID = $_GET['hotel_id'];
            $_SESSION['Hotel_ID'] = $hotelID;

            //Query the HotelName and FullAddress from the database
            $sql = "SELECT HotelName, FullAddress, Picture FROM Hotel WHERE Hotel_ID = '$hotelID'";
            $result = $mysqli->query($sql);
            $row = $result->fetch_assoc();
            $hotelName = $row['HotelName'];
            $fullAddress = $row['FullAddress'];
            $picture = './assets/hotels/'.$row['Picture'];
            // put in div
            echo '<div class="hotel_info">';
            echo '<img class="hotel_img" src="' . $picture . '" alt="">';
            echo '<h1>' . $hotelName . '</h1>';
            echo '<h2>' . $fullAddress . '</h2>';
            echo '</div>';



            //Query command
            $q = "SELECT * FROM room, bedtype WHERE Hotel_ID = '$hotelID' AND room.BedType_ID = bedtype.BedType_ID";

            // get amount of free rooms to display in dropdown
            $d = "SELECT COUNT(*) FROM room WHERE room.Hotel_ID = '$hotelID' AND room.BedType_ID = bedtype.BedType_ID AND room.status = 0";

            // echo '<select>';
            // for($i = 0; $i <= 55; $i++){

            //     echo "<option value=".$i.">".$i."</option>";
            //     // echo $i;

            // }
            // echo '</select>';

            // after selection:
            // 1. query list of room_id with same room_type and hotel_id and status = 0 to get list of room_id that are free ADD LIMIT TO AMOUNT OF SELECTED
            // 2. update those status of room_id to 1 WHEN DOING TRANSACTION FROM TRANSACTION PAGE

            //Execute the query
            if ($result = $mysqli->query($q)) {
                //While loop for displaying information
                while ($row = $result->fetch_array()) {
                    echo '<div class="hotel_info_list">'; //The most outer container of the box of information (Vertical box)
                    echo '<h2>' . $row['Room_Type'] . '</h2>';
                    echo '<list>'; //Start of the list contain information
                    echo '<ul>'; //Unordered list
                    echo '<li>' . $row['Size'] . ' Persons</li>';
                    echo '<li>' . $row['BedAmt'] . " " . $row['BedType'] . " beds</li>";
                    echo '</ul>';
                    echo '</list>';
                    echo '<p>' . $row['Room_Desc'] . '</p>';
                    echo '<h2>' . $row["Price"] . ' Baht / Night</h2>';
                    //Drop down list for #room avaliable
                    $d = "SELECT COUNT(*) AS num FROM room WHERE room.Hotel_ID = '$hotelID' AND room.Room_Type = '" . $row['Room_Type'] . "' AND room.status = 0 AND room.bedType_ID = " . $row['BedType_ID'] . ' ;';



                    if ($inner = $mysqli->query($d)) {
                        // $temp=0;
                        while ($row2 = $inner->fetch_array() /* and $temp<100 */) {
                            // echo "<option value=".$row['num']."></option>";
                            // $temp++;
                            // echo $row2['num'];
                            if (isset($_GET['signin'])) {
                                echo '<form action="reservation_req.php?signin=69" method="GET">';
                                echo '<input type="hidden" name="signin" value="69"/>';
                            } else {
                                echo '<form action="login.php">';
                            }

                            // echo "<select name = ".$row['Room_Type'].">";
                            // for($i = 1; $i <= intval($row2['num']); $i++){
                            //     echo "<option value=".$i.">".$i."</option>";
                            //     echo $i;
                            // }
                            // echo "</select>";
                            echo '
                                <input type="hidden" name="RoomType" value="' . $row['Room_Type'] . '"/>
                                <input type="hidden" name="BedTypeID" value="' . $row['BedType_ID'] . '"/>
                                <input type="hidden" name="HotelID" value="' . $row['Hotel_ID'] . '"/>';

                            if (isset($_GET['signin'])) {
                                echo '<input type="hidden" name="User_ID" value="' . $_SESSION['User_ID'] . '"/>';
                            }
                            echo '<button id="book_button" name ="submit" value="1" type="submit">Book Now</button>';
                            echo "</form>";
                            echo '<hr>';
                        }
                    } else {
                        echo "query failed:" . $mysqli->error;
                    }


                    echo '</div>'; //Close tag of the most outer container
                }
            }




            ?>
        </div>
    </div>

</body>

</html>