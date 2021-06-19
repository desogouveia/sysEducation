<?php

include "src/classes.db/prof_db.php";

$profLogado = getProf("1")[0];

$turmasLogado = getTurmas("1");

if ($_POST['filtro']) {
    $turmasLogado = filtraTurmas($_POST['filtro'], "1");
} else {
    $turmasLogado = getTurmas("1");
}

switch ($activePage) {
    case 'turmas':
        require 'views/professor/turmas.php';
        break;

    case 'avisos':
        require 'views/professor/avisos.php';
        break;

    case 'notas':
        require 'views/professor/notas.php';
        break;

    default:
        require 'views/professor/home.php';
        break;
}
