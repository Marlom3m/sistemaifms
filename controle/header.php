<html lang="en" dir="ltr">
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<title>Administração</title>
<link rel="stylesheet" href="<?php echo BASEURL; ?>cdn/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo BASEURL; ?>cdn/css/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<div class="container-fluid">
<div class="row ">
<?php
if(!isset($_SESSION)){
session_start();
}
if(!empty($_SESSION['tipo'])){
if($_SESSION['tipo'] == 1){
?>
<aside class="col-12 col-md-2 p-0 bg-dark">
<nav class="navbar navbar-expand-xl navbar-dark bg-dark flex-md-column flex-row align-items-start sticky-top">
<ul class="flex-md-column navbar-nav justify-content-between">
<a class="navbar-brand" href="<?php echo BASEURL; ?>"><i class='fas fa-home' style='font-size:36px'></i></a>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle nav-text" href="#" id="navbardrop" data-toggle="dropdown"> <?php  echo "Olá, ".$_SESSION['nome']; ?> </a>
<div class="dropdown-menu">
<a class="dropdown-item" href="?page=logout">Realizar Logout</a>
</div>
</li>
<br>
</ul>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbarAdmin">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse sticky-top" id="collapsibleNavbarAdmin">
<ul class="flex-md-column navbar-nav justify-content-between">
<li class="nav-item">
<a href="" class="nav-link ">
<h5>Administradores</h5>
</a>
</li>
<li class="nav-item">
<a href="?page=Atividades" class="nav-link ">
<h5>Atividades</h5>
</a>
</li>
<li class="nav-item">
<a href="?page=certificados" class="nav-link ">
<h5>Certificados</h5>
</a>
</li>
<li class="nav-item">
<a href="?page=eventos" class="nav-link" class="nav-link ">
<h5>Eventos</h5>
</a>
</li>
<li class="nav-item">
<a href="?page=Palestrantes" class="nav-link" class="nav-link ">
<h5>Palestrantes</h5>
</a>
</li>
<li class="nav-item">
<a href="?page=Salas" class="nav-link ">
<h5>Salas</h5>
</a>
</li>
<li class="nav-item">
<a href="?page=Turmas" class="nav-link ">
<h5>Turmas</h5>
</a>
</li>
<li class="nav-item">
<a href="?page=Turnos" class="nav-link ">
<h5>Turnos</h5>
</a>
</li>
<li class="nav-item" >
<a href="?page=Usuarios" class="nav-link">
<h5>Usuários</h5>
</a>
</li>
</ul>
</div>
</nav>
</aside>
<?php
}
}
?>
<!-- lista faixa amarela  style="background-color: #f4b413"-->
<main class="col h-100 pt-1 bg-light">
<div class="jumbotron jumbotron-fluid "  style="background-image: url('imagens/fundo.png'); background-size: cover;">
<img src="imagens/seagro.png" width="55%" class="mx-auto d-block">
<br><br>
<nav class="navbar navbar-expand-md sticky-top" style="background-color: #008000">
<button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
Menu
</button>
<div class="collapse navbar-collapse " id="collapsibleNavbar" >
<ul class="navbar-nav ">
<?php
if(empty($_SESSION['usuario'])){
?>
<li class="nav-item">
<a class="nav-link text-light font-weight-bold" href="?page=login">Login</a>
</li>
<li class="nav-item ">
<a class="nav-link text-light font-weight-bold" href="?">Apresentação</a>
</li>
<li class="nav-item ">
<a class="nav-link text-light font-weight-bold" href="?page=cpf">Inscrever-se</a>
</li>
<?php
}else{
?>
<li class="nav-item">
<a class="nav-link text-light font-weight-bold" href="?page=logout"><?php echo $_SESSION['nome']?> (sair)</a>
</li>
<li class="nav-item ">
<a class="nav-link text-light  font-weight-bold" href="?">Apresentação</a>
</li>
<li class="nav-item ">
<a class="nav-link text-light  font-weight-bold" href="?page=participante">Área do Participante</a>
</li>
<?php
}
?>
<li class="nav-item ">
<a class="nav-link text-light  font-weight-bold" href="?page=programacao">Programação</a>
</li>
</ul>
</div>
</nav>
</div>
