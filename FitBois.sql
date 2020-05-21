DROP DATABASE IF EXISTS FitBois;

CREATE DATABASE FitBois;
USE FitBois;


CREATE TABLE goals (
	goal_ID INTEGER NOT NULL PRIMARY KEY,
  weight FLOAT NOT NULL,
  bodyFatPct FLOAT NOT NULL
);

CREATE TABLE goals_record (
  targetDate VARCHAR(30) PRIMARY KEY,
  goal_ID INTEGER NOT NULL,

  FOREIGN KEY (goal_ID) REFERENCES goals (goal_ID)
  	ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE exercise (
  exerName VARCHAR(30) PRIMARY KEY,
  numSets INTEGER NOT NULL,
  numReps INTEGER NOT NULL,
  weight FLOAT NOT NULL
);

CREATE TABLE exercises_in_workout (
  workout_ID INTEGER PRIMARY KEY, 
  exerName VARCHAR(30),
  difficulty INTEGER,

  FOREIGN KEY (exerName) REFERENCES exercise (exerName)
    ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE workout (
  workDate VARCHAR(10) NOT NULL PRIMARY KEY,
  workout_ID INTEGER,
  workout_Name VARCHAR(30),
  
  FOREIGN KEY (workout_ID) REFERENCES exercises_in_workout (workout_ID)
  	ON UPDATE CASCADE ON DELETE CASCADE  
);

CREATE TABLE current_status (
  username VARCHAR(20) PRIMARY KEY,
  statDate VARCHAR(10) NOT NULL,
  height FLOAT NOT NULL,
  weight FLOAT NOT NULL,
  bodyFatPct FLOAT NOT NULL,
  
  FOREIGN KEY (statDate) REFERENCES workout (workDate)
  	ON UPDATE CASCADE ON DELETE CASCADE,
  
  FOREIGN KEY (statDate) REFERENCES goals_record (targetDate)
  	ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE users (
  username VARCHAR(20) PRIMARY KEY,

  FOREIGN KEY (username) REFERENCES current_status (username)
    ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO goals (goal_ID, weight, bodyFatPct) VALUES
(1, 175, 10),
(2, 183, 15),
(3, 184, 20),
(4, 155, 25),
(5, 154, 30);

INSERT INTO goals_record (targetDate, Goal_ID) VALUES
('12/03/2001', 1),
('01/23/2004', 2),
('12/24/2005', 3),
('10/08/2012', 4),
('06/13/2000', 5);

INSERT INTO exercise (exerName, numSets, numReps, weight) VALUES
('jump', 5, 3, 0),
('bench', 5, 10, 130),
('squat', 5, 12, 225),
('leg press', 5, 12, 225),
('walk', 5, 3, 0);

INSERT INTO exercises_in_workout (workout_ID, exerName, difficulty) VALUES
(1, 'jump', 3),
(2, 'bench', 5),
(3, 'squat', 4),
(4, 'leg press', 1),
(5, 'walk', 2);

INSERT INTO workout (workDate, workout_ID, workout_Name) VALUES
('12/03/2001', 1, 'Basic HIIT'),
('01/23/2004', 2, 'I am dying'),
('12/24/2005', 3, 'dear lord help'),
('10/08/2012', 4, 'easy legs'),
('06/13/2000', 5, 'literally a walk');

INSERT INTO current_status (username, statDate, height, weight, bodyFatPct) VALUES
('FitBoi1', '12/03/2001', 70, 180, 15),
('FitBoi2', '01/23/2004', 78, 181, 20),
('FitBoi3', '12/24/2005', 80, 184, 25),
('FitBoi4', '10/08/2012', 72, 160, 30),
('FitBoi5', '06/13/2000', 68, 159, 35);

INSERT INTO users (username) VALUES
('FitBoi1'),
('FitBoi2'),
('FitBoi3'),
('FitBoi4'),
('FitBoi5');



