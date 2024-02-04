<?php

session_start();

require_once '../models/db.php';

$maxIdQuery = "SELECT MAX(`User_ID`) AS max_id FROM `user`";
$result = $db->query($maxIdQuery);
$row = $result->fetch_assoc();
$newUserId = $row['max_id'] + 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_login = $_POST['user_login'];
    $user_password = $_POST['user_password'];
    $errors = array();

    if (strlen($user_fname) < 3 || strlen($user_fname) > 50) {
        $errors[] = "Imię użytkownika musi mieć od 3 do 50 znaków!";
    }

    if (strlen($user_lname) < 3 || strlen($user_lname) > 50) {
        $errors[] = "Nazwisko użytkownika musi mieć od 3 do 50 znaków!";
    }

    if (strlen($user_password) < 6) {
        $errors[] = "Hasło użytkownika musi mieć co najmniej 6 znaków!";
    }

    if (empty($errors)) {
        $addUserQuery = "INSERT INTO `user` (`User_ID`, `Fname`, `Lname`, `Login`, `Password`) 
                         VALUES ('$newUserId', '$user_fname', '$user_lname', '$user_login', '$user_password')";

        if ($db->query($addUserQuery)) {
            echo "User registered successfully.";
            header("Location: http://localhost/s22773/index.php");
        } else {
            echo "Error: " . $db->error;
        }
    } else {
        $encodedErrors = array_map('urlencode', $errors);
        $errorString = implode('<br>', $encodedErrors);
        header("Location: http://localhost/s22773/views/error.php?errors[]=$errorString");
        exit;
    }
}

?>
