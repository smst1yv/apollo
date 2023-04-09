<?php require_once '../../db.php';
require_once '../header.php';
require_once './../function/helper.php';


$query = $db->prepare('Select * from slider');
$query->execute();
$sliders = $query->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Type</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <?php

        foreach ($sliders as $slider){
            ?>

            <tr>
                <td><?= $slider['id'] ?></td>
                <td><img style="object-fit: contain" width="100" height="100" src="<?= getImage($slider['image'])?>" alt=""></td>
                <td>Slider<?= $slider['type'] ?></td>
                <td class="">
                    <div >
                        <a class="btn btn-primary my-2" href="./update.php?id=<?= $slider['id'] ?>">edit</a>
                    </div>
                    <form action="">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

       <?php
        }
    ?>


    </tbody>
</table>
</div>


<?php require_once '../footer.php'?>