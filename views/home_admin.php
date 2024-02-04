<?php
require_once '../models/db.php';
session_start();

if(isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == false) {
    header("Location: http://localhost/s22773/index.php");
}

$itemsPerPage = 7;

$pageHotels = isset($_GET['page_hotels']) ? $_GET['page_hotels'] : 1;
$offsetHotels = ($pageHotels - 1) * $itemsPerPage;
$resultHotels = $db->query("SELECT * FROM `hotel` LIMIT $offsetHotels, $itemsPerPage");

$pageReservations = isset($_GET['page_reservations']) ? $_GET['page_reservations'] : 1;
$offsetReservations = ($pageReservations - 1) * $itemsPerPage;
$resultReservations = $db->query("SELECT * FROM `reservation` INNER JOIN `hotel` ON `FK_Hotel_ID` = `Hotel_ID` INNER JOIN `user` ON `FK_User_ID` = `User_ID`  LIMIT $offsetReservations, $itemsPerPage");

$pageUsers = isset($_GET['page_users']) ? $_GET['page_users'] : 1;
$offsetUsers = ($pageUsers - 1) * $itemsPerPage;
$resultUsers = $db->query("SELECT * FROM `user` WHERE `isAdmin` = 0 LIMIT $offsetUsers, $itemsPerPage");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home dla administratora</title>
    <link rel="stylesheet" href="../resources/css/style.css">
    <link rel="stylesheet" href="../resources/css/style-admin.css">
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
    <a href="./formAddHotel.php" class="add-hotel-button"></a>
    <table class="home-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Rate</th>
            <th>YearOfBuild</th>
            <th>Action1</th>
            <th>Action2</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row = $resultHotels->fetch_assoc()) { ?>
            <tr>
                <td><?=$row['Hotel_ID']?></td>
                <td><?=$row['Name']?></td>
                <td><?=$row['Rate']?></td>
                <td><?=$row['YearOfBuild']?></td>
                <td>
                    <form action="../views/formEditHotel.php" method="post">
                        <input type="hidden" name="hotel_id" value="<?php echo $row['Hotel_ID']; ?>">
                        <input type="hidden" name="hotel_name" value="<?php echo $row['Name']; ?>">
                        <input type="hidden" name="hotel_rate" value="<?php echo $row['Rate']; ?>">
                        <input type="hidden" name="hotel_yearofbuilt" value="<?php echo $row['YearOfBuild']; ?>">
                        <input class="actionButton" type="submit" value="Edytuj">
                    </form>
                </td>
                <td>
                    <form action="../controllers/actionDeleteHotel.php" method="post">
                        <input type="hidden" name="hotel_id" value="<?php echo $row['Hotel_ID']; ?>">
                        <input type="hidden" name="hotel_name" value="<?php echo $row['Name']; ?>">
                        <input class="actionButton" type="submit" value="Usuń">
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php
    $totalHotels = $db->query("SELECT COUNT(*) as total FROM `hotel`")->fetch_assoc()['total'];
    $totalPagesHotels = ceil($totalHotels / $itemsPerPage);

    if ($totalPagesHotels > 1) {
        echo '<div class="pagination">';
        for ($i = 1; $i <= $totalPagesHotels; $i++) {
            echo '<a href="?page_hotels=' . $i . '&page_reservations=' . $pageReservations . '&page_users=' . $pageUsers . '">' . $i . '</a> ';
        }
        echo '</div>';
    }
    ?>

</div>

<div class="section-container">
    <h2>All reservations</h2>
    <table class="home-table">
        <thead>
        <tr>
            <th>Client</th>
            <th>Hotel</th>
            <th>From</th>
            <th>To</th>
            <th>Action1</th>
            <th>Action2</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row = $resultReservations->fetch_assoc()) { ?>
            <tr>
                <td><?=$row['Fname'] . ' ' . $row['Lname']?></td>
                <td><?=$row['Name']?></td>
                <td><?=$row['DateBegin']?></td>
                <td><?=$row['DateEnd']?></td>
                <td>
                    <form action="formEditReservation.php" method="post">
                        <input type="hidden" name="reservation_id" value="<?php echo $row['Reservation_ID']; ?>">
                        <input type="hidden" name="reservation_client" value="<?php echo $row['Fname']; ?> <?php echo $row['Lname']; ?>">
                        <input type="hidden" name="reservation_hotel" value="<?php echo $row['Name']; ?>">
                        <input type="hidden" name="reservation_from" value="<?php echo $row['DateBegin']; ?>">
                        <input type="hidden" name="reservation_to" value="<?php echo $row['DateEnd']; ?>">
                        <input class="actionButton" type="submit" value="Edytuj">
                    </form>
                </td>
                <td>
                    <form action="../controllers/actionDeleteReservation.php" method="post">
                        <input type="hidden" name="reservation_id" value="<?php echo $row['Reservation_ID']; ?>">
                        <input class="actionButton" type="submit" value="Usuń">
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php
    $totalReservations = $db->query("SELECT COUNT(*) as total FROM `reservation` INNER JOIN `hotel` ON `FK_Hotel_ID` = `Hotel_ID`")->fetch_assoc()['total'];
    $totalPagesReservations = ceil($totalReservations / $itemsPerPage);

    if ($totalPagesReservations > 1) {
        echo '<div class="pagination">';
        for ($i = 1; $i <= $totalPagesReservations; $i++) {
            echo '<a href="?page_hotels=' . $pageHotels . '&page_reservations=' . $i . '&page_users=' . $pageUsers . '">' . $i . '</a> ';
        }
        echo '</div>';
    }
    ?>
</div>

<div class="section-container">
    <h2>Users</h2>
    <table class="home-table">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Action1</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row = $resultUsers->fetch_assoc()) { ?>
            <tr>
                <td><?=$row['Fname']?></td>
                <td><?=$row['Lname']?></td>
                <td>
                    <form action="../controllers/actionDeleteUser.php" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $row['User_ID']; ?>">
                        <input class="actionButton" type="submit" value="Usuń">
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php
    $totalUsers = $db->query("SELECT COUNT(*) as total FROM `user` WHERE `isAdmin` = 0")->fetch_assoc()['total'];
    $totalPagesUsers = ceil($totalUsers / $itemsPerPage);

    if ($totalPagesUsers > 1) {
        echo '<div class="pagination">';
        for ($i = 1; $i <= $totalPagesUsers; $i++) {
            echo '<a href="?page_hotels=' . $pageHotels . '&page_reservations=' . $pageReservations . '&page_users=' . $i . '">' . $i . '</a> ';
        }
        echo '</div>';
    }
    ?>
</div>

</body>
</html>
