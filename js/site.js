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
  


