<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>

<h1>All students</h1>
<ul>
    <?php foreach($students as $student):?>
        <li><?= $student->name.", ".$student->email?></li>
        <li>
            <ul>
                <?php foreach($student->classes as $class):?>
                    <li>
                        <?= $class->title ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach; ?>
</ul>
<?php require "partials/footer.php" ?>
