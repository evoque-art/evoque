<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #2c3e50, #4ca1af);
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 376px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #2c3e50;
        }
        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            height: 44px;
            text-align: left;
        }
        button {
            width: 95%;
            padding: 12px;
            background: #4ca1af;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
            height: 44px;
        }
        button:hover {
            background: #357a7f;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
        .login-container .footer {
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }
        .login-container .footer a {
            color: #4ca1af;
            text-decoration: none;
        }
        .login-container .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="footer">
            <p>Forgot password? <a href="#">Click here</a></p>
        </div>
    </div>
</body>
</html>