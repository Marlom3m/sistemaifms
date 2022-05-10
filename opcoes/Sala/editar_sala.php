<div class="container">
	<div class="container">
		<?php
		 require_once  ABSPATH.'model/sala.php';
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
		<?php
			$sala = New Sala();
			$sala->pesquisaSala("id_sala",$_GET["id_sala"]);
		?>
	</div>

<h2>Nova Sala</h2>
	<form action="?page=sala_save" method="post">

	<!-- area de campos do form -->
	<hr/>	<!-- linha de separação -->
		<div class="row">
			<div class="form-group col-md-8">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" name="nome" value="<?php echo $sala ->getNome();?>" required>
			</div>
		</div>
		<div id="actions" class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="?page=Salas" class="btn btn-default">Voltar</a>
			</div>
		</div>
	</form>
	<br>

</div>
