<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sm3101";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST["item_name"];
    $item_description = $_POST["item_description"];
    $date_time = $_POST["date_time"];
    $location = $_POST["location"];
    $category = $_POST["category"];
    $reported_by = $_POST["reported_by"];

    if (isset($_FILES["image"]) && is_uploaded_file($_FILES["image"]["tmp_name"])) {
        $image = $_FILES["image"]["name"];

        if (!is_dir("uploads")) {
            if (!@mkdir("uploads", 0755, true)) {
                die("Failed to create the 'uploads' directory.");
            }
        }

        // Insert into tbreports
        $stmt = $conn->prepare("INSERT INTO tbreports (ReportName, ReportDescription, DateTime, Location, Category, ReportedBy, Image) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $item_name, $item_description, $date_time, $location, $category, $reported_by, $image);

        if ($stmt->execute()) {
            $reportID = $stmt->insert_id;

            // Insert into tbitems with the obtained ReportID
            $stmtItems = $conn->prepare("INSERT INTO tbitems (ItemName, ItemDescription, DateTime, Location, Status, Category, ReportedBy, Image, ReportID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmtItems->bind_param("ssssssssi", $item_name, $item_description, $date_time, $location, $status, $category, $reported_by, $image, $reportID);

            if ($stmtItems->execute()) {
                // Move uploaded file
                move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $image);
                echo '<script>alert("Report and item successfully inserted into the database.");</script>';
                echo '<script>window.location = "report.php";</script>';
            } else {
                echo "Error: " . $stmtItems->error;
            }

            $stmtItems->close();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();

    } else {
        echo "Error: No image uploaded.";
    }
}

$conn->close();
?>
