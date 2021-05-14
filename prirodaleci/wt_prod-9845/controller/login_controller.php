<?php
include "../services/dbconnection.php";
include "../services/dbmanipulate.php";
include "../services/class.user.php";
include "../services/register_service.php";

$user_class = new USER();

$username = $_POST['username'];
$password = $_POST['password'];

login_user($username, $password, $user_class);
?>