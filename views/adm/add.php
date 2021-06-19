<?php

$dataTitle = $_GET['dado'];

?>

<div class="container text-center" id="divMain">

    <div class="row text-center">
        <p class="mt-4 fs-1">
            <?php
            echo (!empty($eCurso) || !empty($eAluno) || !empty($eProf) || !empty($eTurma)) ? "Editar " : "Adicionar ";
            echo $dataTitle;
            ?>
        </p>
    </div>

    <?php
    switch ($dataTitle) {
        case "Aluno":

            if ($eAluno) {
                $eAluno = $eAluno[0];
                $edit = true;
            } else {
                $dataAtual = date("Y-m-d");
                $raAluno = nextRa();
                $edit = false;
            }

            $aTurmas = getTurma();
            $aLogin = getLogin(3);
    ?>

            <div class="row justify-contents-center mt-4 text-center">
                <form action="index.php?page=listaAlunos" class="row mx-auto" method="post">
                    <div class="col-3 mb-3">
                        <label for="raInput" class="form-label">RA</label>
                        <input type="text" class="form-control text-center" id="raInput" readonly name="raAluno" value="<?php echo ($edit) ? $eAluno['ra'] : $raAluno ?>">
                    </div>
                    <div class="col-9 mb-3">
                        <label for="nomeInput" class="form-label">Nome do Aluno</label>
                        <input type="text" class="form-control text-center" id="nomeInput" placeholder="Digite aqui o Nome do aluno..." name="nomeAluno" value="<?php echo ($edit) ? $eAluno['nome'] : '' ?>">
                    </div>
                    <div class="col-3 mt-3 mb-3 mx-auto">
                        <label for="cpfInput" class="form-label">CPF</label>
                        <input type="text" class="form-control text-center" id="cpfInput" placeholder="Digite aqui o CPF do aluno..." name="cpfAluno" value="<?php echo ($edit) ? $eAluno['cpf'] : '' ?>">
                    </div>
                    <div class="col-3 mt-3 mb-3 mx-auto">
                        <label for="rgInput" class="form-label">RG</label>
                        <input type="text" class="form-control text-center" id="rgInput" placeholder="Digite aqui o RG do aluno..." name="rgAluno" value="<?php echo ($edit) ? $eAluno['rg'] : '' ?>">
                    </div>
                    <div class="col-3 mt-3 mb-3 mx-auto">
                        <label for="telInput" class="form-label">Telefone</label>
                        <input type="tel" class="form-control text-center" id="telInput" placeholder="Digite aqui o Telefone do aluno..." name="telAluno" value="<?php echo ($edit) ? $eAluno['telefone'] : '' ?>">
                    </div>
                    <div class="col-3 mt-3 mb-3 mx-auto">
                        <label for="emailInput" class="form-label">E-Mail</label>
                        <input type="email" class="form-control text-center" id="emailInput" placeholder="Digite aqui o E-Mail do aluno..." name="emailAluno" value="<?php echo ($edit) ? $eAluno['email'] : '' ?>">
                    </div>
                    <div class="row mx-auto">
                        <div class="col-4 mt-3 mb-3 mx-auto">
                            <label for="dataInput" class="form-label">Data de Matrícula</label>
                            <input type="date" class="form-control text-center" id="dataInput" name="dataMat" value="<?php echo ($edit) ? $eAluno['data_matricula'] : $dataAtual ?>">
                        </div>
                        <div class="col-4 mt-3 mb-3 mx-auto">
                            <label for="turmaInput" class="form-label">Turma</label>
                            <select class="form-control" id="turmaInput" name="cTurma">
                                <?php
                                foreach ($aTurmas as $turma) {
                                ?>
                                    <option value="<?php echo $turma['cod_turma'] ?>" <?php echo ($turma['cod_turma'] == $eAluno['cod_turma']) ? "selected" : "" ?>>
                                        <?php echo $turma['desc_turma'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-4 mt-3 mb-3 mx-auto">
                            <label for="turmaInput" class="form-label">Usuário</label>
                            <select class="form-control" id="turmaInput" name="login">
                                <?php
                                foreach ($aLogin as $login) {
                                ?>
                                    <option value="<?php echo $login['id'] ?>" <?php echo ($login['id'] == $eAluno['cod_login']) ? "selected" : "" ?>>
                                        <?php echo $login['user'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col d-flex justify-content-end">
                            <input type="submit" class="btn btn-outline-danger" value="Cancelar" formaction="index.php?page=listaAlunos">
                        </div>
                        <div class="col d-flex justify-content-start">

                            <?php if ($edit) { ?>
                                <input type="hidden" value="true" name="edit">
                                <input type="submit" class="btn btn-outline-success" value="Confirmar">
                            <?php } else { ?>
                                <input type="hidden" value="true" name="add">
                                <input type="submit" class="btn btn-outline-success" value="Adicionar">
                            <?php } ?>

                        </div>
                    </div>
                </form>
            </div>

        <?php
            break;

        case "Curso":

            if ($eCurso) {
                $eCurso = $eCurso[0];
                $edit = true;
            } else {
                $idCurso = nextIdCurso();
                $edit = false;
            }
        ?>

            <div class="row justify-contents-center mt-4 text-center">
                <form action="index.php?page=listaCursos" class="row mx-auto" method="post">
                    <div class="col-3 mb-3">
                        <label for="idInput" class="form-label">ID do Curso</label>
                        <input type="text" class="form-control text-center" id="idInput" value="<?php echo ($edit) ? $eCurso['cod_curso'] : $idCurso; ?>" readonly name="idCurso">
                    </div>
                    <div class="col-9 mb-3">
                        <label for="alunoInput" class="form-label">Nome do Curso</label>
                        <input type="text" class="form-control text-center" id="alunoInput" placeholder="Digite aqui o nome do novo curso..." name="nomeCurso" value="<?php echo ($edit) ? $eCurso['desc_curso'] : '' ?>">
                    </div>
                    <div class="row mt-3 mb-3 mx-auto">
                        <label for="descInput" class="form-label">Descrição Completa do Curso</label>
                        <textarea class="form-control" id="descInput" rows="6" name="descCurso"><?php echo ($edit) ? $eCurso['long_curso'] : '' ?></textarea>
                    </div>
                    <div class="row mx-auto">
                        <div class="col d-flex justify-content-end">
                            <input type="submit" class="btn btn-outline-danger" value="Cancelar" formaction="index.php?page=listaCursos">
                        </div>
                        <div class="col d-flex justify-content-start">

                            <?php if ($edit) { ?>
                                <input type="hidden" value="true" name="edit">
                                <input type="submit" class="btn btn-outline-success" value="Confirmar">
                            <?php } else { ?>
                                <input type="hidden" value="true" name="add">
                                <input type="submit" class="btn btn-outline-success" value="Adicionar">
                            <?php } ?>

                        </div>
                    </div>
                </form>
            </div>

        <?php
            break;

        case "Profissional":
            if ($eProf) {
                $eProf = $eProf[0];
                $edit = true;
            } else {
                $dataAtual = date("Y-m-d");
                $regProf = nextRegProf();
                $edit = false;
            }

            $aLogin = getLogin(2);
        ?>

            <div class="row justify-contents-center mt-4 text-center">
                <form action="index.php?page=listaProfissionais" class="row mx-auto" method="post">
                    <div class="col-3 mb-3">
                        <label for="regInput" class="form-label">Registro</label>
                        <input type="text" class="form-control text-center" id="regInput" readonly name="regProf" value="<?php echo ($edit) ? $eProf['registro'] : $regProf ?>">
                    </div>
                    <div class="col-9 mb-3">
                        <label for="nomeInput" class="form-label">Nome do Profissional</label>
                        <input type="text" class="form-control text-center" id="nomeInput" placeholder="Digite aqui o Nome do profissional..." name="nomeProf" value="<?php echo ($edit) ? $eProf['nome'] : '' ?>">
                    </div>
                    <div class="col-3 mt-3 mb-3 mx-auto">
                        <label for="cpfInput" class="form-label">CPF</label>
                        <input type="text" class="form-control text-center" id="cpfInput" placeholder="Digite aqui o CPF do profissional..." name="cpfProf" value="<?php echo ($edit) ? $eProf['cpf'] : '' ?>">
                    </div>
                    <div class="col-3 mt-3 mb-3 mx-auto">
                        <label for="rgInput" class="form-label">RG</label>
                        <input type="text" class="form-control text-center" id="rgInput" placeholder="Digite aqui o RG do profissional..." name="rgProf" value="<?php echo ($edit) ? $eProf['rg'] : '' ?>">
                    </div>
                    <div class="col-3 mt-3 mb-3 mx-auto">
                        <label for="telInput" class="form-label">Telefone</label>
                        <input type="tel" class="form-control text-center" id="telInput" placeholder="Digite aqui o Telefone do profissional..." name="telProf" value="<?php echo ($edit) ? $eProf['telefone'] : '' ?>">
                    </div>
                    <div class="col-3 mt-3 mb-3 mx-auto">
                        <label for="emailInput" class="form-label">E-Mail</label>
                        <input type="email" class="form-control text-center" id="emailInput" placeholder="Digite aqui o E-Mail do profissional..." name="emailProf" value="<?php echo ($edit) ? $eProf['email'] : '' ?>">
                    </div>
                    <div class="row mx-auto">
                        <div class="col-4 mt-3 mb-3 mx-auto">
                            <label for="dataInput" class="form-label">Data de Admissão</label>
                            <input type="date" class="form-control text-center" id="dataInput" placeholder="Digite aqui o E-Mail do profissional..." name="admissao" value="<?php echo ($edit) ? $eProf['data_admissao'] : $dataAtual ?>">
                        </div>
                        <div class="col-4 mt-3 mb-3 mx-auto">
                            <label for="turmaInput" class="form-label">Formação</label>
                            <input type="text" class="form-control text-center" id="dataInput" placeholder="Digite aqui o E-Mail do profissional..." name="formacao" value="<?php echo ($edit) ? $eProf['formacao'] : '' ?>">
                        </div>
                        <div class="col-4 mt-3 mb-3 mx-auto">
                            <label for="turmaInput" class="form-label">Usuário</label>
                            <select class="form-control" id="turmaInput" name="login">
                                <?php
                                foreach ($aLogin as $login) {
                                ?>
                                    <option value="<?php echo $login['id'] ?>" <?php echo ($login['id'] == $eProf['cod_login']) ? "selected" : "" ?>>
                                        <?php echo $login['user'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col d-flex justify-content-end">
                            <input type="submit" class="btn btn-outline-danger" value="Cancelar" formaction="index.php?page=listaProfissionais">
                        </div>
                        <div class="col d-flex justify-content-start">

                            <?php if ($edit) { ?>
                                <input type="hidden" value="true" name="edit">
                                <input type="submit" class="btn btn-outline-success" value="Confirmar">
                            <?php } else { ?>
                                <input type="hidden" value="true" name="add">
                                <input type="submit" class="btn btn-outline-success" value="Adicionar">
                            <?php } ?>

                        </div>
                    </div>
                </form>
            </div>

        <?php
            break;

        case "Turma":
            if ($eTurma) {
                $eTurma = $eTurma[0];
                $edit = true;
            } else {
                $dataAtual = date("Y-m-d");
                $idTurma = nextIdTurma();
                $edit = false;
            }
            $aCurso = getCursos();
            $aProf = getProf();
        ?>

            <div class="row justify-contents-center mt-4 text-center">
                <form action="index.php?page=listaTurmas" class="row mx-auto" method="post">
                    <div class="col-3 mb-3">
                        <label for="idInput" class="form-label">ID</label>
                        <input type="text" class="form-control text-center" id="idInput" readonly name="idTurma" value="<?php echo ($edit) ? $eTurma['cod_turma'] : $idTurma ?>">
                    </div>
                    <div class="col-9 mb-3">
                        <label for="nomeInput" class="form-label">Nome da Turma</label>
                        <input type="text" class="form-control text-center" id="nomeInput" placeholder="Digite aqui o Nome da turma..." name="nomeTurma" value="<?php echo ($edit) ? $eTurma['desc_turma'] : '' ?>">
                    </div>
                    <div class="col-4 mt-3 mb-3 mx-auto">
                        <label for="semInput" class="form-label">Semestre</label>
                        <select class="form-control" id="semInput" name="semTurma">
                            <option value="1" <?php echo ($eTurma['sem_turma'] == 1) ? "selected" : ""; ?>>1</option>
                            <option value="2" <?php echo ($eTurma['sem_turma'] == 2) ? "selected" : ""; ?>>2</option>
                            <option value="3" <?php echo ($eTurma['sem_turma'] == 3) ? "selected" : ""; ?>>3</option>
                            <option value="4" <?php echo ($eTurma['sem_turma'] == 4) ? "selected" : ""; ?>>4</option>
                            <option value="5" <?php echo ($eTurma['sem_turma'] == 5) ? "selected" : ""; ?>>5</option>
                            <option value="6" <?php echo ($eTurma['sem_turma'] == 6) ? "selected" : ""; ?>>6</option>
                            <option value="7" <?php echo ($eTurma['sem_turma'] == 7) ? "selected" : ""; ?>>7</option>
                            <option value="8" <?php echo ($eTurma['sem_turma'] == 8) ? "selected" : ""; ?>>8</option>
                            <option value="9" <?php echo ($eTurma['sem_turma'] == 9) ? "selected" : ""; ?>>9</option>
                            <option value="10" <?php echo ($eTurma['sem_turma'] == 10) ? "selected" : ""; ?>>10</option>
                        </select>
                    </div>
                    <div class="col-4 mt-3 mb-3 mx-auto">
                        <label for="cursoInput" class="form-label">Curso</label>
                        <select class="form-control" id="cursoInput" name="cursoTurma">
                            <?php
                            foreach ($aCurso as $curso) {
                            ?>
                                <option value="<?php echo $curso['cod_curso'] ?>" <?php echo ($curso['cod_curso'] == $eTurma['cod_curso']) ? "selected" : "" ?>>
                                    <?php echo $curso['desc_curso'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-4 mt-3 mb-3 mx-auto">
                        <label for="profInput" class="form-label">Professor</label>
                        <select class="form-control" id="profInput" name="profTurma">
                            <?php
                            foreach ($aProf as $prof) {
                            ?>
                                <option value="<?php echo $prof['registro'] ?>" <?php echo ($prof['registro'] == $eTurma['cod_prof']) ? "selected" : "" ?>>
                                    <?php echo $prof['nome'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-3 mt-3 mb-3 mx-auto">
                            <label for="dtIni" class="form-label">Data de Início</label>
                            <input type="date" class="form-control text-center" id="dtIni" name="dtIni" value="<?php echo ($edit) ? $eTurma['data_ini'] : $dataAtual ?>">
                        </div>
                        <div class="col-3 mt-3 mb-3 mx-auto">
                            <label for="dtFim" class="form-label">Data de Término</label>
                            <input type="date" class="form-control text-center" id="dtFim" name="dtFim" value="<?php echo ($edit) ? $eTurma['data_fim'] : $dataAtual ?>">
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col d-flex justify-content-end">
                            <input type="submit" class="btn btn-outline-danger" value="Cancelar" formaction="index.php?page=listaTurmas">
                        </div>
                        <div class="col d-flex justify-content-start">

                            <?php if ($edit) { ?>
                                <input type="hidden" value="true" name="edit">
                                <input type="submit" class="btn btn-outline-success" value="Confirmar">
                            <?php } else { ?>
                                <input type="hidden" value="true" name="add">
                                <input type="submit" class="btn btn-outline-success" value="Adicionar">
                            <?php } ?>

                        </div>
                    </div>
                </form>
            </div>

    <?php
            break;
    }
    ?>

</div>

<script>

</script>

<?php

?>