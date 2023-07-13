<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete the entry from the database
    $sql = "DELETE FROM assessment WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to the list page after successful deletion
        header("Location: list.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
