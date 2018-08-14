<?php 

	// connection
	include "connection.php";
 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- title -->
		<title>Belajar Jquery Ajax</title>
		<!-- style css-->
		<style type="text/css">
			#content{
				text-align: center;
				margin: auto;
			}
			.kotak{
				width: 100px;
				height: 100px;
				border: 1px;
				background: lightblue;

			}
		</style>
		<!-- jquery -->
		<script src="jquery-3.3.1.min.js"></script>
		<script type="text/javascript">
			function listKabupaten()
			{
				var provinsi_id = $("#provinsi").val();
				
				$.ajax({
					type: "GET",
					url: "kabupaten.php",
					data: "provinsi_id="+provinsi_id,
					success: function(html){
						$("#kabupaten").html(html);
					}
				});
			}
		</script>
		
	</head>
	<body id="content">
		
		<h1>06. Combobox Provinsi - PART I</h1><br><br>
		
		<select id="provinsi" onchange="listKabupaten()">
			<option value="" disabled selected>-Provinsi-</option>
			<?php 
	  
				$query = "SELECT * FROM provinsi";
				$provinsi = $query;
				$result = mysqli_query($conn, $provinsi);

				if (mysqli_num_rows($result) > 0) {
	            while($row = mysqli_fetch_array($result)) {
	                echo "<option value='$row[id_provinsi]'>$row[nama_provinsi]</option>";
	            }
         }
			 ?>
		</select>
		
		<select id="kabupaten">
			<option disabled selected>-Kabupaten-</option>
		</select>

	</body>
</html>