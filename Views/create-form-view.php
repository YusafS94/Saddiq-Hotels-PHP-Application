<?php
// include "../Models/hotels-model.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add new Hotel</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../z-css/style.css">
</head>
<body>
  <?php
  include "../Views/navbar-view.php";
  ?>
<div class="container">
  <h2 class="create__hotel__heading">Add a new Hotel</h2>
  <form class="create__form" action="../Controllers/save.php" method="post">
  
  <!-- Hotel name -->
  <div class="">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name">
  </div>
  <!-- Stars -->
  <div class="radio_buttons">
  <div class="star1">
    <label for="1star">1 Star:</label>
    <input type="radio" value=1 id="1star" name="stars">
  </div>
  <div class="star2">
    <label for="2stars">2 Stars:</label>
    <input type="radio" value=2 id="2stars" name="stars">
  </div>
  <div class="star3">
    <label for="3stars">3 Stars:</label>
    <input type="radio" value=3 id="3stars" name="stars">
  </div>
  <div class="star4">
    <label for="4stars">4 Stars:</label>
    <input type="radio" value=4 id="4stars" name="stars">
  </div>
  <div class="star5">
    <label for="5stars">5 Stars:</label>
    <input type="radio" value=5 id="5stars" name="stars">
  </div>
  </div>
  
  <!-- Price -->
  <div>
  <label for="price">Price(£):</label>
  <input type="text" id="price" name="price">
  </div>
  
  <!-- Check in -->
  <div>
  <label for="checkIn">Check in time:</label>
  <input type="time" id="checkIn" name="checkIn">
  </div>
  
  <!-- Check out -->
  <div>
  <label for="checkOut">Check out time:</label>
  <input type="time" id="checkOut" name="checkOut">
  </div>
  
  <!-- Hotel Location -->
  <label for="hotelLocation">Location:</label>
  <select name="hotelLocation" id="hotelLocation">
    <option selected="selected" value="" disabled selected >Choose an option</option>
    <?php
      foreach($locations as $location) { ?>
        <option value="<?= $location['id'] ?>"><?= $location['location'] ?></option>
    <?php
      } ?>
  </select>
  
  <!-- Hotel Style -->
  
  <div class="radio_buttons">
  <div class="style1">
    <label for="style1">Boutique:</label>
    <input type="radio" value=1 id="style1" name="style">
  </div>
  <div class="style2">
    <label for="style2">Budget:</label>
    <input type="radio" value=2 id="style2" name="style">
  </div>
  <div class="style3">
    <label for="style3">Business:</label>
    <input type="radio" value=3 id="style3" name="style">
  </div>
  <div class="style4">
    <label for="style4">Historic:</label>
    <input type="radio" value=4 id="style4" name="style">
  </div>
  <div class="style5">
    <label for="style5">Luxury:</label>
    <input type="radio" value=5 id="style5" name="style">
  </div>
  </div>
  
  <!-- Amenities -->

    <div class="check_buttons">
      <legend>Please enter which amenities will be available at this Hotel:</legend>
      <div class="checkItems check1">
        <label for="option1">WiFi</label>
        <input type="checkbox" name="checkitem[]" id="option1" value="1">
      </div>
      <div class="checkItems check2">
        <label for="option2">Swimming Pool</label>
        <input type="checkbox" name="checkitem[]" id="option2" value="2">
      </div>
      <div class="checkItems check3">
        <label for="option3">Spa</label>
        <input type="checkbox" name="checkitem[]" id="option3" value="3">
      </div>
      <div class="checkItems check4">
        <label for="option4">Parking</label>
        <input type="checkbox" name="checkitem[]" id="option4" value="4">
      </div>
      <div class="checkItems check5">
        <label for="option5">Gym</label>
        <input type="checkbox" name="checkitem[]" id="option5" value="5">
      </div>
      <div class="checkItems check6">
        <label for="option6">A/C</label>
        <input type="checkbox" name="checkitem[]" id="option6" value="6">
      </div>
      <div class="checkItems check7">
        <label for="option7">Restaurant</label>
        <input type="checkbox" name="checkitem[]" id="option7" value="7">
      </div>
      <div class="checkItems check8">
        <label for="option8">TV</label>
        <input type="checkbox" name="checkitem[]" id="option8" value="8">
      </div>
      <div class="checkItems check9">
        <label for="option9">Pets</label>
        <input type="checkbox" name="checkitem[]" id="option9" value="9">
      </div>
      <div class="checkItems check10">
        <label for="option10">24-Hour Reception</label>
        <input type="checkbox" name="checkitem[]" id="option10" value="10">
      </div>
    </div>

  
  <input class="create__form__button button" type="submit" name="submitBtn" value="Add Hotel">
  </form>
</div>
<?php
include "../Views/footer-view.php";
?>
</body>
</html>