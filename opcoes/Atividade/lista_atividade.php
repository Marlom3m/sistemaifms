
<?php
 require_once ABSPATH.'controle/atividades.php';
 require_once ABSPATH.'opcoes/Atividade/gridAtividades.php';

?>
<h1 class="text-center">Atividades</h1>

<div class="text-right h2">
				<a class="btn btn-primary" href="?page=atividade_add"><i class="fa fa-plus"></i> Nova Atividade</a>
				<a class="btn btn-default" href="?page=atividades"><i class="fa fa-refresh"></i> Atualizar</a>
			</div>
<div class="row border border-white rounded">

<table class="table table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
        <th>Descrição</th>
				<th>Observação</th>
        <th>Limite</th>
				<th>Sala</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
<?php
	$atividades = allatividades();
	echo generateGrid($atividades);

?>

</div>
