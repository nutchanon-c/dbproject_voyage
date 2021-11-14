    <?php
        //Start the session
        session_start();
        //connect to the database via connect.php
        require_once('connect.php');
        //Get all the nessesary data
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        $email = $_POST['email'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $gender = $_POST['gender'];

        //Query command to insert the value into the user tables
        $q = "INSERT INTO user values ('', '$uname', '$pass', '$fname', '$lname', '$email', '$address', '$tel', '$dob', '$gender', 0);";

        if($result = $mysqli->query($q)){
            $_SESSION['FirstName'] = $fname;
            header("Location: home.php?signin=69");
        }
        else{
            echo "query failed:".$mysqli->error;
        }

        // get user_id from user table that matches the username, password, firstname, lastname, email, address, tel, dob
        $q = "SELECT user_id FROM user WHERE username = '$uname' AND password = '$pass' AND firstname = '$fname' AND lastname = '$lname' AND email = '$email' AND address = '$address' AND tel = '$tel' AND dob = '$dob';";
        if($result = $mysqli->query($q)){
            $row = $result->fetch_assoc();
            $user_id = $row['user_id'];
            $_SESSION['User_ID'] = $user_id;
        }
        else{
            echo "query failed:".$mysqli->error;
        }
    
    ?>