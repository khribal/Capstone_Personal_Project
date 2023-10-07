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

<?php
        $con = mysqli_connect("db.luddy.indiana.edu","i494f23_klhribal","my+sql=i494f23_klhribal", "i494f23_klhribal");
        if (!$con){
            die("Failed to connect to MySQL: " . mysqli_connect_error() . "<br><br>");
        }
        $result = mysqli_query($con, "SELECT * FROM lesson as l join freelance as f on f.tutorID=l.tutorID where f.tutorID IN (SELECT tutorID from lesson) GROUP BY lesson_location order by lesson_location;");

        while ($row = mysqli_fetch_assoc($result)) {
            $location = $row['lesson_location'];
            echo '<option value="'.$location.'">'.$location.'</option>';
        }

?>

<table class="table table-striped table-dark">
  <thead>
    <tr>
        <th scope="col">Dish Name</th>
        <th scope="col">Dish Price</th>
        <th scope="col">Dish Category</th>
        <th scope="col">Dish Description</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Strawberry Shortcake</th>
      <td>$10.99</td>
      <td>Cakes</td>
      <td>This classic treat offers a harmonious blend of textures and flavors, with the sweet and tart strawberries complementing the light and airy cake or biscuits, all crowned by the richness of the whipped cream.</td>
    </tr>
    <tr>
      <th scope="row">Peach Cobbler</th>
      <td>$12.99</td>
      <td>Baked Good</td>
      <td>Indulge in the warmth of summer with our Peach Cobbler, a comforting dessert that captures the essence of ripe, juicy peaches. Served piping hot, our cobbler features succulent peach slices baked to perfection beneath a sweet, golden biscuit topping.</td>
    </tr>
    <tr>
      <th scope="row">Creme Brulee</th>
      <td>$7.99</td>
      <td>Custard</td>
      <td>Experience the epitome of elegance with our Crème Brûlée, a timeless French dessert. Delight in the silky smoothness of vanilla-infused custard, lovingly prepared to a velvety perfection. The pièce de résistance is the tantalizingly crisp, caramelized sugar crust that shatters with your first indulgent spoonful.</td>
    </tr>
    <tr>
      <th scope="row">Cheesecake</th>
      <td>$13.99</td>
      <td>Cakes</td>
      <td>Indulge in pure decadence with our Cheesecake, a luxurious dessert that defines creamy perfection. Our signature cheesecake is a masterful blend of rich cream cheese, sugar, and a hint of vanilla, baked to a velvety smoothness on a buttery graham cracker crust. </td>
    </tr>
  </tbody>
</table>
</div>

<!-- Images Row -->
<div class="container">
  <div class="row">
    <div class="col">
    <img src="img/strawberry.jpg" alt="strawberry-shortcake">
    </div>
    <div class="col">
    <img src="img/peach.jpg" alt="peach-cobbler">
    </div>
    <div class="col">
    <img src="img/creme.jpg" alt="creme-brulee">
    </div>
  </div>
</div>


<!-- Link to Nav Button JS -->
<script src="js/site.js"></script>

<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>