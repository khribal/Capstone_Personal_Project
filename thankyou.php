
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>
<?php
include('includes/navbar.php');
?>
<?php
    // Clean and sanitize input data
    function cleanInput($data) {
        $data = trim($data); // Remove extra spaces at the beginning and end
        $data = stripslashes($data); // Remove backslashes (\)
        $data = htmlspecialchars($data); // Convert special characters to HTML entities
        return $data;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $dishName = cleanInput($_POST["dish-name"]);
    $dishPrice = cleanInput($_POST["dish-price"]);
    $dishDesc = cleanInput($_POST["dish-desc"]);
    $dishattribute = $_POST["attribute"];


    //database connection code
    $con = mysqli_connect("db.luddy.indiana.edu", "i494f23_klhribal", "my+sql=i494f23_klhribal", "i494f23_klhribal");

    if (!$con) {
        die("Failed to connect to MySQL: " . mysqli_connect_error() . "<br><br>");
    }
    // Perform your database insertion or update using the sanitized data
    $query = "INSERT INTO menu_items (item_name, item_description, price, attribute) VALUES ('$dishName', '$dishDesc', '$dishPrice', '$dishattribute')";

    if (mysqli_query($con, $query)) {
        echo '<h2 style="text-align: center;"> New dish has successfully been inserted into the database! </h2>';
        
    } else {
        echo "Error inserting record: " . mysqli_error($con);
    }

    mysqli_close($con);
}

?>
<div class="centered-button">
<a href="public.php"><button type="button" class="btn btn-info" style="text-align: center;">Return to menu</button></a>
</div>
<!-- Link to JS -->
<script src="js/site.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
