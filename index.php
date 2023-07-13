<!DOCTYPE html>
<html>

<head>
    <title>Add Form</title>
    <link rel="stylesheet" href="./style/style.css" />

</head>

<body>
    <h2>Add Entry</h2>
    <div class="container">
        <form action="create.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <div class="radio-group">
                    <label><input type="radio" name="gender" value="Male" required> Male</label>
                    <label><input type="radio" name="gender" value="Female" required> Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="hobbies">Hobbies:</label>
                <div class="custom-select-wrapper">
                    <select id="hobbies" name="hobbies[]" multiple required>
                        <option value="" selected>Select Hobbies</option>
                        <option value="Reading">Reading</option>
                        <option value="Sports">Sports</option>
                        <option value="Traveling">Traveling</option>
                        <option value="Music">Music</option>
                    </select>

                </div>
            </div>



            <div class="form-group">
                <label for="display_pic">Display Picture:</label>
                <input type="file" id="display_pic" name="display_pic" accept="image/*" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
    <script src="./js/main.js"></script>

</body>


</html>