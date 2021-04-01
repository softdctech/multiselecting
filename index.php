<!DOCTYPE html>
<html>
<head>
	<title>dropdown</title>
</head>
<script type="text/javascript" src="jquery.js"></script>
<style type="text/css">
	.Inputbox{
		width: 200px;
		padding: 6px;
	}
</style>
<body>
	<?php
	include("database.php");
	$result = mysqli_query($conn,"SELECT * FROM country");
	?>
<div>
	<h1>DependentDropdown list</h1>
</div>
<div>
	<label>Select Country</label>
	<select name="country" id="country-list" class="Inputbox">
		<option value="" >----Select----</option>
		<?php
			while($row = mysqli_fetch_array($result)){
				?>
					<option value="<?php echo $row['c_id'];?>"><?php echo $row['country_name'];?></option>
				<?php
			}
		?>
	</select>
	<label>Select State</label>
	<select name="state" id="state-list" class="Inputbox">
		<option value="">----Select----</option>
	</select>
	<label>Select City</label>
	<select name="city" id="city-list" class="Inputbox">
		<option value="">----Select----</option>
	</select>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#country-list").on('change',function(){
			var country_id = $("#country-list").val();
			$.ajax({
				url : "dropdown_state.php",
				type : "POST",
				data : {c_id:country_id},
				success : function(data){
					$("#state-list").html(data);
				}
			});
		});
		$("#state-list").on('change',function(){
			var state_id = $("#state-list").val();
			$.ajax({
				url : "dropdown_city.php",
				type : "POST",
				data : {s_id:state_id},
				success : function(data){
					$("#city-list").html(data);
				}
			});
		});
	});
</script>
</html>
