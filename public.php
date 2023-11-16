<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<?php
include('includes/navbar.php');
?>


<!-- Dishes Table -->
<div class="dish-table">

<table class="table table-striped">
  <thead>
    <tr>
        <th scope="col">Dish Name</th>
        <th scope="col">Dish Price</th>
        <th scope="col">Dish Description</th>
        <th scope="col">Dietary Preference</th>
    </tr>
  </thead>
  <tbody>

<!-- Selecting data from SQL to populate table -->
<?php 
$con = mysqli_connect("db.luddy.indiana.edu","i494f23_klhribal","my+sql=i494f23_klhribal", "i494f23_klhribal");
if (!$con){
    die("Failed to connect to MySQL: " . mysqli_connect_error() . "<br><br>");
};

$query = 'SELECT menu_items.id, menu_items.item_name, menu_items.price, menu_items.item_description, GROUP_CONCAT(attribute.attribute_type) AS attributes
          FROM menu_items
          LEFT JOIN dish_attribute ON menu_items.id = dish_attribute.dish_id
          LEFT JOIN attribute ON dish_attribute.attribute_id = attribute.id
          GROUP BY menu_items.id;';
$result = mysqli_query($con, $query);


while($row = mysqli_fetch_assoc($result)){
  echo "<tr>";
  echo '<th scope="row">'.$row['item_name']."</th>";
  echo "<td>".$row['price']."</td>";
  echo "<td>".$row['item_description']."</td>";
  echo "<td>".$row['attributes']."</td>";
  echo '<td><a href="edit.php?id=' . $row['id'] . '" class="btn btn-info">Edit</a></td>';
  echo '<td><button class="btn btn-danger" onclick="confirmDelete(' . $row['id'] . ')">Delete</button></td>';
  echo "</tr>";
}

mysqli_close($conn);
?>

  </tbody>
</table>
</div>


<div class="image-div">
<div class="image-container">
    <img src="img/dessert1.png" alt="Image 1">
    <img src="img/dessert2.png" alt="Image 2">
    <img src="img/dessert3.png" alt="Image 3">
</div>
</div>


<script>
function confirmDelete(itemId) {
  var result = confirm("Are you sure you want to delete this record?");
  
  if (result) {
    // User clicked OK, proceed with deletion
    window.location.href = 'delete.php?id=' + itemId;
  } else {
    // User clicked Cancel or closed the pop-up
    // Do nothing or provide additional feedback if needed
  }
}
</script>
<!-- Link to Nav Button JS -->
<script src="js/site.js"></script>

<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>