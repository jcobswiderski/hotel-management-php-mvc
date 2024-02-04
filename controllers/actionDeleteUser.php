<?php
session_start();

require_once '../models/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    $deleteReservationsQuery = "DELETE FROM `reservation` WHERE `FK_User_ID` = '$user_id'";

    if ($db->query($deleteReservationsQuery)) {
        $deleteUserQuery = "DELETE FROM `user` WHERE `User_ID` = '$user_id'";

        if ($db->query($deleteUserQuery)) {
            echo "Użytkownik i powiązane rezerwacje zostały usunięte pomyślnie.";
        } else {
            echo "Błąd podczas usuwania użytkownika: " . $db->error;
        }
    } else {
        echo "Błąd podczas usuwania powiązanych rezerwacji: " . $db->error;
    }

    header("Location: http://localhost/s22773/views/home_admin.php");
} else {
    echo "Nieprawidłowe żądanie.";
}
?>
