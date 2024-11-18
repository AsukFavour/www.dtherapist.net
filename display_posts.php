<?php

    include 'includes/connect_to_db.php';

    // Username
    $currentUsername = $username; // Assuming $username is already defined and holds the current user's username

    // Fetch posts
    $sql = "SELECT * FROM posts WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $currentUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr class="item-editable">';
            echo '<td class="media-middle text-center"><input type="checkbox"></td>';
            echo '<td class="media-middle"><h5><a href="admin_appointment.html">' . htmlspecialchars($row['title']) . '</a></h5></td>';
            echo '<td><div class="media">';
            echo '<div class="media-left"><img src="' . htmlspecialchars($row['image_url']) . '" alt="..."></div>';
            echo '<div class="media-body"><h5><a href="admin_profile.html">' . htmlspecialchars($row['author']) . '</a></h5>';
            echo '&lt;<a href="mailto:' . htmlspecialchars($row['author_email']) . '">' . htmlspecialchars($row['author_email']) . '</a>&gt;';
            echo '</div></div></td>';
            echo '<td class="media-middle"><time datetime="' . htmlspecialchars($row['date']) . '" class="entry-date">' . date("d.m.Y \a\\t H:i", strtotime($row['date'])) . '</time></td>';
            echo '<td class="media-middle">' . htmlspecialchars($row['categories']) . '</td>';
            echo '<td class="media-middle">' . htmlspecialchars($row['status']) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="6">No posts found.</td></tr>';
    }

    $stmt->close();
?>
