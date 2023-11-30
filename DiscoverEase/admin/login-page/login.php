<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found Management System - Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <img src="../header.png" alt="Header Image">
    </div>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="admin_login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-input">
                    <input type="password" id="password" name="password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility()">Show Password</span>
                </div>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var passwordToggle = document.querySelector(".toggle-password");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordToggle.textContent = "Hide Password";
            } else {
                passwordInput.type = "password";
                passwordToggle.textContent = "Show Password";
            }
        }
    </script>
</body>
</html>
