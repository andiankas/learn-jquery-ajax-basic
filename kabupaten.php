<?php 
	include "connection.php";

	$provinsi_id = $_GET['provinsi_id'];
	echo "<select id='kabupaten'>";
	$query = "SELECT * FROM kabupaten WHERE id_provinsi = $provinsi_id";
	$kabupaten = $query;
	$result = mysqli_query($conn, $kabupaten);

	if (mysqli_num_rows($result) > 0) {
		echo "<option disabled selected>-Kabupaten-</option>";
	    while($row = mysqli_fetch_array($result)) {
	        echo "<option value='$row[id_kab]'>$row[nama_kab]</option>";
	    }
	}
	echo "</select>";

 ?>