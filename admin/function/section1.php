<?php
require_once '../../db.php';
require_once 'helper.php';

if($_SERVER['REQUEST_METHOD'] != "POST"){
    redirect('../index.php');
    return;
}

if(isset($_POST['title']) && isset($_POST['text']) && !empty($_POST['title']) && !empty($_POST['text'])){
    $title = trim(htmlentities($_POST['title']));
    $text = trim(htmlentities($_POST['text']));


    $section1 =getFirstSection($db);

    if($section1){
    updateSection1($section1['id'],$db,$title,$text);
    }else{
        insertSection1($db,$title,$text);
    }


}else{
    redirect('../index.php?error=data');
    return;
};

function getFirstSection($db)
{
    $query = $db->prepare("Select * from section_1 limit 1");
    $query->execute();
    return $query->fetch();
}

 function insertSection1($db,$title,$text){
     if(strlen($title) > 100 || strlen($text) > 1000){
         redirect('../index.php?error=length');
         return;
     }

     $query = $db -> prepare(query: 'Insert into section_1 (title,text) values (?,?)');
     $query -> execute([$title,$text]);
     redirect('../index.php?success=true');

 }


function updateSection1($id, $db,$title,$text){
    if(strlen($title) > 100 || strlen($text) > 1000){
        redirect('../index.php?error=length');
        return;
    }

    $query = $db -> prepare(query: 'Update section_1 set title = ?, text =? where id = ?');
    $query -> execute([$title,$text,$id]);
    redirect('../index.php?success=true');
}