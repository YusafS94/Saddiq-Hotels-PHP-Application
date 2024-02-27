<?php
include "../Models/hotels-model.php";
checkSession();
include "../Views/navbar-view.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../z-css/style.css">
  <title>All hotels</title>
</head>
<body>
<div class="container">
<?php
$allHotels = getAllHotels();
?>
<div class="all__hotels__section">
  <h2 class="all__hotels__heading">All available hotels</h2>
<?php
  foreach ($allHotels as $hotel) {
    echo "<div class='hotelName'>";
    echo "<li>";
    echo "<a class='hotelName__link' href='details.php?id={$hotel["id"]}'>{$hotel["name"]}</a>";
    echo "</li>";
    echo "</div>";
  }
?>
</div>
</div>
<?php
include "../Views/footer-view.php";
?>
</body>
</html>

