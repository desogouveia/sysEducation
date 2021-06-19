<?php

include 'src/classes.db/db_connect.php';

function getAluno($codUser){
    $params[':table'] = "aluno";
    $params[':codUser'] = $codUser;
    $sql = 'SELECT * FROM :table WHERE cod_login = ":codUser"';
    return db_query($sql, 'select', $params);
}

function getCurso($ra){
    $params[':ra'] = $ra;
    $sql = 'SELECT turma.cod_curso, cursos.desc_curso, cursos.long_curso FROM (aluno INNER JOIN turma ON aluno.cod_turma = turma.cod_turma ) 
            INNER JOIN cursos ON turma.cod_curso = cursos.cod_curso
            WHERE ra = ":ra"
            ';

    return db_query($sql, 'select', $params);
}

function getTurma($ra){
    $params[':ra'] = $ra;
    $sql = 'SELECT turma.desc_turma, turma.sem_turma, profissionais.nome FROM (aluno INNER JOIN turma ON aluno.cod_turma = turma.cod_turma ) 
            INNER JOIN profissionais ON turma.cod_prof = profissionais.registro
            WHERE ra = ":ra"
            ';

    return db_query($sql, 'select', $params);
}