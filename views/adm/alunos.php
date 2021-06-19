<div class="container text-center" id="divMain">

    <div class="row text-center">
        <p class="mt-4 fs-1"><?php echo "Listagem de Alunos"; ?></p>
        <?php
            // TRATAMENTO DAS MENSAGENS DE RETORNO 

            if($retAdd && $retAdd == 1){
                echo '<p class="text-success fw-bold">Aluno adicionado com sucesso!</p>';
            }

            if($retEdit && $retEdit == 1){
                echo '<p class="text-warning fw-bold">Aluno editado com sucesso!</p>';
            }

            if($retDelete && $retDelete == 1){
                echo '<p class="text-danger fw-bold">Aluno removido com sucesso!</p>';
            }

        ?>
    </div>

    <div class="row">
        <form action="index.php?page=listaAlunos" method="POST" class="col align-middle mt-2 input-group ms-3">
            <input type="text" class="form-control" aria-describedby="search" placeholder="Digite o Nome ou RA do Aluno..." name="filtro">
            <button class="btn btn-primary">Buscar</button>
            <button class="btn btn-secondary" formaction="index.php?page=listaAlunos&limpar=true">Limpar</button>
        </form>
        <div class="col mt-2">
            <a href="index.php?page=addDados&dado=Aluno">
                <button class="btn btn-success">Adicionar Aluno</button>
            </a>
        </div>
    </div>

    <div class="row justify-contents-center mt-4 text-center">

        <div class="row justify-contents-center mt-4 text-center">

            <?php

            if ($aAlunos != 'alunoNE') {

            ?>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">RA</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Turma</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">E-Mail</th>
                            <th scope="col">Data de Matrícula</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody class="">

                        <?php
                        foreach ($aAlunos as $aluno) {
                            $dataFormat = explode('-', $aluno['data_matricula']);
                            $aluno['data_matricula'] = $dataFormat[2].'/'.$dataFormat[1].'/'.$dataFormat[0];

                        ?>
                            <tr>
                                <th scope="row" class="align-middle"><?php echo $aluno['ra'] ?></th>
                                <td class="align-middle"><?php echo $aluno['nome'] ?></td>
                                <td class="align-middle"><?php echo $aluno['cod_turma'] ?></td>
                                <td class="align-middle"><?php echo $aluno['telefone'] ?></td>
                                <td class="align-middle"><?php echo $aluno['email'] ?></td>
                                <td class="align-middle"><?php echo $aluno['data_matricula'] ?></td>
                                <td>
                                    <a href="index.php?page=addDados&dado=Aluno&edit=<?php echo $aluno['ra']?>">
                                        <button class="btn btn-warning" formaction="">Editar</button></a>
                                    <a href="index.php?page=listaAlunos&delete=<?php echo $aluno['ra']?>">
                                        <button class="btn btn-danger">Excluir</button></a>
                                </td>
                            </tr>

                    <?php

                        }
                    } else {
                        echo '<p class="mt-5 text-center">Nenhum aluno encontrado na base de dados do sistema!</p>';
                    }

                    ?>
                    </tbody>
                </table>
        </div>

    </div>

    <script>

    </script>

    <?php

    ?>