// Function to check time and show discount message
function checkTimeForDiscount() {
    const currentTime = new Date();
    const currentMinute = currentTime.getMinutes();

    if (currentMinute % 2 !== 0) {
        // Minute is odd, display discount message
        alert("Congratulations! You have a discount available.");
    } else {
        // Minute is even, no discount
        alert("Sorry, no discount available at this time.");
    }
}

// Add click event listener to the button
const discountButton = document.getElementById("checkDiscountButton");
if (discountButton) {
    discountButton.addEventListener("click", checkTimeForDiscount);
}