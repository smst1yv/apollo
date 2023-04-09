<?php require_once '../db.php';
require_once 'header.php';
require_once './function/helper.php';
require_once './function/middleware.php' ?>
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

        $query = $db->prepare('Select * from section_2 limit 1');
        $query->execute();
        $section = $query->fetch();
        require_once './function/error.php';
        ?>
    </div>

    <div class="container">
        <h2>Section 2</h2>
        <form action="./function/section2.php" method="POST" enctype="multipart/form-data">
            <input type="text" class="form-control my-2" placeholder="title" name="title" value="<?php echo isset ($section['title']) ?  $section ['title'] : "" ?>">
            <textarea class="form-control my-2" placeholder="text" name="text"<?php echo isset ($section['title']) ?  $section ['title'] : "" ?>></textarea>

            <?php
            if (isset($section['image'])){
             ?>
                <img width="100" src="<?php echo getImage($section['image']) ?>" alt="">
             <?php
            }
                ?>
            <input type="file" class="form-control my-2"  name="image">


            <input type="text" class="form-control my-2" placeholder="facebook" name="facebook" value="<?php echo isset ($section['facebook']) ?  $section ['facebook'] : "" ?>">
            <input type="text" class="form-control my-2" placeholder="twitter" name="twitter" value="<?php echo isset ($section['twitter']) ?  $section ['twitter'] : "" ?>">
            <input type="text" class="form-control my-2" placeholder="instagram" name="instagram" value="<?php echo isset ($section['instagram']) ?  $section ['instagram'] : "" ?>">
            <input type="text" class="form-control my-2" placeholder="pinterest" name="pinterest" value="<?php echo isset ($section['pinterest']) ?  $section ['pinterest'] : "" ?>">
            <button class="btn btn-primary">Save</button>
        </form>
    </div>
<?php require_once 'footer.php'?>