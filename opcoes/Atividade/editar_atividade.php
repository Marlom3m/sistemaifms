<div class="container">
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

		<?php
		}
		require_once ABSPATH.'controle/salas.php';
		require_once ABSPATH.'controle/palestrantes.php';
		require_once ABSPATH.'opcoes/Atividade/gridAtividades.php';
		require_once  ABSPATH.'model/atividade.php';
		$atividade = new Atividade();
		$atividade->pesquisaAtividade("id_atividade",$_GET["id_atividade"]);
		?>
	</div>
<h2>Nova Atividade</h2>
	<form action="?page=atividade_save" method="post">

	<!-- area de campos do form -->
	<hr/>	<!-- linha de separação -->
		<div class="row">
			<div class="form-group col-md-12">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" name="nome" value="<?php echo $atividade->getNome();?>" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="nome">Descrição:</label>
				<textarea rows="3" class="form-control" name="descricao" value="<?php echo $atividade->getDescricao();?>" required></textarea>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="nome">Palestrante:</label>
				<select class="form-control" multiple size="3" name="palestrante[]" required>
					<?php
					$palestrantes = allPalestrantes();
					echo generatedSelectPalestrante($palestrantes);
					 ?>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label for="nome">Observação:</label>
				<textarea rows="3" class="form-control" name="observacao" value="<?php echo $atividade->getObservacao();?>"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-8">
				<label for="nome">Local:</label>
				<select class="form-control" name="sala" value="<?php echo $atividade->getSala();?>" required>
					<?php
					$salas = allSalas();
					echo generatedSelectSala($salas);
					 ?>
				</select>
			</div>
			<div class="form-group col-md-4">
				<label for="nome">Limite (0 para sem limite):</label>
				<input type="number" class="form-control" name="limite" value="<?php echo $atividade->getLimite();?>" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="nome">Data:</label>
				<input type="date" class="form-control" name="data" value="<?php echo $dataAtividade->getData();?>" required>
			</div>
			<div class="form-group col-md-4">
				<label for="nome">Hora:</label>
				<input type="time" class="form-control" name="hora" value="<?php echo $dataAtividade->getHora();?>" required>
			</div>
			<div class="form-group col-md-4">
				<label for="nome">Duração:</label>
				<input type="time" class="form-control" name="duracao" value="<?php echo $dataAtividade->getDuracao();?>" required>
			</div>
		</div>
		<div id="actions" class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="?page=Atividades" class="btn btn-default">Voltar</a>
			</div>
		</div>
	</form>
	<br>

</div>
