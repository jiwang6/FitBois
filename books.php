<?php

function addBook($book) {
  global $db;

  $query = "INSERT INTO book (isbn, title, copyright, publisher) ".
           "VALUES (?, ?, ?, ?);";

  $statement = $db->prepare($query);
  $statement->bind_param('ssss', $book['isbn'], $book['title'],
                         $book['copyright'], $book['publisher']);
  $statement->execute();
}

function getBook($isbn) {
  global $db;

  $query = "SELECT * FROM book WHERE isbn = ?;";

  $statement = $db->prepare($query);
  $statement->bind_param('s', $isbn);
  $statement->execute();

  $data = array();

  $results = $statement->get_result();
  $row = $results->fetch_assoc();

  return $row;
}

function getBooks() {
  global $db;

  $query = "SELECT * FROM book ORDER BY title ASC, copyright ASC;";

  $statement = $db->prepare($query);
  if (! empty($params)) {
    $statement->bind_param(str_repeat('s', count($params)), ...$params);
  }
  $statement->execute();

  $data = array();

  $results = $statement->get_result();
  while ($row = $results->fetch_assoc()) {
    $data[$row['isbn']] = $_SERVER['REQUEST_URI'].'/'.$row['isbn'];
  }

  return $data;
}

function removeBook($isbn) {
  global $db;

  $query = "DELETE FROM book WHERE isbn = ?;";

  $statement = $db->prepare($query);
  $statement->bind_param('s', $isbn);
  $statement->execute();
}


//open database connection
$db = new mysqli("localhost", "student", "CompSci364", "library");

header('Content-Type: application/json');
switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
    if (isset($_REQUEST['isbn']) && 0 < strlen($_REQUEST['isbn'])) {
      $data = getBook($_REQUEST['isbn']);
      if (! isset($data)) {
        http_response_code(404);
        die();
      }
    } else {
      $data = getBooks();
    }

    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    break;

  case 'POST':
    $book = json_decode(file_get_contents('php://input'), true);

    // insert the book
    addBook($book);

    http_response_code(201);

    // retrieve the book's record
    $book = getBook($book['isbn']);
    echo json_encode($book, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    break;

  case 'PATCH':
    // TODO
    break;

  case 'PUT':
    // TODO
    break;

  case 'DELETE':
    if (isset($_REQUEST['isbn']) && 0 < strlen($_REQUEST['isbn'])) {
      $data = removeBook($_REQUEST['isbn']);
    }

    http_response_code(204);
    die();

    break;
}
