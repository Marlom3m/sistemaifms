<?php
 require_once ABSPATH.'controle/palestrantes.php';
 require_once ABSPATH.'opcoes/Palestrante/gridPalestrantes.php';
?>
<h1 class="text-center">Palestrantes</h1>
<div class="text-right h2">
				<a class="btn btn-primary" href="?page=palestrante_add"><i class="fa fa-plus"></i> Novo palestrante</a>
				<a class="btn btn-default" href="?page=Palestrantes"><i class="fa fa-refresh"></i> Atualizar</a>
			</div>
<div class="row border border-white rounded">

<table class="table table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Instituicao</th>
			</tr>
		</thead>
		<tbody>
<?php
	$palestrantes = allPalestrantes();
	echo generateGrid($palestrantes);

?>

</div>
