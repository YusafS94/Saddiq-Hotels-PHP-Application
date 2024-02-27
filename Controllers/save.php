<?php
// session_start();
include "../Models/hotels-model.php";
checkSession();
$conn = getConnection();

//form processing. using error messages to validate form inputs and cancel if so.
$errorMessage1 = "";
$errorMessage2 = "";
$errorMessage3 = "";
$errorMessage4 = "";
$errorMessage5 = "";
$errorMessage6 = "";
$errorMessage7 = "";
$errorMessage8 = "";

if (isset($_POST['name'])) {
  $hotelName=trim($_POST['name']);
} else {
  $errorMessage1 = "error";
  $conn=NULL;
}

if (isset($_POST['stars'])) {
  $stars=$_POST['stars'];
} else {
  $errorMessage2 = "error";
}

if (isset($_POST['price'])) {
  $price=trim($_POST['price']);
} else {
  $errorMessage3 = "error";
}

if (isset($_POST['checkIn'])) {
  $checkIn=$_POST['checkIn'];
} else {
  $errorMessage4 = "error";
}

if (isset($_POST['checkOut'])) {
  $checkOut=$_POST['checkOut'];
} else {
  $errorMessage5 = "error";
}

if (isset($_POST['hotelLocation'])) {
  $location = $_POST['hotelLocation'];
} else {
  $errorMessage6 = "error";
}

if (isset($_POST['style'])) {
  $style=$_POST['style'];
} else {
  $errorMessage7 = "error";
}

if (isset($_POST['checkitem'])) {
  $amenities = $_POST['checkitem'];
} else {
  $errorMessage8 = "error";
}




if (!empty($errorMessage1) || !empty($errorMessage2) || !empty($errorMessage3) || !empty($errorMessage4) || !empty($errorMessage5) || !empty($errorMessage6) || !empty($errorMessage7) || !empty($errorMessage8)) {
  $errorMessage = "error";
} else {
  //SQL INSERT for adding a new row
//Use a prepared statement to bind the values from the form
$query="INSERT INTO hotels (id, name, stars, price, check_in, check_out, location_id, style_id) VALUES (NULL, :name, :stars, :price, :check_in, :check_out, :location_id, :style_id)";
$stmt=$conn->prepare($query);
$stmt->bindValue(':name', $hotelName);
$stmt->bindValue(':stars', $stars);
$stmt->bindValue(':price', $price);
$stmt->bindValue(':check_in', $checkIn);
$stmt->bindValue(':check_out', $checkOut);
$stmt->bindValue(':location_id', $location);
$stmt->bindValue(':style_id', $style);
$stmt->execute();

$hotelId = $conn->lastInsertId();
foreach($amenities as $amenity){
    $amenitiesQuery = "INSERT INTO amenity_hotel (amenity_id, hotel_id) VALUES (:amenityId, :hotelId)";
    $amenitiesStmt = $conn->prepare($amenitiesQuery);
    $amenitiesStmt->bindValue(':amenityId', $amenity);
    $amenitiesStmt->bindValue('hotelId', $hotelId);
    $amenitiesStmt->execute();
}
$conn=NULL;
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Save hotel</title>
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
if (!empty($errorMessage1) || !empty($errorMessage2) || !empty($errorMessage3) || !empty($errorMessage4) || !empty($errorMessage5) || !empty($errorMessage6) || !empty($errorMessage7) || !empty($errorMessage8)) {
  echo "<div class='container errorMessage'>";
  echo "<p class='errorMessage'>Listing not added. Please fill all fields.</p>";
  echo "</div>";
} else {
  echo "<div class='container successMessage'>";
  echo "<p class='successMessage'>Added the details for {$hotelName}.</p>";
  echo "</div>";
}
?>
<fieldset>
    <ul>
    <li><a href="../Controllers/create.php">Back to Form</a></li>
    </ul>
</fieldset>
</body>
</html>
