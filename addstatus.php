<html>


 <head>
 <link rel="stylesheet" href="styles.css">
   <title>Status Updated!</title>
 </head>

 <body>
   <center>
     <h1>Status Updated!</h1>
     <br />
     <br />

<!-- Give a link back to the main page -->

     <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">Click Here</a> to return to the FitBois site.

   </center>
 </body>
</html>

<?php // start php
	$servername = "localhost";
	$username = "student";
	$password = "CompSci364";
	$dbname = "FitBois";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "INSERT INTO current_status (username, statDate, height, weight, bodyFatPct) VALUES 
			('".$_COOKIE["username"]."', '". $_POST['date'] ."',".$_POST['height'] .",". $_POST['weight'] .",".$_POST['bfp'].");";

	if ($conn->query($sql) == TRUE) {
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>				
