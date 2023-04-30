<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>

<h1>All users</h1>

<ul>
    <?php foreach ($users as $user): ?>
      <li>
          <?= $user->id." - ".$user->name . " - " . $user->email ?>
          <a href="/users/show?id=<?= $user->id ?>">Show</a>

          <?php if($user->email !== 'admin@admin.com'): ?>
            <a href="/users/edit?id=<?= $user->id ?>">Edit</a>
            <a href="/delete?id=<?= $user->id ?>">Delete</a>
           <?php endif ?>
      </li>
    <?php endforeach ?>
</ul>
<?php require "partials/footer.php" ?>
