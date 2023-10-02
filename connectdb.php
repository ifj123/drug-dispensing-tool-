<?php
$servername = "localhost:8080"; 
$username = "root"; 
$password = ""; 
$database = "media_library"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


echo "Connected to the database successfully";
foreach ($catalog as $id => $item) {
    if ($item['category'] === 'Books') {
        $sql = "INSERT INTO books (title, img, genre, format, year, authors, publisher, isbn)
                VALUES (
                    '{$item['title']}',
                    '{$item['img']}',
                    '{$item['genre']}',
                    '{$item['format']}',
                    '{$item['year']}',
                    '" . implode(', ', $item['authors']) . "',
                    '{$item['publisher']}',
                    '{$item['isbn']}'
                )";
    } elseif ($item['category'] === 'Movies') {
        $sql = "INSERT INTO movies (title, img, genre, format, year, director, writers, stars)
                VALUES (
                    '{$item['title']}',
                    '{$item['img']}',
                    '{$item['genre']}',
                    '{$item['format']}',
                    '{$item['year']}',
                    '{$item['director']}',
                    '" . implode(', ', $item['writers']) . "',
                    '" . implode(', ', $item['stars']) . "'
                )";
    } elseif ($item['category'] === 'Music') {
        $sql = "INSERT INTO music (title, img, genre, format, year, artist)
                VALUES (
                    '{$item['title']}',
                    '{$item['img']}',
                    '{$item['genre']}',
                    '{$item['format']}',
                    '{$item['year']}',
                    '{$item['artist']}'
                )";
    }

   
    if ($conn->query($sql) === TRUE) {
        echo "Record for '{$item['title']}' inserted successfully.<br>";
    } else {
        echo "Error inserting record for '{$item['title']}': " . $conn->error . "<br>";
    }
}


$conn->close();
?>

