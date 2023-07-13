function validateForm() {
  var name = document.getElementById("name").value;
  var gender = document.querySelector('input[name="gender"]:checked');
  var dob = document.getElementById("dob").value;
  var address = document.getElementById("address").value;
  var hobbies = document.getElementById("hobbies").selectedOptions;
  var displayPic = document.getElementById("display_pic").value;

  if (name === "") {
    alert("Please enter a name.");
    return false;
  }

  if (!gender) {
    alert("Please select a gender.");
    return false;
  }

  if (dob === "") {
    alert("Please select a date of birth.");
    return false;
  }

  if (address === "") {
    alert("Please enter an address.");
    return false;
  }

  if (hobbies.length === 0) {
    alert("Please select at least one hobby.");
    return false;
  }

  if (displayPic === "") {
    alert("Please choose a display picture.");
    return false;
  }

  return true;
}
