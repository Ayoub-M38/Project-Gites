<?php
session_start();
$email = $_SESSION['email'];

include_once './views/partials/header.php';
include_once './views/partials/navbar.php';
require_once './Models/GitesModels.php';

?>
    <div class="container mt-lg-5">
        <div class="card w-75">
            <div class="card-body text-white bg-primary">
                <h5 class="card-title">Thank you <?php echo $email ?>,</h5>
                <p class="card-text">You have subscribe with the email <?php echo $email; ?></p>
                <a href="ajouter_gite.php" class="btn  btn-outline-light">Ajouter un Gite</a>
            </div>
        </div>

        <?php
        $adminGites = new GitesModels();
        $adminGites->adminGites();
        ?>

    </div>
<?php
include_once './views/partials/header.php';