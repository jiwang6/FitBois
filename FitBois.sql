DROP DATABASE IF EXISTS FitBois;

CREATE DATABASE FitBois;
USE FitBois;


CREATE TABLE goals (
	goal_ID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
	weight FLOAT NOT NULL,
  bodyFatPct FLOAT NOT NULL
);

CREATE TABLE goals_record (
  username VARCHAR(20),
  targetDate VARCHAR(30),
  goal_ID INTEGER AUTO_INCREMENT NOT NULL,

  FOREIGN KEY (goal_ID) REFERENCES goals (goal_ID)
		ON DELETE CASCADE
);

CREATE TABLE exercise (
  exerName VARCHAR(30) PRIMARY KEY,
  numSets INTEGER NOT NULL,
  numReps INTEGER NOT NULL,
  weight FLOAT NOT NULL
);

CREATE TABLE exercises_in_workout (
  workout_ID INTEGER, 
  exerName VARCHAR(30),

  FOREIGN KEY (exerName) REFERENCES exercise (exerName)
    ON UPDATE CASCADE ON DELETE CASCADE
);	

CREATE TABLE workout (
	username VARCHAR(20) NOT NULL ,
  workDate VARCHAR(10) NOT NULL,
  workout_ID INTEGER AUTO_INCREMENT PRIMARY KEY,
  workout_Name VARCHAR(30)
);

CREATE TABLE current_status (
  username VARCHAR(20),
  statDate VARCHAR(10) NOT NULL,
  height FLOAT NOT NULL,
  weight FLOAT NOT NULL,
  bodyFatPct FLOAT NOT NULL
  
--  FOREIGN KEY (username) REFERENCES goals_record (username)
--  	ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE users (
  username VARCHAR(20) PRIMARY KEY

--  FOREIGN KEY (username) REFERENCES current_status (username)
--    ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO goals (weight, bodyFatPct) VALUES
(175, 10),
(175, 10),
(175, 10),
(183, 15),
(184, 20),
(155, 25),
(154, 30),
(154, 30);

INSERT INTO goals_record (username, targetDate) VALUES
('FitBoi1', '2001-12-23'),
('FitBoi2', '2004-02-23'),
('FitBoi2', '2004-02-23'),
('FitBoi2', '2004-02-03'),
('FitBoi3', '2005-12-28'),
('FitBoi4', '2012-11-08'),
('FitBoi5', '2000-07-13'),
('FitBoi1', '2000-07-13');

INSERT INTO exercise (exerName, numSets, numReps, weight) VALUES
('jump', 5, 3, 0),
('bench', 5, 10, 130),
('squat', 5, 12, 225),
('leg press', 5, 12, 225),
('walk', 5, 3, 0);

INSERT INTO exercises_in_workout (workout_ID, exerName) VALUES
(1, 'jump'),
(2, 'bench'),
(3, 'squat'),
(4, 'leg press'),
(1, 'walk'),
(1, 'squat'),
(5, 'walk');

INSERT INTO workout (username, workDate, workout_ID, workout_Name) VALUES
('FitBoi1', '2001-12-03', 1, 'Basic HIIT'),
('FitBoi2', '2004-01-23', 2, 'I am dying'),
('FitBoi3', '2005-12-24', 3, 'dear lord help'),
('FitBoi4', '2012-10-08', 4, 'easy legs'),
('FitBoi5', '2000-06-13', 5, 'literally a walk');

INSERT INTO current_status (username, statDate, height, weight, bodyFatPct) VALUES
('FitBoi1', '2001-12-03', 70, 180, 15),
('FitBoi2', '2002-01-23', 70, 180, 20),
('FitBoi2', '2003-01-23', 71, 170, 20),
('FitBoi2', '2004-01-23', 78, 183, 20),
('FitBoi3', '2005-12-24', 80, 184, 25),
('FitBoi4', '2012-10-08', 72, 160, 30),
('FitBoi5', '2000-06-13', 68, 159, 35),
('FitBoi1', '2000-06-13', 68, 159, 35);

INSERT INTO users (username) VALUES
('FitBoi1'),
('FitBoi2'),
('FitBoi3'),
('FitBoi4'),
('FitBoi5');
