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
        <h1 class="enter-dish">Create an account</h1>
        <form id="register-form" action="register_complete.php" method="post">
            <label for="first-name">First Name:</label>
            <input type="text" id="first-name" name="first-name" pattern="^[A-Za-z\s]+$"
                title="You may only enter letters and spaces." required><br><br>
            <label for="last-name">Last Name:</label>
            <input type="text" id="last-name" name="last-name" pattern="^[A-Za-z\s]+$"
                title="You may only enter letters and spaces." required><br><br>
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                title="Enter a valid email address" required><br><br>
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required><br><br>

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
