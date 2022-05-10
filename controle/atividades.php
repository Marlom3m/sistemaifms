<?php
require_once ABSPATH.'model/atividade.php';
require_once ABSPATH.'model/evento.php';
require_once ABSPATH.'model/data_atividade.php';

if(!empty($_POST)){
	if(!empty($_POST['nome'])){
		add();
	}
}


function add() {
  $atividade = new Atividade();
	$atividade->setNome($_POST['nome']);
	$atividade->setDescricao($_POST['descricao']);
	if(!empty($_POST['observacao']))
		$atividade->setObservacao($_POST['observacao']);
	$atividade->setSala($_POST['sala']);
	$atividade->setLimite($_POST['limite']);
	$atividade->setEvento(2);
	$id = $atividade->salvar();
	if($id>0){
		$data = new DataAtividade();
		$data->setData($_POST['data']);
		$data->setHora($_POST['hora']);
		if(!empty($_POST['duracao']))
			$data->setDuracao($_POST['duracao']);
		$data->setAtividade($id);
		if($data->salvar()>0){
			$palestrantes = $_POST['palestrante'];
			foreach ($palestrantes as $key => $palestrante) {
				$atividade->salvarPalestrante($id,$palestrante);
			}

			$_SESSION['message'] = "Salvo com sucesso";
			$_SESSION['type'] = 'success';
		}else{
			$_SESSION['message'] = "Erro ao Salvar Data ou Palestrante";
			$_SESSION['type'] = 'danger';
		}
	}else{
		$_SESSION['message'] = "Erro ao Salvar Atividade";
		$_SESSION['type'] = 'danger';
	}
  header('Location: '.BASEURL.'?page=atividade_add');exit;
}

function allAtividades(){
	$evento = new Evento();
	return $evento->allAtividades(2,'atividade');
}


?>
