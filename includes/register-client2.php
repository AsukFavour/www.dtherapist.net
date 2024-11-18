<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        session_start();
        $usercode = $_SESSION['dTheraClie'];  

        include 'connect_to_db.php';

        // Retrieve and sanitize form data
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "UPDATE clients SET passwd = '$password' WHERE usercode = '$usercode';";
        mysqli_query($conn, $sql);

        header("Location: ../dashboard?message=Registration Complete.");
        exit();
    }else{
        header("Location: ../register-user?message=The system experienced a Fatal error!");
        exit();
    }
?>