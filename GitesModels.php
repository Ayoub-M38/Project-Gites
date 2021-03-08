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
                            <img class="img-fluid" src="<?php echo $row['img_gite'] ?>"
                                 alt="<?php echo $row['nom_gite'] ?>" title="<?php echo $row['nom_gite']; ?>">
                            <h5 class="font-weight-bold mt-3"> Nome : <?php echo $row['nom_gite'] ?></h5>
                            <p class="mt-3 lead"><?php echo $row['description_gite'] ?></p>
                            <h5 class="font-weight-bold mt-3">Prix : <?php echo $row['prix'] ?> EUR</h5>
                            <h5 class="font-weight-bold mt-3">Nombre de chambre : <?php echo $row['nbr_chambre'] ?></h5>
                            <h5 class="font-weight-bold mt-3">Nombre de sdb : <?php echo $row['nbr_sdb'] ?></h5>
                            <h5 class="font-weight-bold mt-3">Type de logement : <?php echo $row['type'] ?></h5>
                            <a class="btn btn-warning p-3 m-2 font-weight-bold"
                               href="reservation.php?id=<?= $row['id'] ?>">Réserver</a>
                        </div>
                    </div>
                <?php
                endforeach; ?>
            </div>
        </div>
        <?php
    }

    public function createGite()
    {


        if(isset($_POST['nom_gite'])){
            $this->nom_gite = $_POST['nom_gite'];
        }

        if(isset($_POST['description_gite'])){
            $this->description_gite = $_POST['description_gite'];
        }

        if(isset($_POST['img_gite'])){
            $this->img_gite = $_POST['img_gite'];
        }

        if(isset($_POST['nbr_chambre'])){
            $this->nbr_chambre = $_POST['nbr_chambre'];
        }

        if(isset($_POST['nbr_sdb'])){
            $this->nbr_sdb= $_POST['nbr_sdb'];
        }

        if(isset($_POST['zone_geo'])){
            $this->zone_geo = $_POST['zone_geo'];
        }

        if(isset($_POST['prix'])){
            $this->prix = $_POST['prix'];
        }

        if(isset($_POST['disponible'])){
            $this->disponible = $_POST['disponible'];
        }

        if(isset($_POST['date_arrivee'])){
            $this->date_arrivee = $_POST['date_arrivee'];
        }

        if(isset($_POST['date_depart'])){
            $this->date_depart = $_POST['date_depart'];
        }

        if(isset($_POST['type_gite'])){
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
            $req->execute();

        }

    }


