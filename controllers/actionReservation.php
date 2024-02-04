<?php

session_start();
require_once '../models/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hotel_id = $_POST['hotel_id'];
    $user_id = $_SESSION['user_id'];

    $start_date = new DateTime($_POST['start_date']);
    $start_date->setTime(12, 0, 0);
    $formatted_start_date = $start_date->format('Y-m-d H:i:s.u');

    $end_date = new DateTime($_POST['end_date']);
    $end_date->setTime(12, 0, 0);
    $formatted_end_date = $end_date->format('Y-m-d H:i:s.u');

    $maxIdQuery = "SELECT MAX(`Reservation_ID`) AS max_id FROM `reservation`";
    $result = $db->query($maxIdQuery);

    if ($result && $row = $result->fetch_assoc()) {
        $nextId = $row['max_id'] + 1;

        $insert_query = "INSERT INTO `reservation` VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($insert_query);

        if ($stmt) {
            $stmt->bind_param("iiiss", $nextId, $hotel_id, $user_id, $formatted_start_date, $formatted_end_date);

            if ($stmt->execute()) {
                echo "Rezerwacja została pomyślnie dodana do bazy danych.";
                header("Location: http://localhost/s22773/views/home_user.php");
            } else {
                echo "Błąd podczas dodawania rezerwacji do bazy danych: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Błąd podczas przygotowywania zapytania: " . $db->error;
        }
    } else {
        echo "Błąd podczas pobierania maksymalnego ID: " . $db->error;
    }

    mysqli_close($db);
}
?>
