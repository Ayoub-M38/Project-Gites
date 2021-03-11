<?php
session_start();
include_once './views/partials/header.php';
include_once './views/partials/navbar.php';
require './Models/GitesModels.php';

$login = new GitesModels();
$login->adminLogin();

include_once './views/partials/footer.php';
