<?php
// Connect to MySQL database (Change these values to match your MySQL setup)
$host = "localhost";
$username = "root";
$password = "";
$dbname = "menu_db";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve menu items
$sql = "SELECT * FROM menu";
$result = mysqli_query($conn, $sql);

// Display the menu by ID and as a list
while ($row = mysqli_fetch_assoc($result)) {
    echo "Menu Item ID: " . $row["id"] . "<br>";
    echo "Name: " . $row["name"] . "<br>";
    echo "Description: " . $row["description"] . "<br><br>";
}

// Close the connection
mysqli_close($conn);
?>
