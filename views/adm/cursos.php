<div class="container text-center" id="divMain">

    <div class="row text-center">
        <p class="mt-4 fs-1"><?php echo "Listagem de Cursos"; ?></p>
        <?php
            // TRATAMENTO DAS MENSAGENS DE RETORNO 

            if($retAdd && $retAdd == 1){
                echo '<p class="text-success fw-bold">Curso adicionado com sucesso!</p>';
            }

            if($retEdit && $retEdit == 1){
                echo '<p class="text-warning fw-bold">Curso editado com sucesso!</p>';
            }

            if($retDelete && $retDelete == 1){
                echo '<p class="text-danger fw-bold">Curso removido com sucesso!</p>';
            }

        ?>
    </div>

    <div class="row">
        <form action="index.php?page=listaCursos" method="POST" class="col align-middle mt-2 input-group ms-3">
                <input type="text" class="form-control" aria-describedby="search" placeholder="Digite o Nome ou ID do Curso..." name="filtro">  
                <button class="btn btn-primary">Buscar</button>
                <button class="btn btn-secondary" formaction="index.php?page=listaCursos&limpar=true">Limpar</button>
        </form>
        <div class="col mt-2">
                <a href="index.php?page=addDados&dado=Curso">
                    <button class="btn btn-success">Adicionar Curso</button>
                </a>
        </div>
    </div>

    <div class="row justify-contents-center mt-4 text-center">

        <?php

            if($aCursos != 'cursoNE'){

        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome do Curso</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody class="">

            <?php
                    foreach($aCursos as $curso){
            
            ?>
                <tr>
                    <th scope="row" class="align-middle"><?php echo $curso['cod_curso'] ?></th>
                    <td class="align-middle"><?php echo $curso['desc_curso'] ?></td>
                    <td>
                        <a href="index.php?page=addDados&dado=Curso&edit=<?php echo $curso['cod_curso']?>">
                            <button class="btn btn-warning" formaction="">Editar</button></a>
                        <a href="index.php?page=listaCursos&delete=<?php echo $curso['cod_curso']?>">
                            <button class="btn btn-danger">Excluir</button></a>
                    </td>
                </tr>

            <?php
            
                    }
                }else{
                    echo '<p class="mt-5 text-center">Nenhum curso encontrado na base de dados do sistema!</p>';
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