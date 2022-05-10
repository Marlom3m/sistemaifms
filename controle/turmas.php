<?php
require_once ABSPATH.'model/turma.php';

if(!empty($_POST)){
	if(!empty($_POST['nome'])){
		add();
	}
}


function add() {
  $turma = new Turma();
	$turma->setNome($_POST['nome']);
	if($turma->salvar()>0){
		$_SESSION['message'] = "Salvo com sucesso";
		$_SESSION['type'] = 'success';
	}else{
		$_SESSION['message'] = "Erro ao Salvar";
		$_SESSION['type'] = 'danger';
	}
  header('Location: '.BASEURL.'?page=turma_add');exit;
}

function allTurmas(){
	$turmas = new turma();
	return $turmas->all('turma');
}


?>
