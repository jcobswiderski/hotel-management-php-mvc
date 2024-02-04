<?php

session_start();
$_SESSION['isLogged'] = false;
header("Location: http://localhost/s22773/index.php");