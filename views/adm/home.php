<div class="container-fluid border" id="divMain">

    <div class="row text-center">
        <p class="mt-4 fs-1">Bem-Vindo <?php echo $userName;?>!</p>
        <div class="col text-end border-end">
            <p class="fw-bold">Aluno</p>
            <p class="">André de Gouveia Lima</p>
        </div>
        <div class="col text-start border-start">
            <p class="fw-bold">RA</p>
            <p class="">420201242</p>
        </div>
    </div>

    <div class="row shadow justify-contents-center mt-3">
        
        <div class="col border overflow-auto">
            <div class="row">
                <p class="mt-2 fs-3 text-center">Avisos</p>
            </div>
            <?php
                for($i=1; $i<11; $i++){
                    echo "<p class='mt-2 fs-5 ms-5'>Aviso ".$i." - Teste</p>";
                }
            ?>
        </div>

        <div class="col border overflow-auto">
            <div class="row">
                <p class="mt-2 fs-3 text-center">Horário</p>
            </div>
            
            <div class="row">
                <div class="col">
                    <p class="mt-5 fs-5 text-center border-bottom border-end">08:00</p>
                    <p class="mt-5 fs-5 text-center border-bottom border-end">09:00</p>
                    <p class="mt-5 fs-5 text-center border-bottom border-end">10:00</p>
                    <p class="mt-5 fs-5 text-center border-bottom border-end">11:00</p>
                    <p class="mt-5 fs-5 text-center border-bottom border-end">12:00</p>
                </div>

                <div class="col">
                    <p class="mt-5 fs-5 text-center border-bottom border-end">Ciência de Dados</p>
                    <p class="mt-5 fs-5 text-center border-bottom border-end">Programação Back-End</p>
                    <p class="mt-5 fs-5 text-center border-bottom border-end">Programação Front-End</p>
                    <p class="mt-5 fs-5 text-center border-bottom border-end">DevOps</p>
                    <p class="mt-5 fs-5 text-center border-bottom border-end">Banco de Dados</p>
                </div>
            </div>

        </div>

    </div>

</div>

<script>
    
</script>