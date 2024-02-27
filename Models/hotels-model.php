<?php
function checkSession() {
	session_start();
	if(!isset($_SESSION["user"])) {
		//user tried to access the page without logging in
		//redirect them to the login page
		header( "Location: login.php" );
	};
}

// Model
function getConnection()
{
	try{
       $conn = new PDO('mysql:host=localhost;dbname=assignment', 'root', '');
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOException $exception)
	{
		echo "Oh no, there was a problem" . $exception->getMessage();
	}
	return $conn;
}

function closeConnection($conn)
{
	$conn=null;
}

function processForm($hotelName, $stars, $price, $checkIn, $checkOut, $location, $style, $amenities) {
	$hotelName=$_POST['name'];
	$stars=$_POST['stars'];
	$price=$_POST['price'];
	$checkIn=$_POST['checkIn'];
	$checkOut=$_POST['checkOut'];
	// $location=$_POST['location'];
	$location = $_POST['hotelLocation'];
	$style=$_POST['style'];
	$amenities = $_POST['checkitem'];
}

function getAllHotels()
{
	$conn = getConnection();
	$query = "SELECT * FROM hotels";
	$resultset = $conn->query($query);
	$hotels = $resultset->fetchAll();
	closeConnection($conn);
	return $hotels;
}

function getHotelById($hotelId)
{
	$conn = getConnection();
	$stmt = $conn->prepare("SELECT * FROM hotels WHERE hotels.id = :id");
	$stmt->bindValue(':id',$hotelId);
	$stmt->execute();
	$film=$stmt->fetch();
	closeConnection($conn);
	return $film;
}

function saveHotel($name, $stars, $price, $checkIn, $checkOut, $locationId, $styleId){
	$conn = getConnection();
	$query="INSERT INTO films (id, name, stars, price, check_in, check_out, location_id, style_id) VALUES (NULL, :name, :stars, :price, :check_in, :check_out, :location_id, :style_id)";
	$stmt=$conn->prepare($query);
	$stmt->bindValue(':name', $name);
	$stmt->bindValue(':stars', $stars);
	$stmt->bindValue(':price', $price);
	$stmt->bindValue(':check_in', $checkIn);
	$stmt->bindValue(':check_out', $checkOut);
	$stmt->bindValue(':location_id', $locationId);
	$stmt->bindValue(':style_id', $styleId);
	$stmt->execute();
	closeConnection($conn);
}

function updateFilm($id,$title,$year,$duration){
	$conn = getConnection();
	$query="UPDATE films SET title=:title, year=:year, duration=:duration WHERE id=:id";
	$stmt=$conn->prepare($query);
	$stmt->bindValue(':id', $id);
	$stmt->bindValue(':title', $title);
	$stmt->bindValue(':year', $year);
	$stmt->bindValue(':duration', $duration);
	$stmt->execute();
	closeConnection($conn);
}

function updateAmenities($amenities) {
	$hotelId = $conn->lastInsertId();
	foreach($amenities as $amenity){
		$amenitiesQuery = "INSERT INTO amenity_hotel (amenity_id, hotel_id) VALUES (:amenityId, :hotelId)";
		$amenitiesStmt = $conn->prepare($amenitiesQuery);
		$amenitiesStmt->bindValue(':amenityId', $amenity);
		$amenitiesStmt->bindValue('hotelId', $hotelId);
		$amenitiesStmt->execute();
}
	$conn=closeConnection();
}
function selectHotel() {
	$stmt = $conn->prepare("SELECT hotels.name, hotels.stars, hotels.price, hotels.check_in, hotels.check_out, hotels.id AS hotelId, locations.id AS locationId, locations.location, styles.name AS style_name FROM hotels INNER JOIN locations ON locations.id = hotels.location_id INNER JOIN styles ON styles.id = hotels.style_id WHERE hotels.id = :id");
	$stmt->bindValue(':id',$hotelId);
	$stmt->execute();
	$hotel=$stmt->fetch();
	return $hotel;
}


function selectAmenities() {
	$amenitiesStmt = $conn->prepare("SELECT amenities.id AS amenitytable_id, amenities.name AS amenities_name FROM amenity_hotel INNER JOIN amenities ON amenities.id = amenity_hotel.amenity_id INNER JOIN hotels ON hotels.id = amenity_hotel.hotel_id WHERE amenity_hotel.hotel_id = :id");
	$amenitiesStmt->bindValue(':id',$hotelIdAmenities);
	$amenitiesStmt->execute();
	$amenitiesList = $amenitiesStmt->fetchAll();
	return $amenitiesList;
	$conn=closeConnection();
}