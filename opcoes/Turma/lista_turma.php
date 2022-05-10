
<?php
 require_once ABSPATH.'controle/turmas.php';
 require_once ABSPATH.'opcoes/Turma/gridTurmas.php';

?>
<h1 class="text-center">Turmas</h1>

<div class="text-right h2">
				<a class="btn btn-primary" href="?page=turma_add"><i class="fa fa-plus"></i> Nova Turma </a>
				<a class="btn btn-default" href="?page=turmas"><i class="fa fa-refresh"></i> Atualizar</a>
			</div>
<div class="row border border-white rounded">

<table class="table table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
<?php
	$turmas = allTurmas();
	echo generateGrid($turmas);

?>

</div>
