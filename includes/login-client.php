<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        include 'connect_to_db.php';
        // Retrieve and sanitize form data
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        date_default_timezone_set('Africa/Lagos');  

        //prevent double registration
        $sqlD = "SELECT * FROM clients WHERE email = '$email'";
        $resultD = mysqli_query($conn, $sqlD);
        $resultCheckD = mysqli_num_rows($resultD);
        if($resultCheckD > 0) { 
            $Info = mysqli_fetch_assoc($resultD);            
            $passwd = $Info['passwd'];
            $usercode = $Info['usercode'];

            //check if there is a password
            if(empty($passwd)){

                header("Location: ../register-user-2?message=Create Password to secure your account.");
                exit();
            }else{

                if($password == $passwd){

                    //session
                    session_start();
                    $_SESSION['dTheraClie'] = $usercode;  

                    header("Location: ../dashboard?message=Welcome back.");
                    exit();
                }else{

                    header("Location: ../login-user?message=Password is not correct");
                    exit();
                }

                
            }         
            
        }else{

            header("Location: ../login-user?message=Email is not correct");
            exit();
        }

    }else{
        header("Location: ../register-user?message=The system experienced a Fatal error!");
        exit();
    }
?>