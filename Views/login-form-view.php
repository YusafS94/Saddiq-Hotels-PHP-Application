<?php
// include "../Models/hotels-model.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login Form : XYZ inc.</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../z-css/style.css">
</head>

<body>
<?php
if(isset($_SESSION["error_msg"])){
  echo "<p>{$_SESSION["error_msg"]}</p>";
}
?>

<div class="container">
    <div class="login__form__section">
        <h2 class="login__heading">Welcome to Saddiq Hotels</h2>
        <h3 class="login__heading">Enter Email and Password to login</h3>
        <div class="login__form">
            <form class="" action="../Controllers/login_process.php" method="post">
                <!-- <label for="username">Email address:</label> -->
                <input class="loginTextInputs" type="email" id="email" name="email" placeholder="Email">
                <br>
                <!-- <label for="password" >Password:</label> -->
                <input class="loginTextInputs" type="password" id="password" name="password" placeholder="Password">
                <input type="submit" name="login" value="Login">
            </form>
        </div>
    </div>
</div>

</body>
</html>