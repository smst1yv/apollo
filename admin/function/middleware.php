<?php
$login_url = 'http://localhost/apollo/admin/login.php';

if (!isset($_SESSION['user_admin']) || $_SESSION['user_admin'] != 'admin'){
    header("Location:$login_url");
}
?>
<div class="container" style="position: relative">
    <h2 class="text-success my-2 text-center">Admin Name: <?= $_SESSION['user_admin']?></h2>
    <a style="position: relative; left: 45%" href="./logout.php" class="btn btn-danger" >Cixis</a>
</div>
