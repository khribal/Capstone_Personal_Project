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
    ?>

    <div class="form-container">
        <h1 class="enter-dish">Enter a new dish!</h1>
        <form id="dish-form" action="thankyou.php" method="post">
            <label for="dish-name">Dish Name:</label>
            <input type="text" id="dish-name" name="dish-name" pattern="^[A-Za-z.&\s-]+$"
                title="You may only enter letters and spaces." required><br><br>
            <label for="dish-price">Dish Price:</label>
            <input type="text" id="dish-price" name="dish-price" pattern="^\d+(\.\d{1,2})?$"
                title="You must enter a number, with max 2 decimal places." required><br><br>
            <label for="dish-desc">Dish Description:</label>
            <input type="text" id="dish-desc" name="dish-desc" pattern="^[A-Za-z.&\s-]+$"
                title="You may only enter letters and spaces." required><br><br>
            <div class="checkbox">

                <?php
                $con = mysqli_connect("db.luddy.indiana.edu","i494f23_klhribal","my+sql=i494f23_klhribal", "i494f23_klhribal");
                if (!$con){
                    die("Failed to connect to MySQL: " . mysqli_connect_error() . "<br><br>");
                };

                $query = 'SELECT id, attribute_type FROM attribute;';
                $result = mysqli_query($con, $query);

                while($row = mysqli_fetch_assoc($result)){
                    echo '<input type="checkbox" id="' . $row['attribute_type'] . '" name="attribute[]" value ="'. $row['id'] . '" >';
                    echo '<label for="' . $row['attribute_type'] . '">' . $row['attribute_type'] . '</label><br>';
                }
                
                mysqli_close($con);
                ?>
            </div>

            <input type="submit" value="Submit">

        </form>
    </div>


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
