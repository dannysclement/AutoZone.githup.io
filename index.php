<?php
session_start();

// Hardcoded demo credentials (in real scenario, use database and password hashing)
$demo_user = 'user@example.com';
$demo_password_hash = password_hash('Password123!', PASSWORD_DEFAULT);

$login_error = '';
$login_success = false;
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Already logged in, redirect directly to account.html
    header("Location: account.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';

    if (!$email) {
        $login_error = 'Please enter a valid email address.';
    } elseif (empty($password)) {
        $login_error = 'Please enter your password.';
    } else {
        // Check credentials
        if ($email === $demo_user && password_verify($password, $demo_password_hash)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_email'] = $email;
            $login_success = true;
        } else {
            $login_error = 'Invalid email or password.';
        }
    }
}

// Logout handling
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>Login</title>
<style>
  /* Reset & base */
  * {
    box-sizing: border-box;
  }
  body {
    margin:0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px;
  }
  #container {
    background: #fff;
    border-radius: 12px;
    padding: 30px 25px 40px 25px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    width: 100%;
    max-width: 350px;
    height: auto;
    min-height: 380px;
    display: flex;
    flex-direction: column;
  }
  h2 {
    margin: 0 0 15px 0;
    color: #333;
    font-weight: 700;
    font-size: 1.8rem;
    text-align: center;
  }
  form {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  label {
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 6px;
    color: #444;
  }
  input[type="email"],
  input[type="password"] {
    padding: 10px 12px;
    margin-bottom: 18px;
    border-radius: 8px;
    border: 1.8px solid #ccc;
    font-size: 1rem;
    transition: border-color 0.3s ease;
  }
  input[type="email"]:focus,
  input[type="password"]:focus {
    outline: none;
    border-color: #6a11cb;
    box-shadow: 0 0 8px rgba(106,17,203,0.4);
  }
  button {
    padding: 12px 0;
    background: #6a11cb;
    border: none;
    border-radius: 10px;
    color: white;
    font-size: 1.1rem;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 6px 15px rgba(106,17,203,0.6);
    transition: background 0.3s ease;
  }
  button:hover {
    background: #5417a1;
  }
  .error {
    background: #ff4d4f;
    color: white;
    padding: 10px 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    font-size: 0.9rem;
    text-align: center;
  }
  .success {
    background: #40c057;
    color: white;
    padding: 10px 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    font-size: 1rem;
    text-align: center;
    font-weight: 600;
  }
  @media (max-width: 375px) {
    #container {
      padding: 20px 20px 30px 20px;
    }
    h2 {
      font-size: 1.5rem;
    }
    input[type="email"],
    input[type="password"] {
      font-size: 0.95rem;
    }
    button {
      font-size: 1rem;
    }
  }
</style>
</head>
<body>
<div id="container" role="main">
  <?php if ($login_success): ?>
    <h2>Login Successful</h2>
    <div class="success" role="alert">Login successful! Redirecting to your account...</div>
    <script>
      setTimeout(() => {
        window.location.href = 'account.html';
      }, 1800);
    </script>
  <?php else: ?>
    <h2>Login to Your Account</h2>
    <?php if ($login_error): ?>
      <div class="error" role="alert"><?php echo htmlspecialchars($login_error); ?></div>
    <?php endif; ?>
    <form id="loginForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate aria-live="polite" aria-describedby="formError" aria-label="Login form">
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" placeholder="you@example.com" required aria-required="true" autocomplete="email" />
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Your password" required aria-required="true" autocomplete="current-password" minlength="8" />
      <button type="submit">Login</button>
    </form>
  <?php endif; ?>
</div>
<script>
  (() => {
    // Simple client-side validation
    const form = document.getElementById('loginForm');
    if (!form) return;

    form.addEventListener('submit', function(e) {
      let errors = [];
      const emailInput = form.email;
      const passwordInput = form.password;
      const emailValue = emailInput.value.trim();
      const passwordValue = passwordInput.value;

      // Basic email regex validation
      const emailPattern = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$/;
      if (!emailPattern.test(emailValue)) {
        errors.push('Please enter a valid email address.');
      }
      if (passwordValue.length < 8) {
        errors.push('Password must be at least 8 characters long.');
      }

      if (errors.length > 0) {
        e.preventDefault();
        alert(errors.join('\\n'));
      }
    }, false);
  })();
</script>
</body>
</html>

