<?php
require'Database.php';

class Gites extends Database
{
    //* Ces propriétés représentent les champs de ma table gîtes
    private $id_gite;
    private $nom_du_gite;
    private $description_gite;
    private $photos_gite;
    private $nbr_de_chambres_gite;
    private $nbr_de_salle_de_bains_gite;
    private $prix_gite;
    private $disponibilite_gite;

    //* cette propriété représente une clé étrangère avec la table gites et une clé primaire avec la table categorie_de_logement
    private $type_de_logement_id;

    //* Ces propriétés représentent les champs ma table categorie_de_logement
    private $type_de_logement;

    //* Ces propriétés représentent les champs de ma table gîtes
    private $id_admin;
    private $email_admin;
    private $password_admin;

    public function createCRUD(){

            if(isset($_POST['nom_du_gite'])){
                $nom_du_gite = $_POST['nom_du_gite'];
            }

            if(isset($_POST['description_gite'])){
                $description_gite = $_POST['description_gite'];
            }

            if(isset($_POST['photos_gite'])){
                $photos_gite = $_POST['photos_gite'];
            }

            if(isset($_POST['prix_gite'])){
                $prix_gite= $_POST['prix_gite'];
            }


            if(isset($_POST['nbr_de_chambres_gite'])){
                $nbr_de_chambres_gite = $_POST['nbr_de_chambres_gits'];
            }

            if(isset($_POST['nbr_de_salles_de_bains_gite'])){
                $nbr_de_salles_de_bains_gite= $_POST['nbr_de_salles_de_bains_gites'];
            }

            if(isset($_POST['disponibilite_gite'])){
                $disponibilite_gite = $_POST['disponibilite_gite'];
            }

            if(isset($_POST['type_de_logement'])){
                $type_de_logement = $_POST['type_de_logement'];
            }

            try{
                $db = $this->connect();
                $req = $db->prepare("INSERT INTO gites (nom_du_gite, description_gite, photos_gite, prix_gite, nbr_de_chambres_gite, nbr_de_salle_de_bains_gite, disponibilite_gite, type_de_logement) VALUES (?,?,?,?,?,?,?,?) ");
                $req->bindParam(1, $nom_du_gite);
                $req->bindParam(2, $description_gite);
                $req->bindParam(3, $photos_gite);
                $req->bindParam(4, $prix_gite);
                $req->bindParam(5, $nbr_de_chambres_gite);
                $req->bindParam(6, $nbr_de_salle_de_bains_gite);
                $req->bindParam(7, $disponibilite_gite);
                $req->bindParam(8, $type_de_logement);

                $insert = $req->execute(array($nom_du_gite, $description_gite, $photos_gite, $prix_gite, $nbr_de_chambres_gite, $nbr_de_salle_de_bains_gite, $disponibilite_gite, $type_de_logement  ));
                if($insert){
                    header("Location: http://localhost/PHP/Projet%20Gites%20POO/views/admin.php");
                    var_dump($req);
                    return $req;
                }else{
                    echo "<p class='alert-danger p-3'>Une erreur est survenue durant l'ajout du gite, merci de verifié tous les champs !</p>";
                }

            }catch (PDOException $e){
                echo "Erreur : Merci de vérifié les données du formulaire";
            }


        /*if(isset($_POST)){
            if (isset($_POST['nom_du_gite']) && !empty($_POST['nom_du_gite'])
                && isset($_POST['description_gite']) && !empty ($_POST['description_gite'])
                && isset($_POST['photos_gite']) && !empty ($_POST['photos_gite'])
                && isset($_POST['prix_gite']) && !empty ($_POST['prix_gite'])
                && isset($_POST['nbr_de_chambres_gite']) && !empty ($_POST['nbr_de_chambres_gite'])
                && isset($_POST['nbr_de_salle_de_bains_gite']) && !empty ($_POST['nbr_de_salle_de_bains_gite'])
                && isset($_POST['disponibilite_gite']) && !empty ($_POST['disponibilite_gite'])
                && isset($_POST['type_de_logement']) && !empty ($_POST['type_de_logement'])){
                //*nettoyons les id
                $nom_du_gite= strip_tags($_POST['nom_du_gite']);
                $description_gite= strip_tags($_POST['description_gite']);
                $photos_gite=strip_tags($_POST['photos_gite']);
                $prix_gite=strip_tags($_POST['prix_gite']);
                $nbr_de_chambres_gite=strip_tags($_POST['nbr_de_chambres_gite']);
                $nbr_de_salle_de_bains_gite=strip_tags($_POST['nbr_de_salle_de_bains_gite']);
                $disponibilite_gite=strip_tags($_POST['disponibilite_gite']);
                $type_de_logement=strip_tags($_POST['type_de_logement']);

                $db=$this->connect();
                $sql="INSERT INTO gites (`nom_du_gite`,`description_gite`, `photos_gite`, `prix_gite`,`nbr_de_chambres_gite`,`nbr_de_salle_de_bains_gite`,`disponibilite_gite`,`type_de_logement`)
                    VALUES (:nom_du_gite, :description_gite, :photos_gite, :prix_gite, :nbr_de_chambres_gite, :nbr_de_salle_de_bains_gite, :disponibilite_gite, :type_de_logement);";
                //Préparation de la requête sql
                $query= $db->prepare($sql);

                //ON lie les id des colonnes avec les futures valeurs récupérés dans le formulaire
                $query->bindValue(':nom_du_gite',$nom_du_gite, PDO::PARAM_STR);
                $query->bindValue(':description_gite',$description_gite, PDO::PARAM_STR);
                $query->bindValue(':photos_gite',$photos_gite,PDO::PARAM_STR);
                $query->bindValue(':prix_gite',$prix_gite,PDO::PARAM_INT);
                $query->bindValue(':nbr_de_chambres_gite',$nbr_de_chambres_gite,PDO::PARAM_INT);
                $query->bindValue(':nbr_de_salle_de_bains_gite',$nbr_de_salle_de_bains_gite,PDO::PARAM_INT);
                $query->bindValue(':disponibilite_gite',$disponibilite_gite,PDO::PARAM_INT);
                $query->bindValue(':type_de_logement',$type_de_logement,PDO::PARAM_STR);
                //* Le script s'exécute
                $query->execute();
                $_SESSION['messageAdd'] = "Gite ajouté !";
                header('Location: admin.php');
            }

        }*/
        ?>
        <div class="container">
            <form  method="post" action="Gites.php">
                <div class="form-group">
                    <label for="nom_du_gite">Nom du Gite</label>
                    <input type="text" name="nom_du_gite" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="description_gite">Description</label>
                    <textarea class="form-control" name="description_gite" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
               <div class="form-group">
                    <label for="exampleFormControlFile1">Photo</label>
                    <input type="file" name="photos_gite" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Prix</label>
                    <textarea class="form-control" name="prix_gite" id="exampleFormControlTextarea1" rows="1"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nombre de chambres</label>
                    <select class="form-control" name="nbr_de_chambres_gite" id="exampleFormControlSelect1">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nombre de salles de bains</label>
                    <select class="form-control" name="nbr_de_salle_de_bains_gite" id="exampleFormControlSelect1">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Type de logement</label>
                    <select class="form-control" name="type_de_logement" id="exampleFormControlSelect1">
                        <option value="1">Chalet</option>
                        <option value="2">Villa</option>
                        <option value="3">Appartement</option>
                        <option value="4">Maison</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Disponibilité</label>
                    <select class="form-control" name="disponibilite_gite" id="exampleFormControlSelect1">
                        <option value="1">Disponible</option>
                        <option value="2">Pas disponible</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Valider</button>
            </form>
        </div>
        <?php
    }
    public function readCRUD(){
        $db=$this->connect();
        $sql = 'SELECT*FROM `gites`';
        $req= $db->query($sql);
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="container text-center mt-5">
            <div class="row">
                <?php
                foreach ($result as $row) {
                    ?>
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card mt-3">
                            <img class="img-fluid" src="<?=$row['photos_gite'] ?>" alt="Card image cap" >
                            <div class="card-body">
                                <h5 class="card-title "><?= $row['nom_du_gite'] ?></h5>
                                <p class="card-text">C'est l'id n°<?= $row['id_gite'] ?> du gite.</p>
                                <p class="card-text"><?= $row['disponibilite_gite'] ?></p>
                                <p class="card-text"><?= $row['description_gite'] ?></p>
                                <p class="card-text">Il y a <?= $row['nbr_de_chambres_gite'] ?> chambres.</p>
                                <p class="card-text">Il y a <?= $row['nbr_de_salles_de_bains_gite'] ?> salle(s) de bains</p>
                                <p class="card-text">La location a la semaine du logement est de  <?= $row['prix_gite'] ?> € </p>
                                <a href="details.php?id=<?=$row ['id_gite']?>" class="btn btn-primary">Voir les détails</a>
                                <a href="updategite.php?id=<?=$row ['id_gite']?>" class="btn btn-warning">Mettre à jour</a>
                                <a href="deletegite.php?id=<?=$row ['id_gite']?>" class="btn btn-danger"Onclick="return confirm('Voulez-vous vraiment supprimer ce gîte?');">Supprimer</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php

    }
    public function detailsCRUD(){
        $db=$this->connect();
        $sql= 'SELECT*FROM `gites` WHERE `id_gite`=:id_gite;';
        if(isset($_GET['id']) && !empty ($_GET['id'])){
            $this->id_gite= strip_tags($_GET['id']);
            $req= $db->prepare($sql);
            $req->execute();
            $row= $req->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
        <div class="container text-center mt-5">
            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="card mt-3">
                        <img class="img-fluid" src="<?=$row['photos_gite'] ?>" alt="Card image cap" >
                        <div class="card-body">
                            <h5 class="card-title "><?= $row['nom_du_gite'] ?></h5>
                            <p class="card-text"><?= $row['disponibilite_gite'] ?></p>
                            <p class="card-text"><?= $row['description_gite'] ?></p>
                            <p class="card-text">Il y a <?= $row['nbr_de_chambres_gite'] ?> chambres.</p>
                            <p class="card-text">Il y a <?= $row['nbr_de_salles_de_bains_gite'] ?> salle(s) de bains</p>
                            <p class="card-text">La location a la semaine du logement est de  <?= $row['prix_gite'] ?> € </p>
                            <a href="updategite.php?id=<?=$row ['id_gite']?>" class="btn btn-warning">Mettre à jour</a>
                            <a href="deletegite.php?id=<?=$row ['id_gite']?>" class="btn btn-danger"Onclick="return confirm('Voulez-vous vraiment supprimer ce gîte?');">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    public function updateCRUD(){
        $db=$this->connect();
    }
    public function deleteCRUD(){
        $db=$this->connect();
    }
}

