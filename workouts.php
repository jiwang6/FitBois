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
            <h2>Update / Enter a New Workout</h2>
            <form id = "form" action="addworkout.php" method="post" >
                
                <label for="workoutName">Workout Name</label>
                <input id="workoutName" name="workoutName" type="text" required maxlength="50" /><br />

 

                <label for="exerciseName">Exercise Name</label>
                <input id="exerciseName" name="exerciseName" type="text" required maxlength="50" /><br />
                
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
            <?php // start php
                            $sql = "SELECT DISTINCT * FROM workout w NATURAL JOIN exercises_in_workout ew NATURAL JOIN  exercise e where username = '".$_COOKIE["username"]."';"; 

 

                        // create stuff to do stuff
                        $qRes = $conn->query($sql);
                        echo $data['username'] . "<br>";

 

                        if ($conn->query($sql) == TRUE) {
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        
                        echo "<table style='width:100%'>";
                        echo "<tr>
                        						<th>Workout Name</th>
                                    <th>Exercise</th>
                                    <th>Weight (lbs)</th>
                                    <th>Sets</th>
                                    <th>Reps</th>
                                    </tr>
                                    <tr>";
                        
                        while ($data = $qRes->fetch_assoc()) {
                            echo "<tr>
                                <td>". $data['workout_Name'] ."</td>
                                <td>". $data['exerName'] ."</td>
                                <td>". $data['weight'] ."</td>
                                <td>". $data['numSets'] ."</td>
                                <td>". $data['numReps'] ."</td>
                                </tr>";
                        }
                        
                        echo "</table>";
                ?>
        </div>
        
        <script src="script.js"></script>
    </body>
</html>

 

<?php
$conn->close();
?>

