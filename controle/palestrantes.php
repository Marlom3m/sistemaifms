<?php
require_once ABSPATH.'model/palestrante.php';

if(!empty($_POST)){
	if(!empty($_POST['nome'])){
		add();
	}
}

function add() {
  $palestrante = new Palestrante();
	$palestrante->setNome($_POST['nome']);
	$palestrante->setEmail($_POST['email']);
	if(!empty($_POST['instituicao']))
		$palestrante->setInstituicao($_POST['instituicao']);
	if($palestrante->existe('email',$palestrante->getEmail())){
		$_SESSION['message'] = "E-MAIL já cadastrado";
		$_SESSION['type'] = 'danger';
	}else if($palestrante->salvar()>0){
		$_SESSION['message'] = "Salvo com sucesso";
		$_SESSION['type'] = 'success';
	}else{
		$_SESSION['message'] = "Erro ao Salvar";
		$_SESSION['type'] = 'danger';
	}
  header('Location: '.BASEURL.'?page=palestrante_add'); exit;
}

function allPalestrantes(){
	$palestrantes = new Palestrante();
	return $palestrantes->allPalestrantes('palestrante');
}
?>
