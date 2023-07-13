<!DOCTYPE html>
<html>

<head>
    <title>Edit Page</title>
    <link rel="stylesheet" href="./style/edit.css">
</head>

<body>
    <h2>Edit Page</h2>
    <?php
    require_once 'config.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch the entry from the database
        $sql = "SELECT * FROM assessment WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
    ?>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <div class="radio-group">
                        <label for="male">Male</label>
                        <input type="radio" id="male" name="gender" value="Male" <?php if ($row['gender'] == "Male") echo "checked"; ?> required>

                        <label for="female">Female</label>
                        <input type="radio" id="female" name="gender" value="Female" <?php if ($row['gender'] == "Female") echo "checked"; ?> required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required><?php echo $row['address']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="hobbies">Hobbies:</label>
                    <select id="hobbies" name="hobbies[]" multiple required>
                        <option value="Reading" <?php if (strpos($row['hobbies'], "Reading") !== false) echo "selected"; ?>>Reading</option>
                        <option value="Writing" <?php if (strpos($row['hobbies'], "Writing") !== false) echo "selected"; ?>>Writing</option>
                        <option value="Sports" <?php if (strpos($row['hobbies'], "Sports") !== false) echo "selected"; ?>>Sports</option>
                        <option value="Music" <?php if (strpos($row['hobbies'], "Music") !== false) echo "selected"; ?>>Music</option>
                    </select>
                </div>

                <input type="submit" value="Update Entry">
            </form>

    <?php
        } else {
            echo "Entry not found.";
        }
    } else {
        echo "Invalid request.";
    }

    $conn->close();
    ?>
</body>

</html>