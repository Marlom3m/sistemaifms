<?php
require_once ABSPATH.'model/participante.php';
require_once ABSPATH.'model/atividade.php';

if(!empty($_POST)){
	if(!empty($_POST['participante'])){
		add();
	}else if(!empty($_POST['presenca'])){
		salvarPresenca($_POST['presenca']);
	}
}


function add() {
  $participante = new Participante();
	$participante->setUsuario($_POST['participante']);
	if(!empty($_POST['turno']))
		$participante->setTurno($_POST['turno']);
	if(!empty($_POST['turma']))
		$participante->setTurma($_POST['turma']);
	if($participante->salvar(2)>0){
		$_SESSION['participante'] = serialize($participante->pesquisaParticipante(2,$participante->getUsuario()));
		$_SESSION['message'] = "Salvo com sucesso";
		$_SESSION['type'] = 'success';
	}else{
		$_SESSION['message'] = "Erro ao Salvar";
		$_SESSION['type'] = 'danger';
	}
  header('Location: '.BASEURL.'?page=participante');exit;
}

function allparticipantes(){
	$participantes = new participante();
	return $participantes->all('participante');
}

function salvarPresenca($idAtividade){
	$participante = unserialize($_SESSION['participante']);
	$atividade = new atividade();
	$resultado = $atividade->buscarSenha($idAtividade);
	if($_POST['codigo']==$resultado[0]->senha){
		$participante->registraPresenca($idAtividade);
	}else{
		$_SESSION['message'] = "Código Inválido";
		$_SESSION['type'] = 'danger';
	}
	header('Location: '.BASEURL.'?page=participante');exit;
}


?>
