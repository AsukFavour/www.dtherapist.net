// load_chat_history.php
<?php
    include 'connect_to_db.php';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    header('Content-Type: application/json');

    $usercode = $_GET['usercode'] ?? '';

    if ($usercode) {
        $sql = "SELECT sender, message, timestamp FROM chat_messages WHERE usercode = ? ORDER BY timestamp ASC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $usercode);
        $stmt->execute();
        $result = $stmt->get_result();

        $messages = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $messages[] = $row;
            }
        }
        echo json_encode($messages);
        $stmt->close();
    } else {
        echo json_encode(["error" => "Usercode not provided"]);
    }

    $conn->close();
?>
