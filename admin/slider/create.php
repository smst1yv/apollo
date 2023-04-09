<?php require_once '../../db.php';
require_once '../header.php';
require_once './../function/helper.php';
?>

<div class="container d-flex mt-3" style="width: 100%">
    <ul class="d-flex justify-content-between" style="width: 100%">
        <li style="list-style-type: none"><a class="text-decoration-none btn btn-primary" href="http://localhost/apollo/admin/function/section1.php">Section_1</a></li>
        <li style="list-style-type: none"><a class="text-decoration-none btn btn-danger" href="http://localhost/apollo/admin/section_2.php">Section_2</a></li>
        <li style="list-style-type: none"><a class="text-decoration-none btn btn-success" href="">Slider_1</a></li>
        <li style="list-style-type: none"><a class="text-decoration-none btn btn-secondary" href="http://localhost/apollo/admin/section3.php">Section_3</a></li>
        <li style="list-style-type: none"><a class="text-decoration-none btn btn-warning" href="">Slider_2</a></li>
        <li style="list-style-type: none"><a class="text-decoration-none btn btn-dark" href="http://localhost/apollo/admin/contact.php">Contact</a></li>
    </ul>
</div>

<div class="container">
    <?php

//    $query = $db->prepare('Select * from section_2 limit 1');
//    $query->execute();
//    $section = $query->fetch();
//    require_once './function/error.php';
    ?>
</div>

<div class="container">
    <h2>Slider</h2>
    <form action="./../function/slider.php" method="POST" enctype="multipart/form-data">
        <?php
        if (isset($section['image'])){
            ?>
            <img width="100" src="<?php echo getImage($section['image']) ?>" alt="">
            <?php
        }
        ?>
        <input type="file" class="form-control my-2"  name="image">
        <input type="hidden" class="form-control my-2"  name="action" value="create">
        <select class="form-control my-2" name="type" id="">
            <option value="1">Slider1</option>
            <option value="2">Slider2</option>
        </select>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
<?php require_once '../footer.php'?>
