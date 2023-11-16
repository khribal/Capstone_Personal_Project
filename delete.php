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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $con = mysqli_connect("db.luddy.indiana.edu", "i494f23_klhribal", "my+sql=i494f23_klhribal", "i494f23_klhribal");

    if (!$con) {
        die("Failed to connect to MySQL: " . mysqli_connect_error() . "<br><br>");
    }

    $query = "DELETE FROM dish_attribute WHERE dish_id = $id";
    $result = mysqli_query($con, $query);
    
    $query3 = "DELETE FROM order_menu WHERE menu_itemID = $id";
    $result3 = mysqli_query($con, $query3);

    $query2 = "DELETE FROM menu_items WHERE id = $id";
    $result2 = mysqli_query($con, $query2);

    if ($result && $result2 && $result3) {
        // Successfully deleted, you can redirect or provide feedback
        echo '<div style="text-align: center;"> Record deleted successfully. </div>';
    } else {
        // Failed to delete, handle error
        echo "Error deleting record: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Invalid request.";
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



