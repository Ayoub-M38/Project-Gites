<?php

include_once './views/partials/header.php';
include_once './views/partials/navbar.php';
require './Models/GitesModels.php';

?>
    <div class="">
        <div class="jumbotron jumbotron-fluid big-banner text-white">
            <div class="m-4" >
            <h1 class="display-3 font-weight-bold text-warning">Gîtes de France </h1>
            <p class="display-4">Gîtes et Chambres d'hôtes dans le Vercors.</p>

            <p class="text-capitalize text-lg font-weight-bold">Les routes vertigineuses dans le massif du Vercors en Isère, ouvrent la voie vers la plus
                grande réserve naturelle de France métropolitaine, celle des Hauts Plateaux</p>
            </div>
            <form class="container mt-5 rounded" style="margin: 150px; max-width: 420px; padding: 30px 30px 60px 30px; background-color: white; font-family: Helvetica; font-weight: 600; color: #484848;">
                <h1 style="font-size: 2em; font-weight: bold; margin-bottom: 15px;">Gîtes, villas, chalets, appartements, résidences et campings en France</h1>
                <div class="form-group" style=" font-size: small;">
                    <label>Adresse</label><br>
                    <input class="form-control" type="text" placeholder="Où allez-vous ?" name="search" />
                </div>


                <div class="input-group-prepend" style=" font-size: small;">
                    <label>Arrivée</label> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                    <label>Départ</label><br>
                </div>
                <div class="input-group" style=" font-size: small;">
                    <input class="form-control" type="date" placeholder="Quand ?" name="date_arrivee" />
                    <input class="form-control" type="date" placeholder="Quand ?" name="date_depart" />
                </div>
                <br>
                <!--
               <div class="form-group" style=" font-size: small;">
                   <label>Voyageurs</label><br>
                   <select class="custom-select">
                       <option selected>Qui ?</option>
                       <option value="Adults">Adultes</option>
                       <option value="Children">Enfants</option>
                       <option value="Infants">Bébés</option>
                   </select><br>
               </div>
               -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg" style="float: right;">Rechercher</button>
                </div>
            </form>
        </div>
        <?php
       ?>
    </div>

<?php
$allGites = new GitesModels();
$allGites->getAllGites();




