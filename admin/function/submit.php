<?php
require_once '../header.php';
require_once '../../db.php' ;
require_once 'helper.php'
?>

<?php

$url="../contact.php";

if(isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['subject']) && !empty($_POST['subject']) &&
    $_POST['action']=="insert"
){
    $email=deletdat($_POST['email']);
    $subject=deletdat($_POST['subject']);
    $message=deletdat($_POST['message']);

    $query = $db->prepare('insert into user_message (email,subject,message) values (?,?,?)');
    $query->execute([$email,$subject,$message]);

    redirect("../../index.php");
    return;

}
else {
    if (!isset($_GET['id']) || empty($_GET['id']) || (int)$_GET['id'] == 0) {
        redirect("$url?error=data");
    }
    $query = $db->prepare('select * from contact where id=?');
    $query->execute([deletdat($_GET['id'])]);
    $contact = $query->fetch();
    if (!$contact) {
        redirect("$url?error=data");
    }

    $querydelete = $db->prepare('delete from contact where id=?');
    $querydelete->execute([deletdat($_GET['id'])]);
    $contact = $query->fetch();

    redirect("$url?delete=true");

}
?>