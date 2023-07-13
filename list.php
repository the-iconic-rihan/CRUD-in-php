<!DOCTYPE html>
<html>

<head>
    <title>List Page</title>
    <link rel="stylesheet" href="./style/list.css">
</head>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this entry?");
    }
</script>

<body>
    <h2>List Page</h2>
    <div class="main">
        <table>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Hobbies</th>
                <th>Action</th>
            </tr>
            <!-- Fetch and display the entries from the database -->
            <?php
            require_once 'config.php';

            $sql = "SELECT * FROM assessment";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['gender']}</td>";
                    echo "<td>{$row['dob']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['hobbies']}</td>";
                    echo "<td><a href='edit.php?id={$row['id']}'>Edit</a> | <a href='view.php?id={$row['id']}'>View</a> | <a href='delete.php?id={$row['id']}' onclick='return confirmDelete();'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No entries found.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>

</html>