<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $hobbies = implode(', ', $_POST['hobbies']);
    
    // Upload display picture
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["display_pic"]["name"]);
    move_uploaded_file($_FILES["display_pic"]["tmp_name"], $target_file);
    
    // Insert the data into the database
    $sql = "INSERT INTO assessment (name, gender, dob, address, hobbies, display_pic) VALUES ('$name', '$gender', '$dob', '$address', '$hobbies', '$target_file')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to the list page after successful entry creation
        header("Location: list.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
