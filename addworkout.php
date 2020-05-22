<html>


 <head>
 <link rel="stylesheet" href="styles.css">
   <title>Workout Added!</title>
 </head>

 <body>
   <center>
     <h1>Workout Added!</h1>
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
	
	$sql = "INSERT INTO workout (username, workout_Name) VALUES 
			('".$_COOKIE["username"]."', '".$_POST['workoutName']."');";

	if ($conn->query($sql) == TRUE) {
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$sql = "INSERT INTO exercises_in_workout (exerName) VALUES 
			( '".$_POST['exerciseName']."');";

	if ($conn->query($sql) == TRUE) {
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$sql = "INSERT INTO exercise (exerName, numSets, numReps, weight) VALUES 
			('".$_POST['exerciseName']."',". $_POST['sets'] . "," . $_POST['reps'] . "," . $_POST['weight'] .");";

	if ($conn->query($sql) == TRUE) {
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>				
