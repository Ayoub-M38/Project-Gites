<?php

include_once './views/partials/header.php';
include_once './views/partials/navbar.php';

require './Models/GitesModels.php';

$gitById = new GitesModels();
$gitById->gitDetails();

include_once './views/partials/footer.php';