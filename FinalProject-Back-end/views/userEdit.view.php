<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>

<h1>Edit one user</h1>
<form action="/users/edit" method="post">
    <input type="number" name="id" value="<?= $user->id ?>" hidden>
    <input type="text" name="name" value="<?= $user->name ?>">
    <input type="text" name="email" value="<?= $user->email ?>">
    <button type="submit">Update</button>
</form>

<?php require "partials/footer.php" ?>
