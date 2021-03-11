<?php

require 'Database.php';

class GitesModels extends Database
{
    private $nom_gite;
    private $description_gite;
    private $img_gite;
    private $nbr_chambre;
    private $nbr_sdb;
    private $zone_geo;
    private $prix;
    private $disponible;
    private $date_arrivee;
    private $date_depart;
    private $type_gite;

// Get All Gites
    public function getAllGites()
    {
        $db = $this->getPDO();
        $stmt = $db->prepare("SELECT * FROM `gites`INNER JOIN category_gites ON gites.gite_category = category_gites.id_category");
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>
        <div class="container text-center mt-5">
            <div class="row ">
                <?php
                foreach ($products as $row):
                    ?>
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card mt-3">
                            <img class="img-fluid card-img-top" src="<?php echo $row['img_gite'] ?>"
                                 alt="<?php echo $row['nom_gite'] ?>" title="<?php echo $row['nom_gite']; ?>">
                            <h5 class="font-weight-bold mt-3"><?php echo $row['nom_gite'] ?></h5>
                            <a class="btn btn-outline-warning p-3 m-2 font-weight-bold"
                               href="reservation.php?id=<?= $row['id'] ?>">Réserver</a>
                            <a class="btn btn-outline-danger p-3 m-2 font-weight-bold"
                               href="details_gite.php?id=<?= $row['id'] ?>">Plus d'info</a>
                        </div>
                    </div>
                <?php
                endforeach; ?>
            </div>
        </div>
        <?php
    }

// Create Gites
    public function createGite()
    {


        if (isset($_POST['nom_gite'])) {
            $this->nom_gite = $_POST['nom_gite'];
        }

        if (isset($_POST['description_gite'])) {
            $this->description_gite = $_POST['description_gite'];
        }

        if (isset($_POST['img_gite'])) {
            $this->img_gite = $_POST['img_gite'];
        }

        if (isset($_POST['nbr_chambre'])) {
            $this->nbr_chambre = $_POST['nbr_chambre'];
        }

        if (isset($_POST['nbr_sdb'])) {
            $this->nbr_sdb = $_POST['nbr_sdb'];
        }

        if (isset($_POST['zone_geo'])) {
            $this->zone_geo = $_POST['zone_geo'];
        }

        if (isset($_POST['prix'])) {
            $this->prix = $_POST['prix'];
        }

        if (isset($_POST['disponible'])) {
            $this->disponible = $_POST['disponible'];
        }

        if (isset($_POST['date_arrivee'])) {
            $this->date_arrivee = $_POST['date_arrivee'];
        }

        if (isset($_POST['date_depart'])) {
            $this->date_depart = $_POST['date_depart'];
        }

        if (isset($_POST['type_gite'])) {
            $this->type_gite = $_POST['type_gite'];
        }

        var_dump($_POST['nom_gite']);
        var_dump($_POST['description_gite']);
        var_dump($_POST['img_gite']);
        var_dump($_POST['prix']);
        var_dump($_POST['nbr_chambre']);
        var_dump($_POST['nbr_sdb']);
        var_dump($_POST['disponible']);
        var_dump($_POST['zone_geo']);
        var_dump($_POST['date_arrivee']);
        var_dump($_POST['date_depart']);
        var_dump($_POST['type_gite']);

        $db = $this->getPDO();
        $req = $db->prepare("INSERT INTO `gites`(`nom_gite`, `description_gite`, `img_gite`, `prix`, `nbr_chambre`, `nbr_sdb`, `disponible`, `zone_geo`, `date_arrivee`, `date_depart`, `gite_category`) 
                                        VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $req->bindParam(1, $this->nom_gite);
        $req->bindParam(2, $this->description_gite);
        $req->bindParam(3, $this->img_gite);
        $req->bindParam(4, $this->prix);
        $req->bindParam(5, $this->nbr_chambre);
        $req->bindParam(6, $this->nbr_sdb);
        $req->bindParam(7, $this->disponible);
        $req->bindParam(8, $this->zone_geo);
        $req->bindParam(9, $this->date_arrivee);
        $req->bindParam(10, $this->date_depart);
        $req->bindParam(11, $this->type_gite);
        $success = $req->execute();

        if ($success) {
            header('Location: index.php');
        } else {
            echo "<p class='alert-danger p-3'>Une erreur est survenue durant l'ajout du gite, merci de verifié tous les champs !</p>";
        }
    }

// Get more details
    public function gitDetails()
    {
        $db = $this->getPDO();
        $req = $db->prepare("SELECT * FROM gites INNER JOIN category_gites ON gites.gite_category = category_gites.id_category WHERE gites.id = ? ");
        $id = $_GET['id'];
        $req->bindParam(1, $id);
        $req->execute();
        $result = $req->fetch();
        ?>
        <div class="container mt-5">
            <h2 class="text-center text-warning"><?= $result['nom_gite'] ?></h2>
            <h3 class="text-center text-info">Type : <?= $result['type'] ?></h3>
            <div class="row mt-5">
                <div class="col-6">
                    <img width="100%" src="<?= $result['img_gite'] ?>" alt="<?= $result['nom_gite'] ?>"
                         title="<?= $result['nom_gite'] ?>"/>
                </div>
                <div class="col-6">
                    <p class="card-text"><b>Description : </b></p>
                    <p><?= $result['description_gite'] ?></p>
                    <p><b>Nombre de chambre : </b><b class="text-danger"><?= $result['nbr_chambre'] ?></b></p>
                    <p><b>Nombre de salle de bains : </b><b class="text-danger"><?= $result['nbr_sdb'] ?></b></p>
                    <p><b>Zone géographique : </b><b class="text-info"><?= $result['zone_geo'] ?></b></p>
                    <p><b>Prix à la semaine : </b><b class="text-success"><?= $result['prix'] ?> €</b></p>

                    <?php

                    $dispo = $result['disponible'];
                    if ($dispo == false) {
                        echo $dispo = "NON";
                    } else {
                        echo $dispo = "OUI";
                    }
                    ?>

                    <?php
                    $date_a = new DateTime($result['date_arrivee']);
                    $date_d = new DateTime($result['date_depart']);
                    ?>
                    <p><b>Date d'arrivée : </b></p>
                    <p class="alert-success p-2"><?= $date_a->format('d-m-Y à H:i:s') ?></p>

                    <p><b>Date de depart : </b></p>
                    <p class="alert-info p-2"> <?= $date_d->format('d-m-Y à H:i:s') ?></p>
                    <a href="reservation.php?id=<?= $result['id'] ?>" class="btn btn-outline-info">RESERVER</a>
                    <a href="index.php" class="btn btn-outline-danger">RETOUR</a>
                </div>
            </div>
        </div>
        <?php
    }

// admin dashboard
    public function adminGites()
    {
        $db = $this->getPDO();
        $stmt = $db->prepare("SELECT * FROM `gites`INNER JOIN category_gites ON gites.gite_category = category_gites.id_category");
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>
        <div class="container text-center mt-5">
            <div class="row ">
                <?php
                foreach ($products as $row):
                    ?>
                    <div class="col-lg-4 d-flex align-items-stretch ">
                        <div class="card mt-3">
                            <img class="img-fluid card-img-top" src="<?php echo $row['img_gite'] ?>"
                                 alt="<?php echo $row['nom_gite'] ?>" title="<?php echo $row['nom_gite']; ?>">
                            <h5 class="font-weight-bold mt-3"> Nom : <?php echo $row['nom_gite'] ?></h5>
                            <p class="mt-3 lead"><?php echo $row['description_gite'] ?></p>
                            <h5 class="font-weight-bold mt-3">Prix : <?php echo $row['prix'] ?> EUR</h5>
                            <h5 class="font-weight-bold mt-3">Nombre de chambre : <?php echo $row['nbr_chambre'] ?></h5>
                            <h5 class="font-weight-bold mt-3">Nombre de sdb : <?php echo $row['nbr_sdb'] ?></h5>
                            <h5 class="font-weight-bold mt-3">Type de logement : <?php echo $row['type'] ?></h5>
                            <a class="btn btn-danger p-3 m-2 font-weight-bold"
                               href="../delete_gite.php?id=<?= $row['id'] ?>">Supprimer</a>
                            <a class="btn btn-warning p-3 m-2 font-weight-bold"
                               href="../details_gite.php?id=<?= $row['id'] ?>">Détails</a>
                            <a class="btn btn-info p-3 m-2 font-weight-bold"
                               href="../update.php?id=<?= $row['id'] ?>">Mettre a jour</a>
                        </div>
                    </div>
                <?php
                endforeach; ?>
            </div>
        </div>

        <?php
    }

// login
    public function adminLogin()
    {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];

            $login = new GitesModels();
            $db = $login->getPDO();

            $sql = "SELECT * FROM admin WHERE email_admin = '$email'";
            $result = $db->prepare($sql);
            $result->execute();


            if ($result->rowCount() > 0) {
                $data = $result->fetchAll();
                if (password_verify($pass, $data[0]['password_admin'])) {
                    echo '<div class="container text-center font-weight-bold alert alert-success mt-5">Connexion effectué</div>';
                    $_SESSION['email'] = $email;
                    $_SESSION['connecter'] = true;
                    header('Location: admin.php');
                } else {
                    echo '<div class="container text-center font-weight-bold alert alert-danger mt-5">Erreur email et mot passe pas bon</div>';
                }
            } else {
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO admin (email_admin, password_admin) VALUES ('$email', '$pass')";
                $req = $db->prepare($sql);
                $req->execute();
                echo '<div class="container text-center font-weight-bold alert alert-success mt-5">Enregistrement effectué</div>';

            }
        }

        ?>

        <div class="container mt-5 col-lg-4">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Mot de pass</label>
                    <input type="password" name="password" class="form-control" placeholder="Mot de pass">
                </div>
                <button type="submit" value="connexion" name="submit" class="btn btn-primary">Connexion</button>
            </form>
        <?php
    }

// disable gite after reservation
    public function deactivateGite()
    {

    }

// Search form
    public function SearchGites()
    {

    }
}
