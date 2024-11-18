// save_message.php
<?php
    include 'connect_to_db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usercode = $_POST['usercode'];
        $sender = $_POST['sender'];
        $message = $_POST['message'];
    
        $stmt = $conn->prepare("INSERT INTO chat_messages (usercode, sender, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $usercode, $sender, $message);
    
        if ($stmt->execute()) {
            echo "Message saved successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    }
    
    $conn->close();
?>
