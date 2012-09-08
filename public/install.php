<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
require_once(ROOT.DS.'config'.DS.'config.php');

// connect db
try {
$conn = new PDO(DB_TYPE.":host=localhost;dbname=".DB_NAME,DB_USER,DB_PASSWORD);
} catch (PDOException $e) {
    echo "Oops! " . $e->getMessage();
}

// create demo tables

$createsql = $conn->prepare("CREATE TABLE pages (id int(11) AUTO_INCREMENT, title varchar(255), content text, PRIMARY KEY (id)) ENGINE=InnoDB");
$createsql->execute();

$createsql = $conn->prepare("CREATE TABLE navigation (id int(11) AUTO_INCREMENT, page_id int(11), title varchar(255), url varchar(255), nav_order int, PRIMARY KEY (id), FOREIGN KEY (page_id) REFERENCES pages(id)) ENGINE=InnoDB");
$createsql->execute();

$createsql = $conn->prepare("CREATE TABLE news (id int(11) AUTO_INCREMENT, date_published date, title varchar(255), content text, PRIMARY KEY (id)) ENGINE=InnoDB");
$createsql->execute();

// insert data

$insertsql = $conn->prepare("INSERT INTO pages (title, content) VALUES ('About PHP MVC', 'PHP MVC Boilerplate description to go here.')");
$insertsql->execute();

$insertsql = $conn->prepare("INSERT INTO navigation (title, page_id, url, nav_order) VALUES ('Home', NULL, '/', 0), ('About PHP MVC', '1', '', '1'), ('News', NULL, '/news/list/', '2')");
$insertsql->execute();

$insertsql = $conn->prepare("INSERT INTO news (date_published, title, content) VALUES ('2012-01-01', 'Happy new year!', 'New Year is the time at which a new calendar year begins and the calendar''s year count is incremented. In many cultures, the event is celebrated in some manner. The New Year of the Gregorian calendar, today in worldwide use, falls on 1 January, as was the case with the Roman calendar. There are numerous calendars that remain in regional use that calculate the New Year differently.'), (NOW(), 'An example news item...', 'This is an example of a news item, created for the PHP MVC Boilerplate.')");
$insertsql->execute();

echo 'Database structure created successfully';