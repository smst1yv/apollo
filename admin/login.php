 <?php
    require_once './header.php';
    require_once '../db.php';
    require_once './function/helper.php'
    ?>

<div class="container">
    <form action="" method="POST">
        <input type="text" name="login" placeholder="login" class="form-control my-2">
        <input type="password" name="password" placeholder="password" class="form-control my-2">
        <button class="btn btn-primary">Login</button>
    </form>
</div>

<?php
require_once './footer.php';
?>

<div class="container">
    <?php

    if($_SERVER['REQUEST_METHOD']== "POST"){
        if (
            !isset($_POST['login']) || !isset($_POST['password']) &&
            empty($_POST['login']) || empty($_POST['password'])
        ){
            echo "<h2 class='text-danger'>Keske Benim Olsa Sifre</h2>";
            return;
        }

        $username = trim(strip_tags($_POST['login']));
        $password = trim(strip_tags($_POST['password']));

        $query = $db->prepare('Select * from admin where login = ? and password = ? limit 1');
        $query -> execute([$username,md5($password)]);
        $admin = $query->fetch();

        if(!$admin){
            echo "<h2 class='text-danger'>Username Tapilmadi</h2>";
            return;
        }

        $_SESSION['user_admin'] = 'admin';

        header('location:http://localhost/apollo/admin');
        die();


    }
    ?>
</div>


