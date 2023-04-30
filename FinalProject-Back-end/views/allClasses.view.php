<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>

<h1>All classes</h1>
<ul>
    <?php foreach($foods as $food):?>
        <li>
            <?= $food->title ?>
            <ul>
                <?php foreach($food->id as $student): ?>
                    <li><?= $food->id.", ".$food->food ?></li>
                    <a href="/foods/show?id=<?= $food->id ?>">Show</a>
                    <a href="/foods/delete?id=<?= $food->id ?>">Delete</a>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach ?>
</ul>
<?php require "partials/footer.php" ?>
