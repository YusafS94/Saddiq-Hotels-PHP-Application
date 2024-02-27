<?php
session_start();
if(!isset($_SESSION["user"]))
{
	//user tried to access the page without logging in
  //redirect them to the login page
	header( "Location: login.php" );
};
include "../Models/hotels-model.php";
$conn = getConnection();

// Grabbing locations to use in dropdown menu
$query = "SELECT * FROM locations";
$resultset = $conn->query($query);
$locations = $resultset->fetchAll();
$conn = NULL;

// Displaying form in view file
include "../Views/create-form-view.php";
?>
