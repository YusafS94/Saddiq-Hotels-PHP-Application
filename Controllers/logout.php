<?php
include "../Models/hotels-model.php";
checkSession();
?>
<!DOCTYPE html>
<html>
<head>
<title>Log out</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../z-css/style.css">
</head>
<body>
<?php
include "../Views/navbar-view.php";
session_destroy();
echo "<div class='container errorMessage'>";
echo "<p class='errorMessage'>You have been logged out.</p>";
echo "<a href='../Controllers/login.php' class='successMessage'>Click here to log back in</a>";
echo "</div>";
// header("Location: login.php");
// echo "<p>You've been logged out</p>";
// echo "<p><a href='login.php'>Login again</a></p>";

include "../Views/footer-view.php";
?>
</body>
</html>
