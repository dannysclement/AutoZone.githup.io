<?php
// Define hardcoded credentials
$correct_username = "admin";
$correct_password = "1234";
$login_success = false;
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $correct_username && $password === $correct_password) {
        $login_success = true;
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: white;
            padding: 30px 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 12px rgba(0,0,0,0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        .success-message {
            background: #e0fce0;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
    </style>
    <script>
        function validateForm() {
            const username = document.forms["loginForm"]["username"].value;
            const password = document.forms["loginForm"]["password"].value;
            if (username === "" || password === "") {
                alert("Username and password are required.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>

<?php if ($login_success): ?>
    <div class="success-message">
        <h2>Welcome, <?= htmlspecialchars($correct_username) ?>!</h2>
        <p>You have successfully logged in.</p>
    </div>
<?php else: ?>
    <div class="login-container">
        <h2>Login</h2>
        <?php if ($error_message): ?>
            <div class="error"><?= htmlspecialchars($error_message) ?></div>
        <?php endif; ?>
        <form name="loginForm" method="post" onsubmit="return validateForm();">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login">
        </form>
    </div>
<?php endif; ?>

</body>
</html>
