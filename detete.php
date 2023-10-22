<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Delete the item with the given ID from the database
    // Redirect back to the form.html page
    header("Location: form.html");
}
?>
