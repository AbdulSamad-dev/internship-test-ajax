<?php
include 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskId = $_POST["taskId"];
    $priority = $_POST["priority"];
    $priority = ($priority == 1 ? 0 : 1);

    // Perform the database update
    $sql = "UPDATE tasks SET priority = '$priority' WHERE id = '$taskId'";
    $result = $conn->query($sql);

    if ($result) {
        echo "Priority updated successfully!";
    } else {
        echo "Error updating priority: " . $conn->error;
    }
} else {
    echo "Invalid request";
    
}

// Close the database connection if needed
$conn->close();
?>
