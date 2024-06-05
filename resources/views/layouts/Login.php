<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Halaman Login</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .login-container {
            margin-bottom: 20px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px -9px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container button {
            width: 107%;
            padding: 10px;
            margin: 10px -9px;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
        }
        .login-container button:hover {
            background-color: #007094;
        }
        .login-container p {
            font-size: 14px
        }
        .login-container a {
            color: #007BFF;
        }
        .login-container a:hover {
            color: #007094;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="/Coding.php/UAS/mainMenu.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <p><a href="/Coding.php/UAS/Register.php">Don't Have Account Yet?</a></p>
    </div>
</body>
</html>