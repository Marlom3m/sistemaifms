
<?php
 require_once ABSPATH.'controle/salas.php';
 require_once ABSPATH.'opcoes/Sala/gridSalas.php';

?>
<h1 class="text-center">Salas</h1>

<div class="text-right h2">
				<a class="btn btn-primary" href="?page=sala_add"><i class="fa fa-plus"></i> Nova sala</a>
				<a class="btn btn-default" href="?page=salas"><i class="fa fa-refresh"></i> Atualizar</a>
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
	$salas = allSalas();
	echo generateGrid($salas);

?>

</div>
