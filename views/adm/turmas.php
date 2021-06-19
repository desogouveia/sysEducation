<div class="container text-center" id="divMain">

    <div class="row text-center">
        <p class="mt-4 fs-1"><?php echo "Listagem de Turmas"; ?></p>
        <?php
            // TRATAMENTO DAS MENSAGENS DE RETORNO 

            if($retAdd && $retAdd == 1){
                echo '<p class="text-success fw-bold">Turma adicionada com sucesso!</p>';
            }

            if($retEdit && $retEdit == 1){
                echo '<p class="text-warning fw-bold">Turma editada com sucesso!</p>';
            }

            if($retDelete && $retDelete == 1){
                echo '<p class="text-danger fw-bold">Turma removida com sucesso!</p>';
            }

        ?>
    </div>

    <div class="row">
    <form action="index.php?page=listaTurmas" method="POST" class="col align-middle mt-2 input-group ms-3">
                <input type="text" class="form-control" aria-describedby="search" placeholder="Digite o Nome ou ID da Turma..." name="filtro">  
                <button class="btn btn-primary">Buscar</button>
                <button class="btn btn-secondary" formaction="index.php?page=listaTurmas&limpar=true">Limpar</button>
        </form>
        <div class="col mt-2">
            <a href="index.php?page=addDados&dado=Turma">
                <button class="btn btn-success">Adicionar Turma</button>
            </a>
        </div>
    </div>

    <div class="row justify-contents-center mt-4 text-center">

        <div class="row justify-contents-center mt-4 text-center">

            <?php

            if ($aTurmas != 'turmaNE') {

            ?>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Turma</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Professor</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody class="">

                        <?php
                        foreach ($aTurmas as $turma) {
                        ?>
                            <tr>
                                <th scope="row" class="align-middle"><?php echo $turma['cod_turma'] ?></th>
                                <td class="align-middle"><?php echo $turma['desc_turma'] ?></td>
                                <td class="align-middle"><?php echo $turma['sem_turma'] ?></td>
                                <td class="align-middle"><?php echo $turma['desc_curso'] ?></td>
                                <td class="align-middle"><?php echo $turma['nome'] ?></td>
                                <td>
                                    <a href="index.php?page=addDados&dado=Turma&edit=<?php echo $turma['cod_turma'] ?>">
                                        <button class="btn btn-warning" formaction="">Editar</button></a>
                                    <a href="index.php?page=listaTurmas&delete=<?php echo $turma['cod_turma'] ?>">
                                        <button class="btn btn-danger">Excluir</button></a>
                                </td>
                            </tr>

                    <?php

                        }
                    } else {
                        echo '<p class="mt-5 text-center">Nenhuma turma encontrada na base de dados do sistema!</p>';
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