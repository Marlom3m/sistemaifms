<?php
require_once ABSPATH.'model/usuario.php';
require_once ABSPATH.'model/participante.php';

if (!empty($_POST['senha'])) {
  $usuario = new Usuario();
  if($usuario->existe('email',$_POST['email'])){
  	$usuario->pesquisaUsuario('email', $_POST['email']);
  	if(password_verify($_POST['senha'], $usuario->getSenha())){
  		$_SESSION['usuario'] = serialize($usuario);
  		$_SESSION['nome'] = $usuario->getNome();
  		$_SESSION['tipo'] = $usuario->getTipo();
      $participante = new Participante();
      $participante->pesquisaParticipante(2,$usuario->getIdUsuario());
      if(!empty($participante->getIdParticipante()))
      $_SESSION['participante'] = serialize($participante);
  		$_SESSION['message'] = "Logado";
  		$_SESSION['type'] = 'success';
      header('Location: '.BASEURL.'?page=participante');exit;
  	}else{
  		$_SESSION['message'] = "Senhas não conferem";
  		$_SESSION['type'] = 'danger';
  	}
  }else{
    $_SESSION['message'] = "E-mail não cadastrado";
    $_SESSION['type'] = 'danger';
  }
	header('Location: '.BASEURL.'?page=login');exit;
}
if (!empty($_POST['cpf'])) {
  $usuario = new Usuario();
  if($usuario->existe('email',$_POST['email'])){
  	$usuario->pesquisaUsuario('email', $_POST['email']);
  	if($_POST['cpf'] == $usuario->getCpf()){
      $usuario->setSenha(password_hash('mudar123', PASSWORD_DEFAULT));
      $usuario->alterarSenha();

  		$_SESSION['message'] = "Senha refatorada com sucesso - senha atual: mudar123";
  		$_SESSION['type'] = 'success';
  	}else{
  		$_SESSION['message'] = "CPF não cadastrado";
  		$_SESSION['type'] = 'danger';
      header('Location: '.BASEURL.'?page=refatorar');exit;
  	}
  }else{
    $_SESSION['message'] = "E-mail não cadastrado";
    $_SESSION['type'] = 'danger';
    header('Location: '.BASEURL.'?page=refatorar');exit;
  }
	header('Location: '.BASEURL.'?page=login');exit;
}


 ?>
