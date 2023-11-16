// Function to check if the current time minute is odd
function isOddMinute() {
    const now = new Date();
    const minute = now.getMinutes();
    return minute % 2 !== 0;
  }
  
  // Function to show a discount pop-up message
  function showDiscountPopup() {
    if (isOddMinute()) {
      alert("Way to go! You have an available discount.");
    } else {
      alert("Sorry, no discount available right now.");
    }
  }
  
  // Add an event listener to the button in the navbar
  document.addEventListener("DOMContentLoaded", function () {
    const discountButton = document.getElementById("myButton");
    if (discountButton) {
      discountButton.addEventListener("click", showDiscountPopup);
    }
  });
  


 // Function to validate dish name and description input
function validateInput(input) {
  // Regex to allow letters, spaces, periods, apostrophes, hyphens, and ampersands, but disallow numbers
  var regex = /^[A-Za-z\s.'&-]+$/;
  return regex.test(input);
}

// Function to handle form submission
function validateForm() {
  var dishName = document.getElementById('dish-name').value;
  var dishDesc = document.getElementById('dish-desc').value;

  if (!validateInput(dishName) || !validateInput(dishDesc)) {
      alert('Invalid input. Please enter only letters, spaces, periods, apostrophes, hyphens, and ampersands.');
      return false; // Prevent form submission
  }
  return true; // Allow form submission
}


