<?php

session_start();

require_once '../models/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reservation_id'])) {
    $reservation_id = $_POST['reservation_id'];
    $reservation_client = $_POST['reservation_client'];
    $reservation_hotel = $_POST['reservation_hotel'];
    $reservation_from = $_POST['reservation_from'];
    $reservation_to = $_POST['reservation_to'];
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation edit</title>
    <link rel="stylesheet" href="../resources/css/style.css">
    <link rel="stylesheet" href="../resources/css/reservationStyle.css">
</head>
<body>
<div>
    <a href="../index.php" class="back-button"></a>
    <img src="../resources/img/reservation.jpg" alt="hotel">
    <h2>Reservation modification</h2>

    <form action="../controllers/actionEditReservation.php" method="post">
        <input type="hidden" name="reservation_id" value="<?php echo $reservation_id; ?>">

        <label for="client_name">Client:</label>
        <input type="text" id="client_name" name="client_name" value="<?= $reservation_client ?>" disabled>

        <label for="hotel_name">Hotel Name:</label>
        <input type="text" id="hotel_name" name="hotel_name" value="<?= $reservation_hotel ?>" disabled>

        <label for="reservation_from">Date begin:</label>
        <input type="text" id="reservation_from" name="reservation_from" value="<?= $reservation_from ?>">

        <label for="reservation_to">Date begin:</label>
        <input type="text" id="reservation_to" name="reservation_to" value="<?= $reservation_to ?>">

        <input type="submit" value="Submit Reservation">
    </form>
</div>

</body>
</html>
