<?php
session_start();

$admin_username = 'shahd'; 
$admin_password = 'shahd123'; 

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
        body {
            background: #000000;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background: #0a0a0a;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(255, 77, 166, 0.1);
            border: 1px solid rgba(255, 77, 166, 0.1);
        }

        .section-title {
            color: #ff4da6;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2em;
            text-shadow: 0 0 10px rgba(255, 77, 166, 0.3);
        }

        .login-form input {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            background: #111111;
            border: 1px solid rgba(255, 77, 166, 0.2);
            color: white;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .login-form input:focus {
            border-color: #ff4da6;
            box-shadow: 0 0 10px rgba(255, 77, 166, 0.2);
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            background: #ff4da6;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn:hover {
            background: #ff66b2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 77, 166, 0.3);
        }

        .error {
            background: rgba(255, 77, 77, 0.1);
            border: 1px solid rgba(255, 77, 77, 0.3);
            color: #ff4d4d;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
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