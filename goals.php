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
		<title>FB | Goals</title>
	</head>

	<body>
		<div class = "header">
			<h1>FitBois</h1>
			<!--<img src="logo.jpg" alt="CSL-Logo">-->
		</div>

		<div class = "navbar">
			<a href="./index.php">FB Intro</a>
			<a class="active"  href="./goals.php">Goals</a>
			<a href="./workouts.php">Workouts</a>
		</div>

		<div class = "body">
			<h1>Goals</h1>
			
			<h2>Update / Enter a New Goal</h2>
			<form id = "form" action="addgoals.php" method="post" >
					
				<label for="goalDate">Goal Date</label>
				<input id="goalDate" name="goalDate" type="date" required maxlength="50" /><br />
				
				<label for="weight">Goal Weight (lbs)</label>
				<input id="weight" name="weight" type="number" required min="1"/><br />
				
				<label for="bfp">Goal Body Fat Percentage</label>
				<input id="bfp" name="bfp" type="number" required min="1" max="50"/><br/>

				<input type="submit" value="Submit" />
			</form>
		</div>
		
		
		<div class = "body">
		<h3>Goals You've Set!</h3>

			<table style="width:100%">
			  <tr>
				<th>Date</th>
				<th>Weight (lbs)</th>
				<th>Body Fat %</th>
			  </tr>
				<?php 
					$sql = "SELECT DISTINCT targetDate, goals.weight, goals.bodyFatPct FROM users
										NATURAL JOIN  current_status
											NATURAL JOIN goals_record
											JOIN goals ON goals_record.goal_ID = goals.goal_ID

										WHERE username = '". $_COOKIE["username"] ."'ORDER BY targetDate DESC;";

					// create stuff to do stuff
					$qRes = $conn->query($sql);
					echo $data['username'] . "<br>";

					if ($conn->query($sql) == TRUE) {
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
					
					while ($data = $qRes->fetch_assoc()) {
						echo "<tr>
							<td>". $data['targetDate'] ."</td>
							<td>". $data['weight'] ."</td>
							<td>". $data['bodyFatPct'] ."</td>
							</tr>";
					}
				?>

			</table>
		</div>
		
		<div class = "body">
			<h1>Where I'm At Now</h1>

				
			<h2>Update Your Status</h2>
			<form id = "form" action="addstatus.php" method="post" >
					
				<label for="date">Date</label>
				<input id="date" name="date" type="date" required maxlength="50" /><br />
				
				<label for="weight">Weight (lbs)</label>
				<input id="weight" name="weight" type="number" required min="1"/><br />
				
				<label for="height">Height</label>
				<input id="height" name="height" type="number" required min="1" max="300"/><br />
				
				<label for="bfp">Body Fat Percentage</label>
				<input id="bfp" name="bfp" type="number" required min="1" max="50"/><br/>

				<input type="submit" value="Submit" />
			</form>
			
			<h3>Your Progress So Far:</h3>
				
			<table style="width:100%">
			  <tr>
				<th>Date</th>
				<th>Weight (lbs)</th>
				<th>Height</th>
				<th>Body Fat %</th>
			  </tr>
				<?php // start php
						$sql = "SELECT * FROM users NATURAL JOIN current_status 
						WHERE username = '". $_COOKIE["username"] ."' ORDER BY statDate DESC;";

					// create stuff to do stuff
					$qRes = $conn->query($sql);
					echo $data['username'] . "<br>";

					if ($conn->query($sql) == TRUE) {
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
					
					while ($data = $qRes->fetch_assoc()) {
						echo "<tr>
							<td>". $data['statDate'] ."</td>
							<td>". $data['weight'] ."</td>
							<td>". $data['height'] ."</td>
							<td>". $data['bodyFatPct'] ."</td>
							</tr>";
					}
				?>

			</table>
				
		</div>
		
		<script src="script.js"></script>
	</body>
</html>
<?php
$conn->close();
?>
