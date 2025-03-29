<?php

include "../includes/base.php";

// unset($_SESSION["est_connecte"]); version douce où il reste des éléments liés à la session

//détruit l'entièreté de la session
session_destroy();

header("location: connexion.php");