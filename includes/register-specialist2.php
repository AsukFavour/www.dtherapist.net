<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        session_start();
        $usercode = $_SESSION['dTheraSpeci'];  

        include 'connect_to_db.php';

        // Retrieve and sanitize form data
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "UPDATE specialists SET passwd = '$password' WHERE usercode = '$usercode';";
        mysqli_query($conn, $sql);

        header("Location: ../provider-dashboard?message=Registration Complete.");
        exit();
    }else{
        header("Location: ../register-specialist?message=The system experienced a Fatal error!");
        exit();
    }
?>