<?php
include("database.php");
$state_id = $_POST['s_id'];
$result = mysqli_query($conn,"SELECT * FROM city WHERE s_id = '$state_id'");
while($row = mysqli_fetch_array($result)){
	echo "<option>".$row['city_name']."</option>";
}
?>
