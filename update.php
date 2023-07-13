<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $hobbies = implode(', ', $_POST['hobbies']);
    
    // Update the entry in the database
    $sql = "UPDATE assessment SET name='$name', gender='$gender', dob='$dob', address='$address', hobbies='$hobbies' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to the list page after successful entry update
        header("Location: list.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
