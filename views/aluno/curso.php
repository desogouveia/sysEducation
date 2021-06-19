<div class="container-fluid" id="divMain">

    <div class="row text-center">
        <p class="mt-4 fs-1"><?php echo ($cursoLogado) ? $cursoLogado['desc_curso'] : "Não matriculado.";?></p>
        <div class="col text-end border-end">
            <p class="fw-bold">Aluno</p>
            <p class=""><?php echo ($alunoLogado) ? $alunoLogado['nome'] : $userName; ?></p>
        </div>
        <div class="col text-start border-start">
            <p class="fw-bold">RA</p>
            <p class=""><?php echo ($alunoLogado) ? $alunoLogado['ra'] : $userName; ?></p>
        </div>
    </div>

    <div class="row justify-contents-center mt-3">
        
        <div class="col border overflow-auto">

            <?php
                if(!empty($cursoLogado) && $cursoLogado != 0){
            ?>

            <div class="row">
                <div class="col-6 border">
                    <p class="mt-2 fs-3 text-center">Resumo do Curso</p>
                    <p class='mt-2 fs-5 text-center'><?php echo $cursoLogado['long_curso'];?></p>
                </div>
                <div class="col-6 border">
                    <p class="mt-2 fs-3 text-center">Turma</p>
                    <p class='mt-2 fs-5 text-center'><?php echo $turmaLogada['desc_turma'];?></p>
                </div>
            </div>

            <div class="row">
                <div class="col-6 border">
                    <p class="mt-2 fs-3 text-center">Semestre</p>
                    <p class='mt-2 fs-5 text-center'><?php echo $turmaLogada['sem_turma'];?></p>
                </div>
                <div class="col-6 border">
                    <p class="mt-2 fs-3 text-center">Professor Responsável</p>
                    <p class='mt-2 fs-5 text-center'><?php echo $turmaLogada['nome'];?></p>
                </div>
                
            </div>
                

            <?php
                }else{
            ?>
                <p class="text-center text-danger fw-bold fs-4">Curso não encontrado. Contate o Administrador e realize sua matrícula!</p>
            <?php
                }
            ?>
        </div>

    </div>

</div>

<script>
    
</script>