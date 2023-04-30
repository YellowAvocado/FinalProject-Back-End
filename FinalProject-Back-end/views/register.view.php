<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>

<form action="/register" method="post">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="email" placeholder="example@email.com">
    <div>
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="repeatpassword" placeholder="Repeat password">
    </div>
    <button type="submit">Register</button>
</form>

<?php require "partials/footer.php" ?>
