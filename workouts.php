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
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="styles.css">
		<title>FB | Workouts</title>
	</head>

	<body>
		<div class = "header">
			<h1>FitBois</h1>
			<!--<img src="logo.jpg" alt="CSL-Logo">-->
		</div>

		<div class = "navbar">
			<a href="./index.php">FB Intro</a>
			<a href="./goals.php">Goals</a>
			<a class="active" href="./workouts.php">Workouts</a>
		</div>

		<div class = "body">
			<h1>Workouts</h1>
			<form id = "form" action="login.php" method="post"  >
				<label for="Username">Username</label>
				<input id="Username" name="Username" type="text" required maxlength="20" />
				

				<input type="submit" value="Login" />

				
			<h2>Update / Enter a New Workout</h2>
			<form id = "form" action="demo.php" method="post"
					onsubmit="return checkForm();">
				
				<label for="workoutName">Workout Name</label>
				<input id="workoutName" name="workoutName" type="text" required maxlength="50" /><br />

				<label for="exerciseName">Exercise Name</label>
				<input id="exerciseName" name="exerciseName" type="text" required maxlength="50" /><br />
				
				<label for="delEx">Delete Exercise from Workout</label>
				<input id="delEx" name="delEx" type="checkbox" value = "delete" /><br/> <br/>
				
				<label for="weight">Weight (lbs)</label>
				<input id="weight" name="weight" type="number" required min="1"/><br />
				
				<label for="sets">Sets</label>
				<input id="sets" name="sets" type="number" required min="1" max="50"/><br />
				
				<label for="reps">Reps per Set</label>
				<input id="reps" name="reps" type="number" required min="1" max="50"/><br/>

				<input type="submit" value="Submit" />
			</form>
		</div>
		
		
		<div>
		<h3>Monday Legs</h3>
			<table style="width:100%">
			  <tr>
				<th>Exersise</th>
				<th>Weight (lbs)</th>
				<th>Sets</th>
				<th>Reps</th>
			  </tr>
			  <tr>
				<td>Back Squat</td>
				<td>280</td>
				<td>5</td>
				<td>10</td>
			  </tr>
			  <tr>
				<td>Leg Press</td>
				<td>500</td>
				<td>5</td>
				<td>12</td>
			  </tr>
			  <tr>
				<td>Seated Extension</td>
				<td>150</td>
				<td>4</td>
				<td>10</td>
			  </tr>
			  	<tr>
				<td>Standing Curl</td>
				<td>100</td>
				<td>5</td>
				<td>10</td>
			  </tr>
			  <tr>
				<td>Calf Press</td>
				<td>420</td>
				<td>5</td>
				<td>12</td>
			  </tr>
			</table>
		</div>
		
		<script src="script.js"></script>
	</body>
</html>

<?php
$conn->close();
?>

