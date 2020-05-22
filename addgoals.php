<html>


 <head>
 <link rel="stylesheet" href="styles.css">
   <title>Goal Added !</title>
 </head>

 <body>
   <center>
     <h1>Goal Added!</h1>
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
	
	$sql = "INSERT INTO goals (weight, bodyFatPct) VALUES 
			($_POST['weight'], $_POST['bfp']);
							
			INSERT INTO goals_record (username, targetDate) VALUES
				(".$_COOKIE["username"].", $_POST['goaldate']);";

	if ($conn->query($sql) == TRUE) {
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>				
