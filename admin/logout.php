<?php
require_once '../db.php';


unset($_SESSION['user_admin']);
header('location:http://localhost/apollo/admin/login.php');
die();
