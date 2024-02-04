<?php

session_start();

require_once '../models/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hotel_id'])) {
    $hotel_id = $_POST['hotel_id'];
    $hotel_name = $_POST['hotel_name'];
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New reservation request</title>
    <link rel="stylesheet" href="../resources/css/style.css">
    <link rel="stylesheet" href="../resources/css/reservationStyle.css">
</head>
<body>
<div>
    <a href="../index.php" class="back-button"></a>
    <img src="../resources/img/hotel.jpg" alt="hotel">
    <h2>New reservation request</h2>

    <form action="../controllers/actionReservation.php" method="post">
        <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">

        <label for="hotel_name">Hotel Name:</label>
        <input type="text" id="hotel_name" name="hotel_name" value="<?= $hotel_name ?>" disabled>

        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" value="<?= $_SESSION['Fname'] ?> <?= $_SESSION['Lname'] ?>" disabled>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date">

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date">

        <div class="form-message"></div>

        <input type="submit" value="Submit Reservation">
    </form>
</div>

<script>
    const form = document.querySelector("form");
    const inputBegin = form.querySelector("input[name=start_date]");
    const inputEnd = form.querySelector("input[name=end_date]");
    const formMessage = form.querySelector(".form-message");

    form.addEventListener("submit", e => {
        e.preventDefault();

        let formErrors = [];

        if (inputBegin.value.length <= 1 || inputEnd.value.length <= 1) {
            formErrors.push("Nie wypełniłeś wszystkich pól!");
        }

        const currentDate = new Date();
        const selectedBeginDate = new Date(inputBegin.value);
        const selectedEndDate = new Date(inputEnd.value);

        if (selectedBeginDate < currentDate || selectedEndDate < currentDate) {
            formErrors.push("Nie można wybierać dat z przeszłości!");
        }

        if (selectedBeginDate > selectedEndDate) {
            formErrors.push("Data początku rezerwacji nie może być później niż jej koniec!");
        }

        if (!formErrors.length) {
            form.submit();
        } else {
            formMessage.innerHTML = `
            <h3 class="form-error-title">Przed wysłaniem proszę poprawić błędy:</h3>
            <ul class="form-error-list">
                ${formErrors.map(el => `<li>${el}</li>`).join("")}
            </ul>
        `;
        }
    });
</script>
</body>
</html>
