<?php
// Establish a database connection
$mysqli = new mysqli("localhost", "root", "", "pointofsale");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch menu items from the database
$sql = "SELECT * FROM menu_items";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["menu_name"] . "</td>";
        echo "<td>" . $row["menu_desc"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>";
        echo "<button class='btn btn-info edit-button' data-toggle='modal' data-target='#editModal' data-id='" . $row["id"] . "'>Update</button>";
        echo "<button class='btn btn-danger delete-button' data-toggle='modal' data-target='#deleteModal' data-id='" . $row["id"] . "'>Delete</button>";
        echo "</td>";
        echo "</tr>";
    }
}

// Close the database connection
$mysqli->close();
?>
