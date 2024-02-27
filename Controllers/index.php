<?php
/*
=======================================
Including model in the main index file.
Using checkSession function from the model
to check login and set header to login
page if session is not declared.
=======================================
*/
include "../Models/hotels-model.php";

checkSession();

/*
=======================================
Testing it works by getting all hotels.
=======================================
*/

// $hotels = getAllHotels();
// foreach($hotels as $hotel){
//     echo "{$hotel['name']}";
//     echo "<br>";
// }


/*
====================================================================================================
Including search form view for searching for the hotels with a PHP SELF action to send to same page.
====================================================================================================
*/

include "../Views/navbar-view.php";
include "../Views/header-view.php";
include "../Views/search-form-view.php";
include "../Controllers/search-form-process.php";
include "../Views/footer-view.php";

/*
===========================================================================================
Including form process controller php file which will display results from the search form.
===========================================================================================
*/

?>

<?php
?>