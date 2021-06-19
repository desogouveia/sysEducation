<?php

include 'src/classes.db/db_connect.php';

function getProf($reg){
    $params[':table'] = "profissionais";
    $params[':registro'] = $reg;
    $sql = 'SELECT * FROM :table WHERE registro = ":registro"';
    return db_query($sql, 'select', $params);
}

function getTurmas($reg){
    $params[':registro'] = $reg;
    $sql = 'SELECT profissionais.registro, turma.cod_turma, turma.desc_turma, turma.sem_turma, cursos.desc_curso 
            FROM (profissionais INNER JOIN turma ON profissionais.registro = turma.cod_prof ) 
            INNER JOIN cursos ON turma.cod_curso = cursos.cod_curso
            WHERE turma.cod_prof = ":registro"
            ';

    return db_query($sql, 'select', $params);
}

function filtraTurmas($filtro, $reg){

    $params[':table'] = "aluno";
    $params[':filtro'] = $filtro;
    $params[':registro'] = $reg;

    if(is_numeric($filtro)){
        $sql = 'SELECT profissionais.registro, turma.cod_turma, turma.desc_turma, turma.sem_turma, cursos.desc_curso 
            FROM (profissionais INNER JOIN turma ON profissionais.registro = turma.cod_prof ) 
            INNER JOIN cursos ON turma.cod_curso = cursos.cod_curso
            WHERE turma.cod_prof = ":registro" AND turma.cod_turma = ":filtro"
            ';
    }else{
        $sql = 'SELECT profissionais.registro, turma.cod_turma, turma.desc_turma, turma.sem_turma, cursos.desc_curso 
            FROM (profissionais INNER JOIN turma ON profissionais.registro = turma.cod_prof ) 
            INNER JOIN cursos ON turma.cod_curso = cursos.cod_curso
            WHERE turma.cod_prof = ":registro" AND turma.desc_turma LIKE \'%:filtro%\' OR cursos.desc_curso LIKE \'%:filtro%\'
            ';
    }

    return db_query($sql, 'select', $params);
}