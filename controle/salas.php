<?php
require_once ABSPATH.'model/sala.php';

if(!empty($_POST)){
	if(!empty($_POST['nome'])){
		addSala();
	}
}


function addSala() {
  $sala = new Sala();
	$sala->setNome($_POST['nome']);
	if($sala->salvar()>0){
		$_SESSION['message'] = "Salvo com sucesso";
		$_SESSION['type'] = 'success';
	}else{
		$_SESSION['message'] = "Erro ao Salvar";
		$_SESSION['type'] = 'danger';
	}
  header('Location: '.BASEURL.'?page=sala_add');exit;
}

function allSalas(){
	$salas = new Sala();
	return $salas->all('sala');
}


?>
