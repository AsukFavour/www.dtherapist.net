<?php
// Include the database connection file
include 'connect_to_db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $title = $_POST['title'];
    $categories = $_POST['categories'];
    $article = $_POST['article'];
    $status = 'Review';
    $author = $_POST['author'];
    $imageid = time();

    // Handle image upload
    $imageName = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageName = $imageid;
        $uploadDir = 'posts/'; // Directory to save the uploaded image
        $uploadFile = $uploadDir . $imageName;

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($imageTmpName, $uploadFile)) {
            die('Failed to upload image.');
        }
    }

    // Prepare SQL query to insert the post into the database
    $sql = "INSERT INTO posts (title, author, categories, status, image_url, article) 
            VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssss", $title, $author, $categories, $status, $imageName, $article);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New post created successfully!";
            header("Location: ../posts?message=Post successfully created.");
            exit();
        } else {
            //echo "Error: " . $stmt->error;
            header("Location: ../posts?message=Error creating post.");
            exit();
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
        header("Location: ../posts?message=Error creating post.");
            exit();
    }

    // Close the database connection
    $conn->close();
}
?>
