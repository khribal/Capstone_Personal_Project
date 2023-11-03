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


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $dishName = $_POST["dish-name"];
        $dishPrice = $_POST["dish-price"];
        $dishDesc = $_POST["dish-desc"];
        $attributes = $_POST["attribute"];
    
        // Database connection code
        $con = mysqli_connect("db.luddy.indiana.edu", "i494f23_klhribal", "my+sql=i494f23_klhribal", "i494f23_klhribal");
    
        if (!$con) {
            die("Failed to connect to MySQL: " . mysqli_connect_error() . "<br><br>");
        }
    
        // Insert dish into menu_items table
        $query = "INSERT INTO menu_items (item_name, item_description, price) VALUES ('$dishName', '$dishDesc', '$dishPrice')";
    
        if (mysqli_query($con, $query)) {
            // Get the ID of the newly inserted dish
            $dishId = mysqli_insert_id($con);
        
            // Insert selected attributes into dish_attribute table
            foreach ($attributes as $attributeId) {
                $query2 = "INSERT INTO dish_attribute (dish_id, attribute_id) VALUES ('$dishId', '$attributeId')";
                if (!mysqli_query($con, $query2)) {
                    echo "Error inserting record: " . mysqli_error($con);
                }
            }
        
            echo '<div style="text-align: center; font-size: 16px; font-weight: bold;">Dish inserted successfully</div>';
        }
        
        mysqli_close($con);
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


