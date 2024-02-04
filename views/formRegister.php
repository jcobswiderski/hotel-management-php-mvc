<?php

session_start();

require_once '../models/db.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Registration</title>
    <link rel="stylesheet" href="../resources/css/style.css">
    <link rel="stylesheet" href="../resources/css/reservationStyle.css">
</head>
<body>
<div>
    <a href="../index.php" class="back-button"></a>
    <img src="../resources/img/user.jpg" alt="user">
    <h2>User Registration</h2>

    <form action="../controllers/actionAddUser.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

        <label for="user_fname">First Name:</label>
        <input type="text" id="user_fname" name="user_fname">

        <label for="user_lname">Last Name:</label>
        <input type="text" id="user_lname" name="user_lname">

        <label for="user_login">Login:</label>
        <input type="text" id="user_login" name="user_login">

        <label for="user_password">Password:</label>
        <input type="password" id="user_password" name="user_password">

        <input type="submit" value="Register">
    </form>
</div>

</body>
</html>
