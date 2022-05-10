<div class="container text-dark font-weight-bold" >
  <br>
	<div class="container">
		<?php
     require_once  ABSPATH.'model/usuario.php';
			if (!empty($_SESSION['type'])) {
		?>

		<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php
				if(!empty($_SESSION['msgId']))
					echo $_SESSION['msgId'].'<br>';
				if(!empty($_SESSION['msgNome']))
					echo $_SESSION['msgNome'].'<br>';
				if(!empty($_SESSION['message']))
					echo $_SESSION['message'].'<br>';
			?>
		</div>

		<?php
			unset($_SESSION['type']);
			unset($_SESSION['msgId']);
			unset($_SESSION['msgNome']);
			unset($_SESSION['message']);
		?>

		<?php } ?>
	</div>
  <?php
    $usuario = new Usuario();
    $usuario->pesquisaUsuario("id_usuario",$_GET["id_usuario"])
  ?>
<h2>Novo Usuario</h2>
	<form action="?page=usuario_save" method="post">

	<!-- area de campos do form -->
	<hr/>	<!-- linha de separação -->
		<div class="row">
			<div class="form-group col-md-10">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" name="nome" value="<?php echo $usuario->getNome();?>" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3">
				<label for="nome">CPF (apenas números):</label>
				<input type="text" class="form-control" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" name="cpf" name="nome" value="<?php echo $usuario ->getCpf();?>"  maxlength="11" required>
			</div>
			<div class="form-group col-md-7">
				<label for="nome">E-mail:</label>
				<input type="email" class="form-control"  name="email" name="nome" value="<?php echo $usuario ->getEmail();?>"  required>
			</div>
		</div>
		<div id="actions" class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="index.php" class="btn btn-default">Voltar</a>
			</div>
		</div>
	</form>

</div>
