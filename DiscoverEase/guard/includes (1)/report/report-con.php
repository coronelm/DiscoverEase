<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sm3101";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Modify the SQL query to retrieve the required fields
$sql = "SELECT ItemID, ReportName, ReportDescription, DateTime, Location, ContactInfo FROM tbreports";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST["item_name"];
    $item_description = $_POST["item_description"];
    $date_time = $_POST["date_time"];
    $location = $_POST["location"];
    $category = $_POST["category"];
    $reported_by = $_POST["reported_by"];


 // Check if the "image" key exists in the $_FILES array
if (isset($_FILES["image"])) {
    $image = $_FILES["image"]["name"];

    // Create the "uploads" directory if it doesn't exist with proper error handling
    if (!is_dir("uploads")) {
        if (!@mkdir("uploads", 0755, true)) {
            die("Failed to create the 'uploads' directory.");
        }
    }

    // Insert data into the database
    $sql = "INSERT INTO tbreports (ReportName, ReportDescription, DateTime, Location, Category, ReportedBy, Image)
            VALUES ('$item_name', '$item_description', '$date_time', '$location', '$category', '$reported_by', '$image')";

    if ($conn->query($sql) === true) {
        echo "Report successfully inserted into the database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Move the uploaded image to the "uploads" folder
    move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $image);

    // Close the database connection
    $conn->close();
}
}

?>

