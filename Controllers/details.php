<?php
include "..//Models/hotels-model.php";
checkSession();

// Grabbing the id from the url e.g. details.php?id=4. Using this ID to select the hotel and amenities via inner joins

$hotelId=$_GET['id'];
$hotelIdAmenities = $hotelId;
$conn = getConnection();

// Prepared statement using the id to select a single hotel and getting details for it
$stmt = $conn->prepare("SELECT hotels.name, hotels.stars, hotels.price, hotels.check_in, hotels.check_out, hotels.id AS hotelId, locations.id AS locationId, locations.location, styles.name AS style_name FROM hotels INNER JOIN locations ON locations.id = hotels.location_id INNER JOIN styles ON styles.id = hotels.style_id WHERE hotels.id = :id");
$stmt->bindValue(':id',$hotelId);
$stmt->execute();
$hotel=$stmt->fetch();

// Prepared statement using the GET id to select amenities from amenity_hotel junction table
$amenitiesStmt = $conn->prepare("SELECT amenities.id AS amenitytable_id, amenities.name AS amenities_name FROM amenity_hotel INNER JOIN amenities ON amenities.id = amenity_hotel.amenity_id INNER JOIN hotels ON hotels.id = amenity_hotel.hotel_id WHERE amenity_hotel.hotel_id = :id");
$amenitiesStmt->bindValue(':id',$hotelIdAmenities);
$amenitiesStmt->execute();
$amenitiesList = $amenitiesStmt->fetchAll();
$conn=NULL;

// Using view file to display results
include "../Views/display-details-view.php";
?>
