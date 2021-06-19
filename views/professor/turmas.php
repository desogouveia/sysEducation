<div class="container text-center" id="divMain">

    <div class="row text-center">
        <p class="mt-4 fs-1"><?php echo "Listagem de Turmas"; ?></p>
    </div>

    <div class="row">
        <form action="index.php?page=turmas" method="POST" class="col align-middle mt-2 input-group ms-3">
                <input type="text" class="form-control" aria-describedby="search" placeholder="Digite o Nome ou ID da Turma, ou o Nome do Curso..." name="filtro">  
                <button class="btn btn-primary">Buscar</button>
                <button class="btn btn-secondary" formaction="index.php?page=turmas&limpar=true">Limpar</button>
        </form>
    </div>

    <div class="row justify-contents-center mt-4 text-center">

        <?php

            if($turmasLogado){

        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Turma</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Semestre</th>
                </tr>
            </thead>
            <tbody class="">

            <?php
                    foreach($turmasLogado as $turma){
            
            ?>
                <tr>
                    <th scope="row" class="align-middle"><?php echo $turma['cod_turma'] ?></th>
                    <td class="align-middle"><?php echo $turma['desc_turma'] ?></td>
                    <td class="align-middle"><?php echo $turma['desc_curso'] ?></td>
                    <td class="align-middle"><?php echo $turma['sem_turma'] ?></td>
                </tr>

            <?php
            
                    }
                }else{
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