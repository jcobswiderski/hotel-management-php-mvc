<?php

require_once '../models/db.php';

if (isset($_POST['hotel_id'])) {
    $hotel_id = $_POST['hotel_id'];
    $db->begin_transaction();

    try {
        $deleteReservationsQuery = "DELETE FROM `Reservation` WHERE `FK_Hotel_ID` = '$hotel_id'";
        $db->query($deleteReservationsQuery);

        $deleteHotelQuery = "DELETE FROM `Hotel` WHERE `Hotel_ID` = '$hotel_id'";
        $db->query($deleteHotelQuery);

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


