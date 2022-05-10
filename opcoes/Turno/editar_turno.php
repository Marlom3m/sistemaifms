<div class="container">
	<div class="container">

		<?php
		require_once  ABSPATH.'model/turno.php';
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
	<?php
		$turno = New Turno();
		$turno->pesquisaTurno("id_turno",$_GET["id_turno"]);
				?>
<h2>Novo Turno</h2>
	<form action="?page=turno_save" method="post">

	<!-- area de campos do form -->
	<hr/>	<!-- linha de separação -->
		<div class="row">
			<div class="form-group col-md-8">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" name="nome" value="<?php echo $turno ->getNome();?>" required>
			</div>
		</div>
		<div id="actions" class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="?page=Turnos" class="btn btn-default">Voltar</a>
			</div>
		</div>
	</form>
	<br>

</div>
