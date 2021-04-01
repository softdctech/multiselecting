<?php
include("database.php");
$country_id = $_POST['c_id'];
$result = mysqli_query($conn,"SELECT * FROM state WHERE c_id = '$country_id'");
while($row = mysqli_fetch_array($result)){
	echo "<option value =".$row['s_id']." >".$row['state_name']."</option>";
}
?>
