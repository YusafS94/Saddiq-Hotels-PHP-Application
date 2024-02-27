<?php
$conn = getConnection();

// Checking if button is submitted and hotelName field isnt empty before running through form processing. Sending ID in <a> tag to details.php via GET method
if (isset($_POST['submitbtn']) && !empty($_POST['hotelName'])){
  $searchInput = $_POST['hotelName'];

  $sth = $conn->query("SELECT * FROM hotels WHERE hotels.name LIKE '%$searchInput%'");
  $hotelResults = $sth->fetchAll();
?>
<div class="hotelItem container">
<?php
  if ($hotelResults) {
      foreach ($hotelResults as $hotel) {
        echo "<div class='hotelName'>";
        echo "<li>";
        echo "<a class='hotelName__link' href='details.php?id={$hotel["id"]}'>{$hotel["name"]}</a>";
        echo "</li>";
        echo "</div>";
}
  } else {
    echo "<h3 class=''>No matching hotels</h3>";
  }
}
?>
</div>
<?php
?>