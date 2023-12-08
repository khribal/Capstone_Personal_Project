
<html>
<head>
    <title></title>
</head>
<body>
<div class="div-navbar">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="home.php">Sweet Bliss Bistro</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="public.php">Public</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="private.php">Private</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><button id="myButton" class="btn btn-info">Check Discount</button></a>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
      <?php
      session_start(); // Start the session
      if (isset($_SESSION['user_email'])) {
          // User is logged in
          echo '<li class="nav-item"><a href="logout.php">Logout</a></li>';
      } else {
          // User is not logged in
          echo '<li class="nav-item"><a href="login.php">Log in</a></li>';
      }
      ?>
      </li>
  </ul>
  </div>
</nav>
</div>

<!-- Link to Nav Button JS -->
<script src="js/site.js"></script>
</body>
</html>


