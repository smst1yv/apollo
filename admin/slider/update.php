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
        <li style="list-style-type: none"><a class="text-decoration-none btn btn-dark" href="http://localhost/apollo/admin/contact.php">Contact</a></li>
    </ul>
</div>

<div class="container">
    <?php
        if (!isset($_GET['id']) || empty($_GET['id']) || (int)$_GET['id'] == 0){
            redirect('../slider/index.php?error=data');
        }
        $query = $db->prepare('Select * from slider where id = ?');
        $query->execute([$_GET['id']]);
        $slider = $query->fetch();

        if (!$slider){
            redirect('../slider/index.php?error=data');
        }
        require_once './../function/error.php';
    ?>
</div>

<div class="container">
    <h2>Slider</h2>
    <form action="./../function/slider.php" method="POST" enctype="multipart/form-data">
        <img width="100" src="<?php echo getImage($slider['image']) ?>" alt="">
        <input type="file" class="form-control my-2"  name="image">
        <input type="hidden" class="form-control my-2"  name="action" value="update">
        <input type="hidden" class="form-control my-2"  name="id" value="<?php echo $slider['id']?>">
        <select class="form-control my-2" name="type" id="">
            <option value="1" <?php echo $slider['type'] == 1 ? "selected" : '' ?>>Slider1</option>
            <option value="2" <?php echo $slider['type'] == 2 ? "selected" : '' ?>Slider2</option>
        </select>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
<?php require_once '../footer.php'?>

