DROP DATABASE IF EXISTS library;

CREATE DATABASE library;
USE library;


CREATE TABLE author (
  id INTEGER AUTO_INCREMENT,
  given_name CHARACTER VARYING(32) NOT NULL,
  surname CHARACTER VARYING(32) NOT NULL,

  PRIMARY KEY (id)
);

CREATE TABLE publisher (
  name CHARACTER VARYING(64),
  location CHARACTER VARYING(64) NOT NULL,

  PRIMARY KEY (name)
);

CREATE TABLE book (
  isbn CHARACTER(13),
  title CHARACTER VARYING(128) NOT NULL,
  copyright INTEGER NOT NULL,
  publisher CHARACTER VARYING(64) NOT NULL,

  PRIMARY KEY (isbn),
  FOREIGN KEY (publisher) REFERENCES publisher (name)
      ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE writes (
  author_id INTEGER NOT NULL,
  isbn CHARACTER(13) NOT NULL,

  PRIMARY KEY (author_id, isbn),
  FOREIGN KEY (author_id) REFERENCES author (id)
      ON UPDATE CASCADE ON DELETE RESTRICT,
  FOREIGN KEY (isbn) REFERENCES book (isbn)
      ON UPDATE CASCADE ON DELETE RESTRICT
);


INSERT INTO author (given_name, surname) VALUES
('Mark', 'Gillenson'),
('Jeffrey', 'Ullman'),
('Jennifer', 'Widom'),
('Hector', 'Garcia-Molina'),
('Abraham', 'Silberschatz'),
('Henry', 'Korth'),
('S.', 'Sudarshan'),
('Carlos', 'Coronel'),
('Steven', 'Morris');

INSERT INTO publisher (name, location) VALUES
('John Wiley & Sons, Inc.', 'Hoboken, NJ'),
('Pearson Education, Inc.', 'London, UK'),
('McGraw-Hill', 'New York, NY'),
('Cengage Learning', 'Boston, MA');

INSERT INTO book (isbn, title, copyright, publisher) VALUES
('9780471262978', 'Fundamentals of Database Management Systems', 2005, 'John Wiley & Sons, Inc.'),
('9780136006374', 'A First Course in Database Systems', 2008, 'Pearson Education, Inc.'),
('9780131873254', 'Database Systems: The Complete Book', 2009, 'Pearson Education, Inc.'),
('9780073523323', 'Database System Concepts', 2011, 'McGraw-Hill'),
('9781305627482', 'Database Systems: Design, Implementation, and Management', 2017, 'Cengage Learning'),
('9780470624708', 'Fundamentals of Database Management Systems', 2012, 'John Wiley & Sons, Inc.');

INSERT INTO writes (author_id, isbn) VALUES
((SELECT id FROM author WHERE given_name = 'Mark' AND surname = 'Gillenson'), '9780471262978'),
((SELECT id FROM author WHERE given_name = 'Jeffrey' AND surname = 'Ullman'), '9780136006374'),
((SELECT id FROM author WHERE given_name = 'Jennifer' AND surname = 'Widom'), '9780136006374'),
((SELECT id FROM author WHERE given_name = 'Hector' AND surname = 'Garcia-Molina'), '9780131873254'),
((SELECT id FROM author WHERE given_name = 'Jeffrey' AND surname = 'Ullman'), '9780131873254'),
((SELECT id FROM author WHERE given_name = 'Jennifer' AND surname = 'Widom'), '9780131873254'),
((SELECT id FROM author WHERE given_name = 'Abraham' AND surname = 'Silberschatz'), '9780073523323'),
((SELECT id FROM author WHERE given_name = 'Henry' AND surname = 'Korth'), '9780073523323'),
((SELECT id FROM author WHERE given_name = 'S.' AND surname = 'Sudarshan'), '9780073523323'),
((SELECT id FROM author WHERE given_name = 'Carlos' AND surname = 'Coronel'), '9781305627482'),
((SELECT id FROM author WHERE given_name = 'Steven' AND surname = 'Morris'), '9781305627482'),
((SELECT id FROM author WHERE given_name = 'Mark' AND surname = 'Gillenson'), '9780470624708');
