<?php
require_once 'header.php';
?>

<div class="container mt-5">
    <form action="login.php" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>

            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" name="login_user" class="btn btn-primary">Log In</button>

    </form>
</div>
