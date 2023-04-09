<?php
function redirect($url){
     header("location:$url");
}

function getImage($name){
    return "http://localhost/apollo/uploads/$name";
}

function deletdat ($dat){
    return trim(strip_tags($dat));
}