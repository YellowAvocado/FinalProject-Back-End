<?php require "partials/head.php" ?>

<h1>Log in</h1>
<form action="login" method="post">
    <input type="text" name="email" placeholder="example@email.com">
    <label for="password">Password</label>
    <input type="password" name="password">

    <button type="submit">Login</button>
</form>


<?php require "partials/footer.php" ?>
