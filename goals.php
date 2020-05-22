<?php
$servername = "localhost";
$username = "student";
$password = "CompSci364";
$dbname = "FitBois";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
	echo "Connection established<br>";
}

$sql = "SELECT * FROM users NATURAL JOIN current_status;";

if ($conn->query($sql) == TRUE) {
  echo "THE THING WORKED";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "

$conn->close();
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
			<form id = "form" action="demo.php" method="post"
					onsubmit="return checkForm();">
				<label for="Username">Username</label>
				<input id="Username" name="Username" type="text" required maxlength="20" />
			</form>

				
			<h2>Update / Enter a New Goal</h2>
			<form id = "form" action="demo.php" method="post"
					onsubmit="return checkForm();">
					
				<label for="goalDate">Goal Date</label>
				<input id="goalDate" name="goalDate" type="date" required maxlength="50" /><br />
				
				<label for="weight">Goal Weight (lbs)</label>
				<input id="weight" name="weight" type="number" required min="1"/><br />
				
				<label for="bmi">Goal BMI</label>
				<input id="bmi" name="bmi" type="number" required min="1" max="50"/><br />
				
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
				<th>BMI</th>
				<th>Body Fat %</th>
			  </tr>
			  <tr>
				<td>01/01/2019</td>
				<td>205</td>
				<td>29</td>
				<td>29.0</td>
			  </tr>
			  <tr>
				<td>04/01/2019</td>
				<td>190</td>
				<td>27</td>
				<td>25</td>
			  </tr>
			  <tr>
				<td>07/01/2019</td>
				<td>175</td>
				<td>25</td>
				<td>22</td>
			  </tr>
			</table>
		</div>
		
		<div class = "body">
			<h1>Where I'm At Now</h1>

				
			<h2>Update Your Status</h2>
			<form id = "form" action="demo.php" method="post"
					onsubmit="return checkForm();">
					
				<label for="date">Date</label>
				<input id="date" name="date" type="date" required maxlength="50" /><br />
				
				<label for="weight">Weight (lbs)</label>
				<input id="weight" name="weight" type="number" required min="1"/><br />
				
				<label for="bmi">BMI</label>
				<input id="bmi" name="bmi" type="number" required min="1" max="50"/><br />
				
				<label for="bfp">Body Fat Percentage</label>
				<input id="bfp" name="bfp" type="number" required min="1" max="50"/><br/>

				<input type="submit" value="Submit" />
			</form>
			
			<h3>Your Progress So Far:</h3>
				<?php
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

					$sql = "INSERT INTO MyGuests (firstname, lastname, email)
					VALUES ('John', 'Doe', 'john@example.com')";

					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$conn->close();
				?>
		</div>
		
		<script src="script.js"></script>
	</body>
</html>
