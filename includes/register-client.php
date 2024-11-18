<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include 'getLocation.php';
        if(empty($region)){
            $region = 'Unspecified';
        }
        include 'connect_to_db.php';
        // Retrieve and sanitize form data
        $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
        $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $birthday = mysqli_real_escape_string($conn, $_POST['dob']);
        $marital = mysqli_real_escape_string($conn, $_POST['marital']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $lga = mysqli_real_escape_string($conn, $_POST['lga']);
        $reason = mysqli_real_escape_string($conn, $_POST['reason']);

        date_default_timezone_set('Africa/Lagos');  

        //prevent double registration
        $sqlD = "SELECT * FROM clients WHERE email='$email' AND fname='$fname'AND lname='$lname' AND birthday = '$birthday';";
        $resultD = mysqli_query($conn, $sqlD);
        $resultCheckD = mysqli_num_rows($resultD);
        if($resultCheckD < 1) { 

            //check if email already exists
            $sqlE = "SELECT * FROM clients WHERE email='$email';";
            $resultE = mysqli_query($conn, $sqlE);
            $resultCheckE = mysqli_num_rows($resultE);
            if($resultCheckE > 0) {
                header("Location: ../register-user?message= Email already exists");    
                exit();
            }

            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            function generate_string($input, $strength = 16) {
                $input_length = strlen($input);
                $random_string = '';
                for($i = 0; $i < $strength; $i++) {
                    $random_character = $input[mt_rand(0, $input_length - 1)];
                    $random_string .= $random_character;
                }
                return $random_string;
            }
            $usercode = generate_string($permitted_chars, 20);

            //ensure you don't have same code 
            $sql = "SELECT * FROM clients WHERE usercode='$usercode';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0) {
                $usercode = $usercode .'hi';
            }

            //insert data
            $sql = "INSERT INTO clients (usercode, fname, lname, email, marital, birthday, gender, mycountry, mystate, mylocation, emailverification, reason) 
                VALUES ('$usercode', '$fname', '$lname', '$email', '$marital', '$birthday', '$gender', '$region', '$state', '$lga', 'Pending', '$reason')";
            mysqli_query($conn, $sql);  

            //send email
            include 'mailWelcomeClient.php';            
            
        }
            //session
            session_start();
            $_SESSION['dTheraClie'] = $usercode;  

            //install cookie
            setcookie("dTheraClie", $usercode, time()+86400 * 360, '/');

            header("Location: ../register-user-2?message=Your registration was successful! Create Password to secure your account.");
            exit();

    }else{
        header("Location: ../register-user?message=The system experienced a Fatal error!");
        exit();
    }
?>