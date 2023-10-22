<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $menuName = $_POST["menuName"];
    $menuDesc = $_POST["menuDesc"];

    // Perform database insert operation to store the new menu item

    // Redirect back to the form.html page
    header("Location: form.html");
}
?>
