<?php
// checkSession();
?>
<div class="footer container">
    <ul class="footer__list">
    <?php
    if ($_SESSION["role"] == 2){
      echo "<li><a class='footer__button button' href='../Controllers/create.php'>Create new hotel listing</a></li>";
    }
    ?>
    <li><a href="logout.php">
    <button class='footer__button button'>Log out</button>
    </a></li>
    </ul>
  </div>