<?php
    session_start();
    if(isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
        header("Location: http://localhost/s22773/views/home_user.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            display: block;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            margin-top: 10px;
            width: 200px;
            text-align: center;
        }

        button:hover {
            background-color: #45a049;
        }

        .buttons {
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: end;
        }

        a {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<form action="./controllers/actionLogin.php" method="post">
    <label for="login">Login:</label>
    <input type="text" id="login" name="login" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <div class="buttons">
        <button type="submit">Login</button>
        <a href="./views/formRegister.php">Dołącz do nas!</a>
    </div>

</form>

</body>
</html>
