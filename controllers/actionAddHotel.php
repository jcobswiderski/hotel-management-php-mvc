<?php

session_start();

require_once '../models/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hotel_id = $_POST['hotel_id'];
    $hotel_name = $_POST['hotel_name'];
    $hotel_rate = $_POST['hotel_rate'];
    $hotel_yearofbuild = $_POST['hotel_yearofbuild'];
    $errors = array();

    if (strlen($hotel_name) < 3 || strlen($hotel_name) > 100) {
        $errors[] = "Nazwa hotelu musi mieć od 3 do 100 znaków!";
    }

    if (strlen($hotel_yearofbuild) !== 4) {
        $errors[] = "Podano nieprawidłowy rok budowy hotelu!";
    }

    if ($hotel_rate < 1 || $hotel_rate > 5) {
        $errors[] = "Ocena hotelu musi być z zakresu od 1 do 5!";
    }

    if (empty($errors)) {
        $addHotelQuery = "INSERT INTO `hotel` VALUES ('$hotel_id', '$hotel_name', '$hotel_rate', '$hotel_yearofbuild')";

        if ($db->query($addHotelQuery)) {
            echo "Hotel dodany pomyślnie.";
            header("Location: http://localhost/s22773/views/home_admin.php");
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
