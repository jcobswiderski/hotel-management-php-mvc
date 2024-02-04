<?php

session_start();

require_once '../models/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reservation_id'])) {
    $reservation_id = $_POST['reservation_id'];
    $reservation_from = $_POST['reservation_from'];
    $reservation_to = $_POST['reservation_to'];

    $editReservationQuery = "UPDATE `reservation` SET `DateBegin` = '$reservation_from', `DateEnd` = '$reservation_to' WHERE `Reservation_ID` = '$reservation_id'";

    if ($db->query($editReservationQuery)) {
        echo "Rezerwacja została zaktualizowana pomyślnie.";
        header("Location: http://localhost/s22773/views/home_admin.php");
    } else {
        echo "Error: " . $db->error;
    }
}

?>
