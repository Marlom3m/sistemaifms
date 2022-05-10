<div class="container">
<h2>Novo Evento</h2>
	<form action="?page=evento_save" method="post">

	<!-- area de campos do form -->
	<hr/>	<!-- linha de separação -->
		<div class="row">
			<div class="form-group col-md-8">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" name="nome" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="nome">Data início:</label>
				<input type="date" class="form-control" name="inicio" required>
			</div>
			<div class="form-group col-md-4">
				<label for="nome">Data final:</label>
				<input type="date" class="form-control"  name="final">
			</div>
		</div>

		<div id="actions" class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="?page=eventos" class="btn btn-default">Voltar</a>
			</div>
		</div>
	</form>
	<br>
	<div class="container">
		<?php
			if (!empty($_SESSION['type'])) {
		?>
		<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php
				if(!empty($_SESSION['message']))
					echo $_SESSION['message'].'<br>';
			?>
		</div>

		<?php
			unset($_SESSION['type']);
			unset($_SESSION['message']);
		?>

		<?php } ?>
	</div>
</div>
