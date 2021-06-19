<?php

include "src/classes.db/aluno_db.php";

$userName = $_SESSION['user'];

$alunoLogado = getAluno($_SESSION['codUser'])[0];

$cursoLogado = getCurso($alunoLogado['ra'])[0];

$turmaLogada = getTurma($alunoLogado['ra'])[0];

$activePage = ($activePage) ? $activePage : "home";

switch ($activePage) {
    case 'curso':
        require 'views/aluno/curso.php';
        break;

    default:
        require 'views/aluno/home.php';
        break;
}