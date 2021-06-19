<?php

include 'src/classes.db/db_connect.php';

// SEÇÃO DE OPERAÇÕES DE ALUNOS

function getAlunos(){
    $params[':table'] = "aluno";
    $sql = 'SELECT * FROM :table';
    return db_query($sql, 'select', $params);
}

function getAlunoByRa($ra){
    $params[':table'] = "aluno";
    $params[':ra'] = $ra;
    $sql = 'SELECT * FROM :table WHERE ra = ":ra"';
    return db_query($sql, 'select', $params);
}

function filtraAlunos($filtro){

    $params[':table'] = "aluno";
    $params[':filtro'] = $filtro;

    if(is_numeric($filtro)){
        $sql = 'SELECT * FROM :table WHERE ra = :filtro';
    }else{
        $sql = 'SELECT * FROM :table WHERE nome LIKE \'%:filtro%\'';
    }

    return db_query($sql, 'select', $params);
}

function nextRa(){
    $params[':table'] = "aluno";
    $sql = 'SELECT MAX(ra) FROM :table';
    return db_query($sql, 'select', $params)[0]['MAX(ra)'] + 1;
}

function addAluno(){

    if(empty($_POST['nomeAluno'])){
        return 0;
    }

    $params[':table'] = "aluno";
    $params[':nome'] = ($_POST['nomeAluno']) ? $_POST['nomeAluno'] : "";
    $params[':cpf'] = ($_POST['cpfAluno']) ? $_POST['cpfAluno'] : "";
    $params[':rg'] = ($_POST['rgAluno']) ? $_POST['rgAluno'] : "";
    $params[':telefone'] = ($_POST['telAluno']) ? $_POST['telAluno'] : "";
    $params[':email'] = ($_POST['emailAluno']) ? $_POST['emailAluno'] : "";
    $params[':data_matricula'] = ($_POST['dataMat']) ? $_POST['dataMat'] : "";
    $params[':cod_turma'] = ($_POST['cTurma']) ? $_POST['cTurma'] : "";    
    $params[':cod_login'] = ($_POST['login']) ? $_POST['login'] : "";

    $sql = 'INSERT INTO :table (nome, cpf, rg, telefone, email, data_matricula, cod_turma, cod_login) 
            VALUES (":nome", ":cpf", ":rg", ":telefone", ":email", ":data_matricula", ":cod_turma", ":cod_login") ';

    $insert = db_query($sql, 'insert', $params);

    return $insert;
}

function editAluno(){

    if(empty($_POST['nomeAluno'])){
        return 0;
    }
    
    $params[':table'] = "aluno";
    $params[':ra'] = ($_POST['raAluno']) ? $_POST['raAluno'] : "";
    $params[':nome'] = ($_POST['nomeAluno']) ? $_POST['nomeAluno'] : "";
    $params[':cpf'] = ($_POST['cpfAluno']) ? $_POST['cpfAluno'] : "";
    $params[':rg'] = ($_POST['rgAluno']) ? $_POST['rgAluno'] : "";
    $params[':telefone'] = ($_POST['telAluno']) ? $_POST['telAluno'] : "";
    $params[':email'] = ($_POST['emailAluno']) ? $_POST['emailAluno'] : "";
    $params[':data_matricula'] = ($_POST['dataMat']) ? $_POST['dataMat'] : "";
    $params[':cod_turma'] = ($_POST['cTurma']) ? $_POST['cTurma'] : "";   
    $params[':cod_login'] = ($_POST['login']) ? $_POST['login'] : "";

    $sql = 'UPDATE :table SET   nome = ":nome", 
                                cpf = ":cpf", 
                                rg = ":rg", 
                                telefone = ":telefone", 
                                email = ":email", 
                                data_matricula = ":data_matricula", 
                                cod_turma = ":cod_turma",
                                cod_login = ":cod_login"
                                WHERE ra = ":ra"';

    $update = db_query($sql, 'update', $params);

    return $params;
}

function removeAluno($ra){

    $params[':table'] = "aluno";
    $params[':ra'] = $ra;

    $sql = 'DELETE FROM :table WHERE ra = ":ra"';

    $delete = db_query($sql, 'delete', $params);

    return $delete;
}

// SEÇÃO DE OPERAÇÕES DE CURSOS

function getCursos(){
    $params[':table'] = "cursos";
    $sql = 'SELECT * FROM :table';
    return db_query($sql, 'select', $params);
}

function getCursoById($id){
    $params[':table'] = "cursos";
    $params[':cod_curso'] = $id;
    $sql = 'SELECT * FROM :table WHERE cod_curso = ":cod_curso"';
    return db_query($sql, 'select', $params);
}

function filtraCursos($filtro){

    $params[':table'] = "cursos";
    $params[':filtro'] = $filtro;

    if(is_numeric($filtro)){
        $sql = 'SELECT * FROM :table WHERE cod_curso = :filtro';
    }else{
        $sql = 'SELECT * FROM :table WHERE desc_curso LIKE \'%:filtro%\'';
    }

    return db_query($sql, 'select', $params);
}

function nextIdCurso(){
    $params[':table'] = "cursos";
    $sql = 'SELECT MAX(cod_curso) FROM :table';
    return db_query($sql, 'select', $params)[0]['MAX(cod_curso)'] + 1;
}

function addCurso(){

    if(empty($_POST['nomeCurso']) || empty($_POST['descCurso'])){
        return 0;
    }
    $params[':table'] = "cursos";
    $params[':desc_curso'] = ($_POST['nomeCurso']) ? $_POST['nomeCurso'] : "";
    $params[':long_curso'] = ($_POST['descCurso']) ? $_POST['descCurso'] : "";

    $sql = 'INSERT INTO :table (desc_curso, long_curso) 
            VALUES (":desc_curso", ":long_curso")';

    $insert = db_query($sql, 'insert', $params);

    return $insert;
}

function editCurso(){

    if(empty($_POST['nomeCurso']) || empty($_POST['descCurso'])){
        return 0;
    }
    $params[':table'] = "cursos";
    $params[':cod_curso'] = ($_POST['idCurso']) ? $_POST['idCurso'] : "";
    $params[':desc_curso'] = ($_POST['nomeCurso']) ? $_POST['nomeCurso'] : "";
    $params[':long_curso'] = ($_POST['descCurso']) ? $_POST['descCurso'] : "";

    $sql = 'UPDATE :table SET desc_curso = ":desc_curso", long_curso = ":long_curso"
            WHERE cod_curso = ":cod_curso"';

    $update = db_query($sql, 'update', $params);

    return $update;
}

function removeCurso($id){

    $params[':table'] = "cursos";
    $params[':cod_curso'] = $id;

    $sql = 'DELETE FROM :table WHERE cod_curso = ":cod_curso"';

    $delete = db_query($sql, 'delete', $params);

    return $delete;
}

// SEÇÃO DE OPERAÇÕES DE PROFISSIONAIS

function getProf(){
    $params[':table'] = "profissionais";
    $sql = 'SELECT * FROM :table';
    return db_query($sql, 'select', $params);
}

function getProfByReg($reg){
    $params[':table'] = "profissionais";
    $params[':registro'] = $reg;
    $sql = 'SELECT * FROM :table WHERE registro = ":registro"';
    return db_query($sql, 'select', $params);
}

function filtraProf($filtro){

    $params[':table'] = "profissionais";
    $params[':filtro'] = $filtro;

    if(is_numeric($filtro)){
        $sql = 'SELECT * FROM :table WHERE registro = :filtro';
    }else{
        $sql = 'SELECT * FROM :table WHERE nome LIKE \'%:filtro%\'';
    }

    return db_query($sql, 'select', $params);
}

function nextRegProf(){
    $params[':table'] = "profissionais";
    $sql = 'SELECT MAX(registro) FROM :table';
    return db_query($sql, 'select', $params)[0]['MAX(registro)'] + 1;
}

function addProf(){

    if(empty($_POST['nomeProf'])){
        return 0;
    }

    $params[':table'] = "profissionais";
    $params[':nome'] = ($_POST['nomeProf']) ? $_POST['nomeProf'] : "";
    $params[':cpf'] = ($_POST['cpfProf']) ? $_POST['cpfProf'] : "";
    $params[':rg'] = ($_POST['rgProf']) ? $_POST['rgProf'] : "";
    $params[':telefone'] = ($_POST['telProf']) ? $_POST['telProf'] : "";
    $params[':email'] = ($_POST['emailProf']) ? $_POST['emailProf'] : "";
    $params[':data_admissao'] = ($_POST['admissao']) ? $_POST['admissao'] : "";
    $params[':formacao'] = ($_POST['formacao']) ? $_POST['formacao'] : "";
    $params[':cod_login'] = ($_POST['login']) ? $_POST['login'] : "";

    $sql = 'INSERT INTO :table (nome, cpf, rg, telefone, email, data_admissao, formacao, cod_login) 
            VALUES (":nome", ":cpf", ":rg", ":telefone", ":email", ":data_admissao", ":formacao", ":cod_login")';

    $insert = db_query($sql, 'insert', $params);

    return $insert;
}

function editProf(){

    if(empty($_POST['nomeProf'])){
        return 0;
    }

    $params[':table'] = "profissionais";
    $params[':registro'] = ($_POST['regProf']) ? $_POST['regProf'] : "";
    $params[':nome'] = ($_POST['nomeProf']) ? $_POST['nomeProf'] : "";
    $params[':cpf'] = ($_POST['cpfProf']) ? $_POST['cpfProf'] : "";
    $params[':rg'] = ($_POST['rgProf']) ? $_POST['rgProf'] : "";
    $params[':telefone'] = ($_POST['telProf']) ? $_POST['telProf'] : "";
    $params[':email'] = ($_POST['emailProf']) ? $_POST['emailProf'] : "";
    $params[':data_admissao'] = ($_POST['admissao']) ? $_POST['admissao'] : "";
    $params[':formacao'] = ($_POST['formacao']) ? $_POST['formacao'] : "";
    $params[':cod_login'] = ($_POST['login']) ? $_POST['login'] : "";

    $sql = 'UPDATE :table SET   nome = ":nome", 
                                cpf = ":cpf",
                                rg = ":rg",
                                telefone = ":telefone",
                                email = ":email",
                                data_admissao = ":data_admissao",
                                formacao = ":formacao",
                                cod_login = ":cod_login"
            WHERE registro = ":registro"';

    $update = db_query($sql, 'update', $params);

    return $update;
}

function removeProf($reg){

    $params[':table'] = "profissionais";
    $params[':registro'] = $reg;

    $sql = 'DELETE FROM :table WHERE registro = ":registro"';

    $delete = db_query($sql, 'delete', $params);

    return $delete;
}

// SEÇÃO DE OPERAÇÕES DE TURMAS

function getTurma(){
    $params[':table'] = "turma";
    $sql = 'SELECT turma.cod_turma, turma.desc_turma, turma.sem_turma, cursos.desc_curso, profissionais.nome
            FROM (:table INNER JOIN profissionais ON turma.cod_prof = profissionais.registro) 
            INNER JOIN cursos ON turma.cod_curso = cursos.cod_curso
            ';

    return db_query($sql, 'select', $params);
}

function getTurmaById($id){
    $params[':table'] = "turma";
    $params[':id'] = $id;
    $sql = 'SELECT turma.cod_turma, turma.desc_turma, turma.sem_turma, turma.data_ini, turma.data_fim, 
            turma.cod_curso, turma.cod_prof, cursos.desc_curso, profissionais.nome
            FROM (:table INNER JOIN profissionais ON turma.cod_prof = profissionais.registro) 
            INNER JOIN cursos ON turma.cod_curso = cursos.cod_curso
            WHERE turma.cod_turma = ":id";
            ';
    return db_query($sql, 'select', $params);
}

function filtraTurma($filtro){

    $params[':table'] = "turma";
    $params[':filtro'] = $filtro;

    if(is_numeric($filtro)){
        $sql = 'SELECT * FROM :table WHERE cod_turma = :filtro';
    }else{
        $sql = 'SELECT * FROM :table WHERE desc_turma LIKE \'%:filtro%\'';
    }

    return db_query($sql, 'select', $params);
}

function nextIdTurma(){
    $params[':table'] = "turma";
    $sql = 'SELECT MAX(cod_turma) FROM :table';
    return db_query($sql, 'select', $params)[0]['MAX(cod_turma)'] + 1;
}

function addTurma(){

    if(empty($_POST['nomeTurma'])){
        return 0;
    }

    $params[':table'] = "turma";
    $params[':desc_turma'] = ($_POST['nomeTurma']) ? $_POST['nomeTurma'] : "";
    $params[':sem_turma'] = ($_POST['semTurma']) ? $_POST['semTurma'] : "";
    $params[':data_ini'] = ($_POST['dtIni']) ? $_POST['dtIni'] : "";
    $params[':data_fim'] = ($_POST['dtFim']) ? $_POST['dtFim'] : "";
    $params[':cod_curso'] = ($_POST['cursoTurma']) ? $_POST['cursoTurma'] : "";
    $params[':cod_prof'] = ($_POST['profTurma']) ? $_POST['profTurma'] : "";

    $sql = 'INSERT INTO :table (desc_turma, sem_turma, data_ini, data_fim, cod_curso, cod_prof) 
            VALUES (":desc_turma", ":sem_turma", ":data_ini", ":data_fim", ":cod_curso", ":cod_prof")';

    $insert = db_query($sql, 'insert', $params);

    return $insert;
}

function editTurma(){

    if(empty($_POST['nomeTurma'])){
        return 0;
    }

    $params[':table'] = "turma";
    $params[':cod_turma'] = ($_POST['idTurma']) ? $_POST['idTurma'] : "";
    $params[':desc_turma'] = ($_POST['nomeTurma']) ? $_POST['nomeTurma'] : "";
    $params[':sem_turma'] = ($_POST['semTurma']) ? $_POST['semTurma'] : "";
    $params[':data_ini'] = ($_POST['dtIni']) ? $_POST['dtIni'] : "";
    $params[':data_fim'] = ($_POST['dtFim']) ? $_POST['dtFim'] : "";
    $params[':cod_curso'] = ($_POST['cursoTurma']) ? $_POST['cursoTurma'] : "";
    $params[':cod_prof'] = ($_POST['profTurma']) ? $_POST['profTurma'] : "";

    $sql = 'UPDATE :table SET   desc_turma = ":desc_turma", 
                                sem_turma = ":sem_turma",
                                data_ini = ":data_ini",
                                data_fim = ":data_fim",
                                cod_curso = ":cod_curso",
                                cod_prof = ":cod_prof"
            WHERE cod_turma = ":cod_turma"';

    $update = db_query($sql, 'update', $params);

    return $update;
}

function removeTurma($id){

    $params[':table'] = "turma";
    $params[':cod_turma'] = $id;

    $sql = 'DELETE FROM :table WHERE cod_turma = ":cod_turma"';

    $delete = db_query($sql, 'delete', $params);

    return $delete;
}

// SEÇÃO DE OPERAÇÕES DE LOGIN

function getLogin($tipo){
    $params[':table'] = "login";
    $params[':tipo'] = $tipo;

    $sql = 'SELECT * FROM :table
            WHERE tipo = ":tipo"';
    return db_query($sql, 'select', $params);
}

?>