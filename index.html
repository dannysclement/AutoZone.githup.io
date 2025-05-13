<?php
$login_error = "";
$login_success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hardcoded credentials (for demonstration purposes)
    $valid_username = "admin";
    $valid_password = "1234";

    // Get input from form
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $valid_username && $password === $valid_password) {
        $login_success = "✅ Login successful. Welcome, $username!";
    } else {
        $login_error = "❌ Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #2b5876, #4e4376);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      width: 100%;
      max-width: 350px;
    }

    .login-container h2 {
      margin-bottom: 20px;
      text-align: center;
      color: #4e4376;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0 15px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #4e4376;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #2b5876;
    }

    .message {
      text-align: center;
      margin-top: 10px;
      font-weight: bold;
    }

    .error {
      color: red;
    }

    .success {
      color: green;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form method="post" onsubmit="return validateForm()">
      <input type="text" name="username" id="username" placeholder="Username" />
      <input type="password" name="password" id="password" placeholder="Password" />
      <button type="submit">Login</button>
    </form>
    
    <?php if ($login_error): ?>
      <div class="message error"><?php echo $login_error; ?></div>
    <?php elseif ($login_success): ?>
      <div class="message success"><?php echo $login_success; ?></div>
    <?php endif; ?>
  </div>

  <script>
    function validateForm() {
      var username = document.getElementById("username").value.trim();
      var password = document.getElementById("password").value.trim();

      if (username === "" || password === "") {
        alert("Please fill in both username and password.");
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
