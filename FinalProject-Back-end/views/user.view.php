<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>

<h1>User view page</h1>

<p>This user is <?= $user->name ?></p>
<p>Email: <?= $user->email ?></p>
<a href="/users/edit?id=<?= $user->id?>">Edit user</a>

<?php require "partials/footer.php" ?>