<?php
session_start();

// Login credentials (you can move these to database later)
$admin_username = 'admin';
$admin_password = 'password123';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === $admin_username && $_POST['password'] === $admin_password) {
        $_SESSION['admin'] = true;
        header('Location: manage-projects.php');
        exit();
    } else {
        $error = 'Invalid login credentials';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 77, 166, 0.3);
            color: white;
            border-radius: 5px;
        }
        .error {
            color: #ff4d4d;
            margin-bottom: 10px;
        }
        body {
            background: #000000;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="section-title">Login</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" class="login-form">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>