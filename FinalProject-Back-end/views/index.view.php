<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>


<ul>
    <?php foreach ($moods as $mood): ?>
        <li>
            <?= $mood->id." - ".$mood->mood?>
            <a href="/moods/show?id=<?= $mood->id ?>">Show</a>
            <a href="/moos/delete?id=<?= $mood->id ?>">Delete</a>
        </li>
    <?php endforeach ?>
</ul>
<?php require "partials/footer.php" ?>

