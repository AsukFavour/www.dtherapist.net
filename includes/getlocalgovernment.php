<?php

    // Perform database connection and query to fetch hospitals based on the selected state
    // Replace the database credentials and table/column names with your actual values

    include 'connect_to_db.php';

    $selectedState = $_POST['state'];

    // Prevent SQL injection using prepared statements
    $stmt = $conn->prepare("SELECT id_no FROM state WHERE state = ?");
    $stmt->bind_param("s", $selectedState);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Fetch the state id_no
        $stmt->bind_result($id);
        $stmt->fetch();

        // Query to fetch local governments based on the selected state
        $stmt = $conn->prepare("SELECT local_govt FROM local_govt WHERE state_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Output local governments as options for the dropdown
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['local_govt']}'>{$row['local_govt']}</option>";
            }
        }
    } else {
        echo "<option value=''>No local governments found</option>";
    }

$stmt->close();
$conn->close();
?>


?>