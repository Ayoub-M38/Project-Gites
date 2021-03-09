<?php
require '../classes/GitesModels.php';
$majGite = new GitesModels();
$majGite->getGiteById();

?>


<?php
//Gestion upload image
/*if(isset($_FILES['img_gite'])){
    $uploaddir = 'assets/img/';
    $img_gite = $uploaddir . basename($_FILES['img_gite']['name']);
    $_POST['img_gite'] = $img_gite;
    if(move_uploaded_file($_FILES['img_gite']['tmp_name'], $img_gite)){

        echo '<p class="alert-success">Le fichier est valide et à été téléchargé avec succès !</p>';
    }else{
        echo '<p class="alert-danger">Une erreur s\'est produite, le fichier n\'est pas valide !</p>';
    }
}else{
    echo "<p class='alert-warning p-2'>Merci de respecter le format d'image valide : png, svg, jpg, jpeg, webp !</p>";
}*/
/*
var_dump($_POST['nom_gite']);
var_dump($_POST['description_gite']);
var_dump($_POST['img_gite']);
var_dump($_POST['nbr_chambre']);
var_dump($_POST['nbr_sdb']);
var_dump($_POST['zone_geo']);
var_dump($_POST['prix']);
var_dump($_POST['disponible']);
var_dump($_POST['date_arrivee']);
var_dump($_POST['date_depart']);
var_dump($_POST['type_gite']);
var_dump($_FILES);

*/

$majGite->updateGite();
?>
</body>
<script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</html>




