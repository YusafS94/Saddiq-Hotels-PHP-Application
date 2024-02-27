<?php
// include "../Models/hotels-model.php";
// checkSession();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Display the details for a hotel</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../z-css/style.css">
</head>
<body>
<?php
include "navbar-view.php";
?>
<div class="container">
	<?php
	// validation to check for hotel and output string with hotel details embedded
	if($hotel){
		echo "<h2 class='hotel__details__header'>{$hotel['name']}</h2>";
		echo "<p>Located in {$hotel['location']}, this hotel has a {$hotel['stars']} star rating. The price for one night is £{$hotel['price']}. Check in time is {$hotel['check_in']}, and check out time is {$hotel['check_out']}. The style of this hotel is '{$hotel['style_name']}'. Below are the amenities available at this hotel.</p>";
		// echo "<p>Stars:{$hotel['stars']}</p>";
		// echo "<p>Price:{$hotel['price']}</p>";
		// echo "<p>Check in:{$hotel['check_in']}</p>";
		// echo "<p>Check out:{$hotel['check_out']}</p>";
		// echo "<p>Location:{$hotel['location']}</p>";
		// echo "<p>Style:{$hotel['style_name']}</p>";
	}
	else
	{
		echo "Can't find the hotel";
		echo "<br>";
	}
	// Validation to check if any amenities have been selected
	if($amenitiesList){
		echo "<div class='amenities__section'>";
		echo "<h3>Amenities Available:</h3>";
		foreach($amenitiesList as $amenity){
			echo "<p>{$amenity['amenities_name']}</p>";
		}
		echo "</div>";
	}else {
		echo "No amenities available";
	}
	
	?>
</div>
<?php
include "../Views/footer-view.php";
?>
</body>
</html>