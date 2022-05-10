<?php
require_once ABSPATH.'model/turno.php';

if(!empty($_POST)){
	if(!empty($_POST['nome'])){
		add();
	}
}


function add() {
  $turno = new Turno();
	$turno->setNome($_POST['nome']);
	if($turno->salvar()>0){
		$_SESSION['message'] = "Salvo com sucesso";
		$_SESSION['type'] = 'success';
	}else{
		$_SESSION['message'] = "Erro ao Salvar";
		$_SESSION['type'] = 'danger';
	}
  header('Location: '.BASEURL.'?page=turno_add');exit;
}

function allturnos(){
	$turnos = new Turno();
	return $turnos->all('turno');
}


?>
