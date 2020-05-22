<?php

function getBook($username) {
  global $db;

  $query = "SELECT * FROM current_status WHERE username = ?;";

  $statement = $db->prepare($query);
  $statement->bind_param('s', $username);
  $statement->execute();

  $data = array();

  $results = $statement->get_result();
  $row = $results->fetch_assoc();

  return $row;
}

function getUsers() {
  global $db;

  $query = "SELECT * FROM users ORDER BY username ASC;";

  $statement = $db->prepare($query);
  if (! empty($params)) {
    $statement->bind_param(str_repeat('s', count($params)), ...$params);
  }
  $statement->execute();

  $data = array();

  $results = $statement->get_result();
  while ($row = $results->fetch_assoc()) {
    $data[$row['username']] = $_SERVER['REQUEST_URI'].'/'.$row['username'];
  }

  return $data;
}

//open database connection
$db = new mysqli("localhost", "student", "CompSci364", "FitBois"); // FitBois is database name

header('Content-Type: application/json');
switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
    if (isset($_REQUEST['username']) && 0 < strlen($_REQUEST['username'])) {
      $data = getBook($_REQUEST['username']);
      if (! isset($data)) {
        http_response_code(404);
        die();
      }
    } else {
      $data = getUsers();
    }

    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    break;

  case 'POST':
    $book = json_decode(file_get_contents('php://input'), true);

    // insert the book
    addBook($username);

    http_response_code(201);

    // retrieve the book's record
    $book = getBook($book['username']);
    echo json_encode($book, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    break;

  case 'PATCH':
    // TODO
    break;

  case 'PUT':
    // TODO
    break;

  case 'DELETE':
    if (isset($_REQUEST['username']) && 0 < strlen($_REQUEST['username'])) {
      $data = removeBook($_REQUEST['username']);
    }

    http_response_code(204);
    die();

    break;
}
