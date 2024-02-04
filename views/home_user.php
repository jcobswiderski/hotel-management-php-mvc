<?php
require_once '../models/db.php';
session_start();

if(isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == false) {
    header("Location: http://localhost/s22773/index.php");
}

if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
    header("Location: http://localhost/s22773/views/home_admin.php");
}

$itemsPerPage = 7;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

$result = $db->query("SELECT * FROM `hotel` LIMIT $offset, $itemsPerPage");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home dla użytkownika</title>
    <link rel="stylesheet" href="../resources/css/style.css">
</head>
<body>
<div class="header-container">
    <h1 class="welcome-message">Hello, <?php echo $_SESSION['Fname'] . ' ' . $_SESSION['Lname']; ?>!</h1>
    <form action="../controllers/actionLogout.php" method="post" class="logout-form">
        <input type="submit" value="Wyloguj" class="logout-button">
    </form>
</div>

<div class="section-container">
    <h2>Hotels</h2>
    <table class="home-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Rate</th>
            <th>YearOfBuild</th>
            <th>Action</th>
            <?php if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1): ?>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?=$row['Hotel_ID']?></td>
                <td><?=$row['Name']?></td>
                <td><?=$row['Rate']?></td>
                <td><?=$row['YearOfBuild']?></td>
                <td>
                    <form action="formReservation.php" method="post">
                        <input type="hidden" name="hotel_id" value="<?php echo $row['Hotel_ID']; ?>">
                        <input type="hidden" name="hotel_name" value="<?php echo $row['Name']; ?>">
                        <input class="actionButton" type="submit" value="Rezerwuj">
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php
    $totalRows = $db->query("SELECT COUNT(*) as total FROM `hotel`")->fetch_assoc()['total'];
    $totalPages = ceil($totalRows / $itemsPerPage);

    if ($totalPages > 1) {
        echo '<div class="pagination">';
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="?page=' . $i . '">' . $i . '</a> ';
        }
        echo '</div>';
    }
    ?>

</div>

<div class="section-container">
    <h2>My reservations</h2>
    <table class="home-table">
        <thead>
        <tr>
            <th>Hotel</th>
            <th>From</th>
            <th>To</th>
        </tr>
        </thead>
        <tbody>
        <?php $resultReservations = $db->query("SELECT * FROM `reservation` INNER JOIN `hotel` ON `FK_Hotel_ID` = `Hotel_ID` WHERE `FK_User_ID` = ". $_SESSION['user_id']); ?>
        <?php while($row = $resultReservations->fetch_assoc()) { ?>
            <tr>
                <td><?=$row['Name']?></td>
                <td><?=$row['DateBegin']?></td>
                <td><?=$row['DateEnd']?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
