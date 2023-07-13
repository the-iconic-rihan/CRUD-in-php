<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
    <link rel="stylesheet" href="./style/view.css">
</head>

<body>
    <h2>Entry Details</h2>
    <div class="main">
        <table>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Hobbies</th>
                <th>Display Pic</th>
            </tr>
            <?php
            require_once("config.php");

            // Check if an ID parameter is passed through the URL
            if (isset($_GET["id"]) && !empty($_GET["id"])) {
                $id = $_GET["id"];

                // Prepare and execute a SELECT query to retrieve the entry with the specified ID
                $stmt = $conn->prepare("SELECT * FROM assessment WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                // Check if the entry exists
                if ($result->num_rows === 1) {
                    $row = $result->fetch_assoc();
                    echo "<tr>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['gender']}</td>";
                    echo "<td>{$row['dob']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['hobbies']}</td>";
                    echo "<td>{$row['display_pic']}</td>";
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='6'>Entry not found.</td></tr>";
                }

                $stmt->close();
            } else {
                echo "<tr><td colspan='6'>Invalid entry ID.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
        <a href="list.php">Back to List</a>
    </div>
</body>

</html>