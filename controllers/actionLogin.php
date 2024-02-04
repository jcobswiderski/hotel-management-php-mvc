<?php 

require_once '../models/db.php';

if(isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
    header("Location: http://localhost/s22773/views/home_user.php");
}

$result = $db->query("SELECT * FROM `user` WHERE `login`='".$_POST['login']."' AND `password`='".$_POST['password']."'");

if($result->num_rows) {
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION['isLogged'] = true;
    $_SESSION['user_id'] = $row['User_ID'];
    $_SESSION['isAdmin'] = $row['isAdmin'];
    $_SESSION['Fname'] = $row['Fname'];
    $_SESSION['Lname'] = $row['Lname'];
    header("Location: http://localhost/s22773/views/home_user.php");
} else {
    header("Location: http://localhost/s22773/index.php");
}


