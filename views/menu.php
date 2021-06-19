<?php

// activePage - Define atributos active na navbar e página de include
$activePage = (isset($_GET['page'])) ? $_GET['page'] : "home";

$_SESSION['user'] = ($_SESSION['user']) ? $_SESSION['user'] : $_POST['user'];

// Determinando esquema de cores do bootstrap
switch ($_SESSION['typeL']) {
  case 1: // ADM
    $typeL = "Administrador";
    $primaryColor = "dark";
    $secondaryColor = "dark";
    break;

  case 2: // PROFESSOR
    $typeL = "Professor";
    $primaryColor = "primary";
    $secondaryColor = "dark";
    break;

  case 3: // ALUNO
    $typeL = "Aluno";
    $primaryColor = "success";
    $secondaryColor = "dark";
    break;
}

?>

<nav class="navbar navbar-expand-lg navbar-<?php echo $secondaryColor; ?> bg-<?php echo $primaryColor; ?>">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">SysEducation - Área do <?php echo $typeL; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php
        switch ($_SESSION['typeL']) {
          case 1: // ADM
        ?>
            <li class="nav-item">
              <a class="nav-link <?php echo ($activePage == 'listaAlunos' || $activePage == 'home') ? 'active fw-bold' : ""; ?>" href="index.php?page=listaAlunos">Alunos</a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php echo ($activePage == 'listaCursos') ? 'active fw-bold' : ""; ?>" href="index.php?page=listaCursos">Cursos</a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php echo ($activePage == 'listaProfissionais') ? 'active fw-bold' : ""; ?>" href="index.php?page=listaProfissionais">Profissionais</a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php echo ($activePage == 'listaTurmas') ? 'active fw-bold' : ""; ?>" href="index.php?page=listaTurmas">Turmas</a>
            </li>

          <?php
            break;

          case 2: // PROFESSOR
          ?>
            <li class="nav-item">
              <a class="nav-link <?php echo ($activePage == 'home') ? 'active fw-bold' : ""; ?>" aria-current="page" href="index.php?page=home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo ($activePage == 'turmas') ? 'active fw-bold' : ""; ?>" href="index.php?page=turmas">Turmas</a>
            </li>

            <!--<li class="nav-item">
              <a class="nav-link <?php echo ($activePage == 'avisos') ? 'active fw-bold' : ""; ?>" href="index.php?page=avisos">Avisos</a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php echo ($activePage == 'notas') ? 'active fw-bold' : ""; ?>" href="index.php?page=notas">Emitir Notas</a>
            </li>-->

          <?php
            break;

          case 3: // ALUNO
          ?>
            <li class="nav-item">
              <a class="nav-link <?php echo ($activePage == 'home') ? 'active fw-bold' : ""; ?>" aria-current="page" href="index.php?page=home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo ($activePage == 'curso') ? 'active fw-bold' : ""; ?>" href="index.php?page=curso">Curso</a>
            </li>

            <!--<li class="nav-item">
              <a class="nav-link <?php echo ($activePage == 'horario') ? 'active fw-bold' : ""; ?>" href="index.php?page=horario">Horário</a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php echo ($activePage == 'boletim') ? 'active fw-bold' : ""; ?>" href="index.php?page=boletim">Boletim</a>
            </li>-->
        <?php
            break;
        }
        ?>
        <!--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
        -->
      </ul>
      <a href="index.php?sair=true"><button class="btn btn-danger">Sair</button></a>
    </div>
  </div>
</nav>

<script>
  function teste() {
    console.log('teste');
  }
</script>