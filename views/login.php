<?php



?>

<style>
body {
  background-image: url('img/bgLogin.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>

<body class="">
    <div id="loginDiv" class="row bg-light border border-5 rounded position-absolute top-50 start-50 translate-middle shadow" style="width:40%;">
        <div class="mb-4 mt-3 row text-center mx-auto">
            <h2 class="">SysEducation</h2>
        </div>
        <form action="index.php" method="POST">
            <div class="row mx-auto">
                <div class="col-2 mx-auto">
                    <div class="mb-3 row">
                        <label for="" class="col-sm-2 col-form-label">Login:</label>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-2 col-form-label">Senha:</label>
                    </div>
                </div>

                <div class="col mx-auto">
                    <div class="mb-3 row">
                        <div class="col-sm">
                        <input type="text" class="form-control shadow" id="login" placeholder="Digite aqui seu login..." name="user">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm">
                        <input type="password" class="form-control shadow" id="loginPw" placeholder="Digite aqui sua senha..." name="pw">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3 mx-auto text-center text-success">
                <p>Selecione o Tipo de Login</p>
            </div>

            <div class="row mx-auto">
                <div class="form-check col d-flex justify-content-center">
                    <input class="form-check-input" type="radio" name="typeL" id="radioAluno" value="3">
                    <label class="form-check-labe ms-1" for="radioAluno">Aluno</label>
                </div>

                <div class="form-check col d-flex justify-content-center">
                    <input class="form-check-input" type="radio" name="typeL" id="radioProf" value="2">
                    <label class="form-check-label ms-1" for="radioProf">Professor</label>
                </div>

                <div class="form-check col d-flex justify-content-center">
                    <input class="form-check-input" type="radio" name="typeL" id="radioAdm" value="1">
                    <label class="form-check-label ms-1" for="radioAdm">Adm</label>
                </div>
            </div>

            <div class="mt-4 mb-3 row mx-auto">
                <div class="col">
                <input type="reset" class="form-control btn btn-outline-danger mx-auto" id="btnEnviar" value="Cancelar">
                </div>
                <div class="col">
                <input type="submit" class="form-control btn btn-outline-success mx-auto" id="btnEnviar" value="Entrar">
                </div>
            </div>
            <?php echo ($msgErr) ? $msgErr : "";?>
        </form>
    </div>
</body>
</html>