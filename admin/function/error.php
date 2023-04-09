<?php
if(isset($_GET['error'])){
    if ($_GET['error'] == 'data') {
        echo "<h2 style='color:red'>Melumatlari Doldurun</h2>";
    }
    elseif ($_GET['error'] == 'length'){
        echo "<h2 style='color: red'>max-title:10 , max-text:20</h2>";
    }
    elseif ($_GET['error'] == 'file'){
        echo "<h2 style='color: red'>File Xetasi</h2>";
    }
}else if(isset($_GET['success']) && $_GET['success'] = true){
    echo "<h2 style='color: green'>Melumatlar Elave Edildi</h2>";
}
?>