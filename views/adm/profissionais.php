<div class="container text-center" id="divMain">

    <div class="row text-center">
        <p class="mt-4 fs-1"><?php echo "Listagem de Profissionais"; ?></p>
        <?php
            // TRATAMENTO DAS MENSAGENS DE RETORNO 

            if($retAdd && $retAdd == 1){
                echo '<p class="text-success fw-bold">Profissional adicionado com sucesso!</p>';
            }

            if($retEdit && $retEdit == 1){
                echo '<p class="text-warning fw-bold">Profissional editado com sucesso!</p>';
            }

            if($retDelete && $retDelete == 1){
                echo '<p class="text-danger fw-bold">Profissional removido com sucesso!</p>';
            }

        ?>
    </div>

    <div class="row">
    <form action="index.php?page=listaProfissionais" method="POST" class="col align-middle mt-2 input-group ms-3">
                <input type="text" class="form-control" aria-describedby="search" placeholder="Digite o Nome ou ID do Profissional..." name="filtro">  
                <button class="btn btn-primary">Buscar</button>
                <button class="btn btn-secondary" formaction="index.php?page=listaProfissionais&limpar=true">Limpar</button>
        </form>
        <div class="col mt-2">
            <a href="index.php?page=addDados&dado=Profissional">
                <button class="btn btn-success">Adicionar Profissional</button>
            </a>
        </div>
    </div>

    <div class="row justify-contents-center mt-4 text-center">

        <div class="row justify-contents-center mt-4 text-center">

            <?php

            if ($aProfs != 'profNE') {

            ?>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Registro</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Admissão</th>
                            <th scope="col">Formação</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody class="">

                        <?php
                        foreach ($aProfs as $prof) {
                            $dataFormat = explode('-', $prof['data_admissao']);
                            $prof['data_admissao'] = $dataFormat[2] . '/' . $dataFormat[1] . '/' . $dataFormat[0];

                        ?>
                            <tr>
                                <th scope="row" class="align-middle"><?php echo $prof['registro'] ?></th>
                                <td class="align-middle"><?php echo $prof['nome'] ?></td>
                                <td class="align-middle"><?php echo $prof['data_admissao'] ?></td>
                                <td class="align-middle"><?php echo $prof['formacao'] ?></td>
                                <td>
                                    <a href="index.php?page=addDados&dado=Profissional&edit=<?php echo $prof['registro'] ?>">
                                        <button class="btn btn-warning" formaction="">Editar</button></a>
                                    <a href="index.php?page=listaProfissionais&delete=<?php echo $prof['registro'] ?>">
                                        <button class="btn btn-danger">Excluir</button></a>
                                </td>
                            </tr>

                    <?php

                        }
                    } else {
                        echo '<p class="mt-5 text-center">Nenhum profissional encontrado na base de dados do sistema!</p>';
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