<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Edit Dish</title>
</head>
<body>
<?php
include('includes/navbar.php');

// Check if the 'id' parameter is set in the URL
if(isset($_GET['id'])){
    // Retrieve the 'id' parameter from the URL
    $itemId = $_GET['id'];
    
// Establish database connection
$con = mysqli_connect("db.luddy.indiana.edu","i494f23_klhribal","my+sql=i494f23_klhribal", "i494f23_klhribal");
if (!$con){
    die("Failed to connect to MySQL: " . mysqli_connect_error() . "<br><br>");
};

// Query to fetch the specific menu item using the $itemId
$query = "SELECT * FROM menu_items WHERE id = $itemId;";
$result = mysqli_query($con, $query);

// Fetch the menu item details
$menuItem = mysqli_fetch_assoc($result);

// Query to fetch selected attributes for the menu item
$queryAttributes = "SELECT attribute_id FROM dish_attribute WHERE dish_id = $itemId;";
$resultAttributes = mysqli_query($con, $queryAttributes);
$selectedAttributes = [];
while ($rowAttributes = mysqli_fetch_assoc($resultAttributes)) {
    $selectedAttributes[] = $rowAttributes['attribute_id'];
}

echo '<div class="form-container">';
echo '<h1 class="enter-dish">Edit this dish</h1>';
echo '<form id="dish-form" action="editthanks.php?id=' . $itemId . '" method="post">';
echo '<label for="dish-name">Dish Name:</label>';
echo '<input type="text" id="dish-name" name="dish-name" pattern="^[A-Za-z\s]+$" title="You may only enter letters and spaces." value="'. htmlspecialchars($menuItem['item_name'], ENT_QUOTES) . '" required><br><br>';
echo '<label for="dish-price">Dish Price:</label>';
echo '<input type="text" id="dish-price" name="dish-price" pattern="^\d+(\.\d{1,2})?$" title="You must enter a number, with max 2 decimal places." value="'. htmlspecialchars($menuItem['price'], ENT_QUOTES) . '" required><br><br>';    echo '<label for="dish-desc">Dish Description:</label>';
echo '<input type="text" id="dish-desc" name="dish-desc" pattern="^[A-Za-z\s]+$" title="You may only enter letters and spaces." value="'. htmlspecialchars($menuItem['item_description'], ENT_QUOTES) . '" required><br><br>';
echo '<div class="checkbox">';



// Fetch all attributes from the attribute table
$query2 = 'SELECT id, attribute_type FROM attribute;';
$result2 = mysqli_query($con, $query2);

while($row = mysqli_fetch_assoc($result2)){
    $isChecked = (in_array($row['id'], $selectedAttributes)) ? 'checked' : '';
    echo '<input type="checkbox" id="' . $row['attribute_type'] . '" name="attributes[]" value ="'. $row['id'] . '" ' . $isChecked . '>';
    echo '<label for="' . $row['attribute_type'] . '">' . $row['attribute_type'] . '</label><br>';
}

echo '</div>';
echo '<input type="submit" value="Submit">';
echo '</form>';
echo '</div>';

// Close the database connection
mysqli_close($con);
}
    // ... rest of your code ...
else {
    echo "Error: 'id' parameter not found in the URL.";
}

    
?>
<!-- Link to JS and Bootstrap scripts -->
<script src="js/site.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
``
