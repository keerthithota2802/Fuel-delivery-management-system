<?php 
include_once 'config.php';

if (isset($_POST['city_id'])) {
	$query = "SELECT * FROM tblfuelstation where Cityid=".$_POST['city_id'];
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select fuel station</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['ID'].'>'.$row['Nameoffuelstation'].'</option>';
		 }
	}else{

		echo '<option>No Fuel station Found!</option>';
	}

}elseif (isset($_POST['state_id'])) {
	 

	$query = "SELECT * FROM tblcity where Stateid=".$_POST['state_id'];
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select City</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['ID'].'>'.$row['City'].'</option>';
		 }
	}else{

		echo '<option>No City Found!</option>';
	}

}
elseif (isset($_POST['tp_id'])) {
	$query = "SELECT * FROM tblfuelprice where ID=".$_POST['tp_id'];
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['TodayFuelprice'].'>'.$row['TodayFuelprice'].'</option>';
		 }
	}else{

		echo '<option>Not Found!</option>';
	}

}

?>