<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>

<body>
<?php

include('includes/navbar.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
  
    // Establish database connection
    $con = mysqli_connect("db.luddy.indiana.edu", "i494f23_klhribal", "my+sql=i494f23_klhribal", "i494f23_klhribal");
    if (!$con) {
        die("Failed to connect to MySQL: " . mysqli_connect_error() . "<br><br>");
    }
    
    
    $dishName = mysqli_real_escape_string($con, $_POST['dish-name']); // Sanitize and escape the input
    $dishPrice = trim($_POST['dish-price']);
    $dishPrice = (float) $dishPrice;
    $dishDesc = mysqli_real_escape_string($con, $_POST['dish-desc']); // Sanitize and escape the input
    $attributes = $_POST['attributes']; // Assuming this is an array of attribute IDs



    // Assuming you have the item_id from the previous page (edit.php) as well
    $itemId = $_GET['id'];

    // Update the menu item in the menu_items table
    $query = "UPDATE menu_items SET item_name='$dishName', price=CAST('$dishPrice' AS DECIMAL(10, 2)), item_description='$dishDesc' WHERE id='$itemId'";
    if (mysqli_query($con, $query)) {
        // Delete existing associations in menu_item_attributes table
        $deleteQuery = "DELETE FROM dish_attribute WHERE dish_id='$itemId'";
        mysqli_query($con, $deleteQuery);

        // Insert new associations into dish_attribute  table
        foreach ($attributes as $attributeId) {
            $insertQuery = "INSERT INTO dish_attribute (dish_id, attribute_id) VALUES ('$itemId', '$attributeId')";
            mysqli_query($con, $insertQuery);
        }

        echo '<div style="text-align: center; font-size: 16px; font-weight: bold;">Record updated successfully</div>';
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
} else {
    // Handle the case where the form is not submitted
    echo "Form not submitted.";
}
?>


    <!-- Link to JS -->
    <script src="js/site.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>
