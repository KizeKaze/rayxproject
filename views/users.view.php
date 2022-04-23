<?php require 'includes/header.php' ?>


<?php foreach ($users as $user) : ?>

    <li><?=$user->username . " has an ID of " . $user->user_id;?></li>

    <?php endforeach; ?>


   <h1>All Users</h1>

    <form action="/users" method="POST">
        <input name="name">
        <button id="name">Submit</button>
    </form>


<?php require 'includes/footer.php' ?>
