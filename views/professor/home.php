<div class="container-fluid" id="divMain">

    <div class="row text-center">
        <p class="mt-4 fs-1">Bem-Vindo <?php echo ($profLogado) ? $profLogado['nome'] : $userName; ?>!</p>
        <div class="col text-end border-end">
            <p class="fw-bold">Professor</p>
            <p class=""><?php echo ($profLogado) ? $profLogado['nome'] : $userName; ?></p>
        </div>
        <div class="col text-start border-start">
            <p class="fw-bold">Registro</p>
            <p class=""><?php echo ($profLogado) ? $profLogado['registro'] : $userName; ?></p>
        </div>
    </div>

    <div class="row justify-contents-center mt-2">

        <?php
        if (!empty($profLogado) && $profLogado != 0) {

            $dataFormat = explode('-', $profLogado['data_admissao']);
            $profLogado['data_admissao'] = $dataFormat[2] . '/' . $dataFormat[1] . '/' . $dataFormat[0];
        ?>

            <div class="col overflow-auto">
                <div class="row">
                    <div class="col">
                        <p class="mt-3 fs-5 text-end border-bottom fw-bold">CPF</p>
                        <p class="mt-5 fs-5 text-end border-bottom fw-bold">RG</p>
                        <p class="mt-5 fs-5 text-end border-bottom fw-bold">Telefone</p>
                        <p class="mt-5 fs-5 text-end border-bottom fw-bold">E-Mail</p>
                        <p class="mt-5 fs-5 text-end border-bottom fw-bold">Data de Admissão</p>
                        <p class="mt-5 fs-5 text-end border-bottom fw-bold">Área</p>
                    </div>

                    <div class="col">
                        <p class="mt-3 fs-5 text-start border-bottom"><?php echo ($profLogado) ? $profLogado['cpf'] : "Não Consta"; ?></p>
                        <p class="mt-5 fs-5 text-start border-bottom"><?php echo ($profLogado) ? $profLogado['rg'] : "Não Consta"; ?></p>
                        <p class="mt-5 fs-5 text-start border-bottom"><?php echo ($profLogado) ? $profLogado['telefone'] : "Não Consta"; ?></p>
                        <p class="mt-5 fs-5 text-start border-bottom"><?php echo ($profLogado) ? $profLogado['email'] : "Não Consta"; ?></p>
                        <p class="mt-5 fs-5 text-start border-bottom"><?php echo ($profLogado) ? $profLogado['data_admissao'] : "Não Consta"; ?></p>
                        <p class="mt-5 fs-5 text-start border-bottom"><?php echo ($profLogado) ? $profLogado['formacao'] : "Não Consta"; ?></p>
                    </div>

                    <div class="row mt-5">
                        <p class="text-center text-danger fw-bold">Atenção: Caso algum dado apresente "Não Consta", contate o Administrador!</p>
                    </div>
                </div>

            <?php
        } else {
            ?>
                <p class="text-center text-danger fs-3">Aluno não encontrado! Contate o Administrador do Sistema.</p>
            <?php
        }
            ?>
            </div>

    </div>

</div>

<script>

</script>