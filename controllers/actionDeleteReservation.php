<?php

require_once '../models/db.php';

if (isset($_POST['reservation_id'])) {
    $reservation_id = $_POST['reservation_id'];
    $db->begin_transaction();

    try {
        $deleteReservationsQuery = "DELETE FROM `Reservation` WHERE `Reservation_ID` = '$reservation_id'";
        $db->query($deleteReservationsQuery);

        $db->commit();
        header("Location: http://localhost/s22773/views/home_admin.php");
    } catch (Exception $e) {
        $db->rollback();
        echo "Błąd podczas usuwania hotelu i powiązanych rezerwacji: " . $e->getMessage();
    }
} else {
    echo "Nieprawidłowe żądanie.";
}

$db->close();


