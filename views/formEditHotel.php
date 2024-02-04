<?php

session_start();

require_once '../models/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hotel_id'])) {
    $hotel_id = $_POST['hotel_id'];
    $hotel_name = $_POST['hotel_name'];
    $hotel_rate = $_POST['hotel_rate'];
    $hotel_yearofbuilt = $_POST['hotel_yearofbuilt'];
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel edit</title>
    <link rel="stylesheet" href="../resources/css/style.css">
    <link rel="stylesheet" href="../resources/css/reservationStyle.css">
</head>
<body>
<div>
    <a href="../index.php" class="back-button"></a>
    <img src="../resources/img/hotel.jpg" alt="hotel">
    <h2>Hotel modification</h2>

    <form action="../controllers/actionEditHotel.php" method="post">
        <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">

        <label for="hotel_name">Hotel Name:</label>
        <input type="text" id="hotel_name" name="hotel_name" value="<?= $hotel_name ?>">

        <label for="hotel_rate">Rate:</label>
        <input type="text" id="hotel_rate" name="hotel_rate" value="<?= $hotel_rate ?>">

        <label for="$hotel_yearofbuilt">Year of build:</label>
        <input type="number" id="$hotel_yearofbuilt" name="hotel_yearofbuild" value="<?= $hotel_yearofbuilt ?>">

        <input type="submit" value="Submit Reservation">
    </form>
</div>

</body>
</html>
