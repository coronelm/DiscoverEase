<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    // Perform a query to check the login credentials
    $query = "SELECT * FROM tbusers WHERE Username = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $Username, $Password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Successful login
        header("Location: homepage.php");
        exit();
    } else {
        // Incorrect username or password
        echo '<script>alert("Invalid username or password. Please try again.");</script>';
        echo '<script>window.location = "login.php";</script>';
        exit();  // Add exit to stop further execution
    }
}

$conn->close();
?>  