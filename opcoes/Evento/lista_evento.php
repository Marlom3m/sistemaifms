
<?php
 require_once ABSPATH.'controle/eventos.php';
 require_once ABSPATH.'opcoes/Evento/gridEventos.php';

?>
<h1 class="text-center">Eventos</h1>

<div class="text-right h2">
				<a class="btn btn-primary" href="?page=evento_add"><i class="fa fa-plus"></i> Novo Evento</a>
				<a class="btn btn-default" href="?page=eventos"><i class="fa fa-refresh"></i> Atualizar</a>
			</div>
<div class="row border border-white rounded">

<table class="table table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Ano</th>
				<th>Data Início</th>
				<th>Data Final</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
<?php
	$eventos = allEventos();
	echo generateGrid($eventos);

?>

</div>
