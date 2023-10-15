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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $_POST["itemName"];
    $itemDescription = $_POST["itemDescription"];

    $sql = "INSERT INTO menu (name, description) VALUES ('$itemName', '$itemDescription')";

    if (mysqli_query($conn, $sql)) {
        echo "Menu item added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
