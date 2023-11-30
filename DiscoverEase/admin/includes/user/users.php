<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sm3101";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

// Handle ADD
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addSubmit'])) {
    $userId = sanitizeInput($_POST['userId']);
    $username = sanitizeInput($_POST['username']);
    $password = $_POST['password']; // No password hashing
    $usertype = sanitizeInput($_POST['usertype']);
    $status = sanitizeInput($_POST['status']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Manually assigned values for empid and studid
    $empid = sanitizeInput($_POST['empid']);
    $studid = sanitizeInput($_POST['studid']);

    $insertQuery = "INSERT INTO tbusers (UserID, Username, Password, Usertype, Status, Email, empid, studid) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("isssssii", $userId, $username, $password, $usertype, $status, $email, $empid, $studid);

    if ($stmt->execute()) {
        header("Location: users.php");
        exit();
    } else {
        die("Error: " . $stmt->error);
    }
}

// Handle UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editSubmit'])) {
    $userId = sanitizeInput($_POST['userId']); // Adjust if needed
    $newUsername = sanitizeInput($_POST['username']);
    $newPassword = $_POST['password']; // No password hashing
    $newUsertype = sanitizeInput($_POST['usertype']);
    $newStatus = sanitizeInput($_POST['status']);
    $newEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    $updateQuery = "UPDATE tbusers SET Username=?, Password=?, Usertype=?, Status=?, Email=? WHERE UserID=?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("sssssi", $newUsername, $newPassword, $newUsertype, $newStatus, $newEmail, $userId);

    if ($stmt->execute()) {
        header("Location: users.php");
        exit();
    } else {
        die("Error: " . $stmt->error);
    }
}

// Handle DELETE
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteSubmit'])) {
    $selectedRows = isset($_POST['selected_rows']) ? $_POST['selected_rows'] : [];

    foreach ($selectedRows as $userId) {
        $deleteQuery = "DELETE FROM tbusers WHERE UserID=?";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param("i", $userId);

        if (!$stmt->execute()) {
            die("Error: " . $stmt->error);
        }
    }

    header("Location: users.php");
    exit();
}

// Fetch user data
$sql = "SELECT UserID, Username, Usertype, Status, Email FROM tbusers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>User Table</title>
</head>
<body>

<div class="container">
    <center>
        <form method="post" action="">
            <table>
                <tr>
                    <th>SELECT</th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>User Type</th>
                    <th>Status</th>
                    <th>Email</th>
                </tr>
                <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><input id='check_" . $row['UserID'] . "' type='checkbox' name='selected_rows[]' value='" . $row["UserID"] . "'></td>";
                        echo "<td>" . $row["UserID"] . "</td>";
                        echo "<td>" . $row["Username"] . "</td>";
                        echo "<td>" . $row["Usertype"] . "</td>";
                        echo "<td>" . $row["Status"] . "</td>";
                        echo "<td>" . $row["Email"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<p>No records found.</p>";
                }
                ?>
                </tbody>
            </table>

            <div class='button-container'>
                <button class="buttons" name='add' id='addButton'>ADD</button>
                <button class="buttons" type="submit" name="deleteSubmit">REMOVE</button>
                <button class="buttons" name='edit' onclick="toggleForm()">UPDATE</button>
            </div>
        </form>
    </center>
</div>

<center>
    <form class="mini-form" id="add-form" method="post" action="">
        <button id="closeAdd">x</button><br><br>
        <h1>ADD USER</h1>
        <input name="userId" placeholder="User ID" required>
        <input name="username" placeholder="Username" required>
        <input name="password" type="password" placeholder="Password" required>
        <input name="usertype" placeholder="UserType" required>
        <input name="status" placeholder="Status" required>
        <input name="email" type="email" placeholder="Email" required>

        <!-- Input fields for empid and studid -->
        <input name="empid" placeholder="Emp ID">
        <input name="studid" placeholder="Stud ID">

        <button type="submit" class="buttons" name="addSubmit">ADD</button>
    </form>
</center>

<center>
    <form class="mini-form" id="edit-form" method="post" action="">
        <button id="closeEdit">x</button><br><br>
        <h1>UPDATE USER</h1>
        <input name="userId" placeholder="User ID" required>
        <input name="username" placeholder="Username">
        <input name="password" type="password" placeholder="Password">
        <input name="usertype" placeholder="UserType">
        <input name="status" placeholder="Status">
        <input name="email" type="email" placeholder="Email">
        <button type="submit" class="buttons" name="editSubmit">UPDATE</button>
    </form>
</center>

<script src="users.js"></script>
<script src="checkbox.js"></script>
</body>
</html>
