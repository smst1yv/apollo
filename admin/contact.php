<?php require_once '../db.php'?>
<?php require_once 'header.php'?>

    <div class="container d-flex mt-3" style="width: 100%">
        <ul class="d-flex justify-content-between" style="width: 100%">
            <li style="list-style-type: none"><a class="text-decoration-none btn btn-primary" href="http://localhost/apollo/admin/function/section1.php">Section_1</a></li>
            <li style="list-style-type: none"><a class="text-decoration-none btn btn-danger" href="http://localhost/apollo/admin/section2.php">Section_2</a></li>
            <li style="list-style-type: none"><a class="text-decoration-none btn btn-success" href="">Slider_1</a></li>
            <li style="list-style-type: none"><a class="text-decoration-none btn btn-secondary" href="http://localhost/apollo/admin/section3.php">Section_3</a></li>
            <li style="list-style-type: none"><a class="text-decoration-none btn btn-warning" href="">Slider_2</a></li>
            <li style="list-style-type: none"><a class="text-decoration-none btn btn-dark" href="http://localhost/apollo/admin/contact.php">Contact</a></li>
        </ul>
    </div>

    <div class="container">
        <?php

        $query = $db->prepare('Select * from contact limit 1');
        $query->execute();
        $section = $query->fetch();

        require_once './function/error.php';
        ?>
    </div>

    <div class="container">
        <h2>Contact</h2>
        <form action="./function/contact.php" method="POST">
            <input type="text" class="form-control my-2" placeholder="title" name="title" value="<?php echo isset ($contact['title']) ?  $contact ['title'] : "" ?>">
            <textarea class="form-control my-2" placeholder="text" name="text"<?php echo isset ($contact['title']) ?  $contact ['title'] : "" ?>></textarea>
            <input type="text" class="form-control my-2" placeholder="copyright" name="copyright" value="">
            <button class="btn btn-primary">Save</button>
        </form>
    </div>
<?php require_once 'footer.php'?>