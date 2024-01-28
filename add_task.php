<?php


include 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $dueDate = $_POST['dueDate'];


    // Validate required fields
    if (empty($title) || empty($description) || empty($dueDate)) {
        echo "All fields are required";
        exit;
    }

   // Validate 'dueDate' is not in the past
   $currentDate = new DateTime();
   $selectedDate = new DateTime($dueDate);

   if ($selectedDate < $currentDate) {
       echo "Due date must be in the future";
       exit;
   }

    $stmt = $conn->prepare("INSERT INTO tasks (title, description, priority,  due_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $title, $description, $priority,  $dueDate);
   
    if ($stmt->execute()) { 
        echo 'Task added successfully.';
     } else {
        echo $stmt->error;
     }
    $stmt->close();
   


}

$conn->close();
?>
