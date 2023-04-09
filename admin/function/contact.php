<?php
require_once '../../db.php';
require_once 'helper.php';

if($_SERVER['REQUEST_METHOD'] != "POST"){
    redirect('../contact.php');
    return;
}

if(isset($_POST['title']) && isset($_POST['text']) && $_POST['copyright'] && !empty($_POST['title']) && !empty($_POST['text'] && !empty($_POST['copyright']) )){
    $title = $_POST['title'];
    $text = $_POST['text'];
    $copyright = $_POST ['copyright'];


    $contact =getFirstContact($db);

    if($contact){
        updateContact($contact['id'],$db,$title,$text,$copyright);
    }else{
        insertContact($db,$title,$text,$copyright);
    }


}else{
    redirect('../contact.php?error=data');
    return;
};

function getFirstContact($db)
{
    $query = $db->prepare("Select * from contact limit 1");
    $query->execute();
    return $query->fetch();
}

function insertContact($db,$title,$text,$copyright){
    if(strlen($title) > 100 || strlen($text) > 1000){
        redirect('../contact.php?error=length');
        return;
    }

    $query = $db -> prepare(query: 'Insert into contact (title,text,copyright) values (?,?,?)');
    $query -> execute([$title,$text,$copyright]);
    redirect('../contact.php?success=true');

}


function updateContact($id, $db,$title,$text,$copyright){
    if(strlen($title) > 100 || strlen($text) > 1000){
        redirect('../contact.php?error=length');
        return;
    }

    $query = $db -> prepare(query: 'Update contact set title = ?, text =?,copyright = ? where id = ?');
    $query -> execute([$title,$text,$copyright, $id]);
    redirect('../contact.php?success=true');
}