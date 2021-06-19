<?php

require_once 'src/classes.db/adm_db.php';

if (isset($_GET['limpar'])) {
    $_POST['filtro'] = null;
}

switch ($activePage) {
    case 'listaAlunos':

        if ($_POST['add']) {
            $retAdd = addAluno();
        }

        if ($_POST['edit']) {
            $retEdit = editAluno();
        }

        if ($_GET['delete']) {
            $retDelete = removeAluno($_GET['delete']);
        }

        if ($_POST['filtro']) {
            $aAlunos = filtraAlunos($_POST['filtro']);
            $aAlunos = (is_array($aAlunos) && $aAlunos) ? $aAlunos : "alunoNE";
        } else {
            $aAlunos = getAlunos();
            $aAlunos = (is_array($aAlunos) && $aAlunos) ? $aAlunos : "alunoNE";
        }
        require 'views/adm/alunos.php';
        break;

    case 'listaCursos':

        if ($_POST['add']) {
            $retAdd = addCurso();
        }

        if ($_POST['edit']) {
            $retEdit = editCurso();
        }

        if ($_GET['delete']) {
            $retDelete = removeCurso($_GET['delete']);
        }

        if ($_POST['filtro']) {
            $aCursos = filtraCursos($_POST['filtro']);
            $aCursos = (is_array($aCursos) && $aCursos) ? $aCursos : "cursoNE";
        } else {
            $aCursos = getCursos();
            $aCursos = (is_array($aCursos) && $aCursos) ? $aCursos : "cursoNE";
        }
        require 'views/adm/cursos.php';
        break;

    case 'listaProfissionais':

        if ($_POST['add']) {
            $retAdd = addProf();
        }

        if ($_POST['edit']) {
            $retEdit = editProf();
        }

        if ($_GET['delete']) {
            $retDelete = removeProf($_GET['delete']);
        }

        if ($_POST['filtro']) {
            $aProfs = filtraProf($_POST['filtro']);
            $aProfs = (is_array($aProfs) && $aProfs) ? $aProfs : "profNE";
        } else {
            $aProfs = getProf();
            $aProfs = (is_array($aProfs) && $aProfs) ? $aProfs : "profNE";
        }
        require 'views/adm/profissionais.php';
        break;

    case 'listaTurmas':

        if ($_POST['add']) {
            $retAdd = addTurma();
        }

        if ($_POST['edit']) {
            $retEdit = editTurma();
        }

        if ($_GET['delete']) {
            $retDelete = removeTurma($_GET['delete']);
        }

        if ($_POST['filtro']) {
            $aTurmas = filtraTurma($_POST['filtro']);
            $aTurmas = (is_array($aTurmas) && $aTurmas) ? $aTurmas : "turmaNE";
        } else {
            $aTurmas = getTurma();
            $aTurmas = (is_array($aTurmas) && $aTurmas) ? $aTurmas : "turmaNE";
        }
        require 'views/adm/turmas.php';
        break;

    case 'addDados':

        if ($_GET['edit']) {
            switch ($_GET['dado']) {
                case "Curso":
                    $eCurso = getCursoById($_GET['edit']);
                    break;

                case "Aluno":
                    $eAluno = getAlunoByRa($_GET['edit']);
                    break;

                case "Profissional":
                    $eProf = getProfByReg($_GET['edit']);
                    break;

                case "Turma":
                    $eTurma = getTurmaById($_GET['edit']);
                    break;
            }
        }

        require 'views/adm/add.php';
        break;

    case 'home':
        $activePage = 'listaAlunos';
        if ($_POST['add']) {
            $retAdd = addAluno();
        }

        if ($_POST['edit']) {
            $retEdit = editAluno();
        }

        if ($_GET['delete']) {
            $retDelete = removeAluno($_GET['delete']);
        }

        if ($_POST['filtro']) {
            $aAlunos = filtraAlunos($_POST['filtro']);
            $aAlunos = (is_array($aAlunos) && $aAlunos) ? $aAlunos : "alunoNE";
        } else {
            $aAlunos = getAlunos();
            $aAlunos = (is_array($aAlunos) && $aAlunos) ? $aAlunos : "alunoNE";
        }
        require 'views/adm/alunos.php';
        break;
}
