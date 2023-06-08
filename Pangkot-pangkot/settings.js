
// Function to handle avatar selection change
function handleAvatarChange() {
  // Get the selected option from the dropdown
  var dropdown = document.getElementById("avatar-dropdown");
  var selectedOption = dropdown.options[dropdown.selectedIndex].value;

  // Update the avatar image based on the selected option
  var avatarImage = document.getElementById("avatar-image");
  avatarImage.src = "Images/Avatar/" + selectedOption + ".png";
}

// Add event listener to the dropdown
document.addEventListener("DOMContentLoaded", function() {
  var dropdown = document.getElementById("avatar-dropdown");
  dropdown.addEventListener("change", handleAvatarChange);
});
