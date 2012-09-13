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

$stmt = $conn->prepare("CREATE TABLE pages (id int(11) AUTO_INCREMENT, title varchar(255), content text, PRIMARY KEY (id)) ENGINE=InnoDB");
$stmt->execute();

$stmt = $conn->prepare("CREATE TABLE navigation (id int(11) AUTO_INCREMENT, page_id int(11), title varchar(255), url varchar(255), nav_order int, PRIMARY KEY (id), FOREIGN KEY (page_id) REFERENCES pages(id)) ENGINE=InnoDB");
$stmt->execute();

$stmt = $conn->prepare("CREATE TABLE news (id int(11) AUTO_INCREMENT, date_published date, title varchar(255), content text, PRIMARY KEY (id)) ENGINE=InnoDB");
$stmt->execute();

// insert data

$stmt = $conn->prepare("INSERT INTO pages (title, content) VALUES ('About PHP MVC', '<p>PHP MVC Boilerplate came about more of as a bit of fun than anything else. Once I was done with the core functionality for my own uses I thought I would expand on it a little more and make it available.</p><p>I did this purely because I could not find many lightweight complete boilerplates that worked how I expected. Not to say that they are not great in their own right! They were just not applicable for what I needed.</p><p>Finally, I cannot stress enough that there are many good quality, community-led MVC frameworks out there that do a lot more than this one does. This is purely a boilerplate for structure and nothing more.</p><p>That said... Hopefully it is of some use or help to someone. If not then make a branch! Expand it! Make it better! That is what it is all about!</p>')");
$stmt->execute();

$stmt = $conn->prepare("INSERT INTO navigation (title, page_id, url, nav_order) VALUES ('Home', NULL, '/', 0), ('About PHP MVC', '1', '', '1'), ('News', NULL, '/news/articles/', '2')");
$stmt->execute();

$stmt = $conn->prepare("INSERT INTO news (date_published, title, content) VALUES ('2012-01-01', 'Happy new year!', 'New Year is the time at which a new calendar year begins and the calendar''s year count is incremented. In many cultures, the event is celebrated in some manner. The New Year of the Gregorian calendar, today in worldwide use, falls on 1 January, as was the case with the Roman calendar. There are numerous calendars that remain in regional use that calculate the New Year differently.'), (NOW(), 'An example news item...', 'This is an example of a news item, created for the PHP MVC Boilerplate.')");
$stmt->execute();

echo 'Database structure created successfully';