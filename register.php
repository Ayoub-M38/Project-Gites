<?php
require_once './views/Partials/header.php';

if(!empty($_POST)){

    $errors = array();

    if(empty($_POST['username'])){
        $errors['username'] = "Vous n'avez pas entrer votre pseudo";
    }

    echo '<pre>';
    var_dump($errors);
    echo '</pre>';

}

?>
<div class="container mt-5">
    <h1>S'inscrire</h1>
    <form action="register.php" method="post">
        <div class="form-group">
            <label>Pseudo</label>
            <input type="text" name="username" class="form-control">

            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" class="form-control">

            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" name="" class="btn btn-primary">M'inscrire</button>

    </form>
</div>
