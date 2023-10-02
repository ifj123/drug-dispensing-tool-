<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "media_library"; 

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM media_items"; 
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}


$conn->close();


header("Content-Type: application/json");
echo json_encode($data);
?>
