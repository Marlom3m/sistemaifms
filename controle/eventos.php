<?php
require_once ABSPATH.'model/evento.php';

if(!empty($_POST)){
	if(!empty($_POST['nome'])){
		add();
	}
}


function add() {
  $evento = new Evento();
	$evento->setNome($_POST['nome']);
  $data = $_POST['inicio'];
  $evento->setAno(date("Y", strtotime($data)));
  $evento->setInicio($data);
  $data = $_POST['final'];
  $evento->setFinal($data);
	if($evento->salvar()>0){
		$_SESSION['message'] = "Salvo com sucesso";
		$_SESSION['type'] = 'success';
	}else{
		$_SESSION['message'] = "Erro ao Salvar";
		$_SESSION['type'] = 'danger';
	}
  header('Location: '.BASEURL.'?page=evento_add');exit;
}

function allEventos(){
	$eventos = new Evento();
	return $eventos->all('evento');
}


?>
