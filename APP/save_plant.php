<?php
session_start();
include("connect.php");

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    die("User not logged in.");
}

// Validate required fields
$errors = [];
if (empty($_POST['plant'])) {
    $errors[] = "Plant type is required.";
}
if (empty($_POST['planting_date'])) {
    $errors[] = "Planting date is required.";
}
if (empty($_POST['lat']) || empty($_POST['lng'])) {
    $errors[] = "Location is required.";
}

if (!empty($errors)) {
    die(implode("<br>", $errors));
}

// Get form data
$user_id = $_SESSION['user_id'];
$plant = $_POST['plant'];
$planting_date = $_POST['planting_date'];
$harvest_date = !empty($_POST['harvest_date']) ? $_POST['harvest_date'] : null;
$lat = (float)$_POST['lat'];
$lng = (float)$_POST['lng'];
$notes = $_POST['notes'] ?? '';

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO plantations 
    (user_id, plant_type, planting_date, harvest_date, latitude, longitude, notes)
    VALUES (?, ?, ?, ?, ?, ?, ?)");

// Bind parameters and execute
$stmt->bind_param("isssdds", 
    $user_id, 
    $plant, 
    $planting_date, 
    $harvest_date, 
    $lat, 
    $lng, 
    $notes
);

if ($stmt->execute()) {
    header("Location: index4.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>