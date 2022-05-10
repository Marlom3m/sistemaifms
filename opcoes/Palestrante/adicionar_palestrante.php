<div class="container text-dark font-weight-bold" >
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
<h2>Novo Palestrante</h2>
	<form action="?page=palestrante_save" method="post">

	<!-- area de campos do form -->
	<hr/>	<!-- linha de separação -->
		<div class="row">
			<div class="form-group col-md-10">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" name="nome" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-7">
				<label for="nome">E-mail:</label>
				<input type="email" class="form-control"  name="email" required>
			</div>
		</div>
    <div class="row">
			<div id="externo" class="form-group col-md-8">
				<label for="nome">Instituição:</label>
				<input type="text" class="form-control" name="instituicao">
			</div>
		</div>
    <br>
		<div id="actions" class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="index.php" class="btn btn-default">Voltar</a>
			</div>
		</div>
	</form>

</div>
