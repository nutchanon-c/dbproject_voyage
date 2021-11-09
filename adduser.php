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

        //Query command to insert the value into the user tables
        $q = "INSERT INTO user values ('',NULL, '$uname', '$pass', '$fname', '$lname', '$email', '$address', '$tel', '$dob', 'Gay', 0);";

        if($result = $mysqli->query($q)){
            $_SESSION['FirstName'] = $fname;
            header("Location: home.php?signin=69");
        }
        else{
            echo "query failed:".$mysqli->error;
        }
    
    ?>