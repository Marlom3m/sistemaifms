<script>
function desativar(el1) {
  document.getElementById(el1).style.display = 'none';
}
function mudarEstado(el1) {
  var display = document.getElementById(el1).style.display;
  if(display == "none"){
    document.getElementById(el1).style.display = 'block';
  }else{
   document.getElementById(el1).style.display = 'none';
	}
}
window.onload=function(){
  desativar("alterar");

}
</script>
<?php
require_once ABSPATH.'model/usuario.php';
require_once ABSPATH.'model/participante.php';
require_once ABSPATH.'opcoes/Turma/gridTurmas.php';
require_once ABSPATH.'controle/turmas.php';
require_once ABSPATH.'model/turno.php';


$usuario = unserialize($_SESSION['usuario']);
$participante = new Participante();

?>
<div class="container col-md-5" >
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
  }
  ?>
</div>
<div class="container shadow-lg p-3 mb-4 bg-white">
  <h3 class="text-center">Participante</h3>
  <p class="font-weight-bold">Nome: <?php echo $usuario->getNome();?></p>
  <p class="font-weight-bold">E-mail: <?php echo $usuario->getEmail();?></p>
  <p class="font-weight-bold">CPF: <?php echo $usuario->getCpf();?></p>
  <p class="font-weight-bold">Instituicao: <?php echo $usuario->getInstituicao();?></p>
  <p class="font-weight-bold"><?php if(!empty($usuario->getComunidade())){?>Comunidade Quilombola: <?php echo $usuario->getComunidade();}?></p>
  <p class="text-center text-white bg-dark">Qualquer informação incorreta acima, enviar e-mail para marlom.marques@ifms.edu.br</p>
</div>
<div class="container p-3" id="senha">
  <?php
    if($usuario->getSenha()=="mudar123"){
  ?>
  <div class="row p-3 justify-content-center border border-danger">
    <h4 class="text-danger">Sua senha ainda é a padrão "mudar123". Altere a sua senha.</h4>
  </div>
  <?php
  }
  ?>
  <div class="row p-3 justify-content-center">
    <button class="btn btn-secondary" onclick="mudarEstado('alterar');mudarEstado('senha');">Alterar Senha</button>
  </div>
</div>
<div class="container p-3" id="alterar">
  <form action="?page=usuario_save" method="post">
    <div class="row justify-content-center">
      <div class="form-group col-md-6">
        <label for="nome">Nova Senha:</label>
        <input type="password" class="form-control" name="senha" required>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="form-group col-md-6">
        <label for="nome">Confirmar Nova Senha:</label>
        <input type="password" class="form-control" name="confsenha" required>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="form-group col-md-6">
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <button class="btn btn-secondary" onclick="mudarEstado('alterar');mudarEstado('senha');">Cancelar</button>
      </div>
    </div>
  </form>
</div>
<?php

if($participante->existe($usuario->getIdUsuario(),2)){
  $part = unserialize($_SESSION['participante']);
  $certificado = $part->pegarCertificado();
  if(!empty($certificado))
  echo "<center><a href='certificados/participacao/".$certificado[0]->nome."'><button class='btn btn-primary btn-lg'>EMISSÃO DO CERTIFICADO</button></a></center><br>";
  $atividades = $part->pesquisaAtividades();
  if(!empty($atividades)){
    echo "<div class='container border border-dark justify-content-center pt-3 ' style='background-color: #aba993'>";
    echo "<h4 class='text-center text-white'>Palestras - Inscritas</h4>";
    echo "<div class='card-columns'>";
      foreach ($atividades as $indice => $atividade) {
?>
<div class="card bg-light">
<div class="card-body text-center">
    <div class="card-header font-weight-bold" style="background-color: #f4b413"><?php echo $atividade->anome;?></div>
    <div class="card-body">
      <?php
        echo $atividade->descricao;
        date_default_timezone_set ('America/Cuiaba');
		    $hojeDia = date("Y-m-d");
        if($hojeDia==$atividade->data){
          if($atividade->presenca==1){
            echo "<div class='text-success'>Presença confirmada</div>";
          }else{
        ?>
        <form action="?page=participante_save" method="post">
          <div class="row p-3 border border-warning">
            <div class="form-group col-md-12">
              <input type="hidden" name="presenca" value="<?php echo $atividade->id_data_atividade; ?>">
              <label class="text-danger">Registre a presença informando o código disponível durante a palestra:</label>
              <input type="text" class="form-control" name="codigo" placeholder="Escreva o código" required="true">
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </div>
        </form>
        <?php
          }
        }else if($hojeDia>$atividade->data){
          if($atividade->presenca==1){
            echo "<div class='text-success'>Presença confirmada</div>";
          }else{
            echo "<div class='text-danger'>Não participou</div>";
          }
        }
      ?>
    </div>
    <div class="card-footer font-italic "><?php echo "Data: ".date("d/m", strtotime($atividade->data))." Hora: ".date("H:i", strtotime($atividade->hora));?></div>
</div>
</div>

<?php
      }
      echo "</div>";
      echo "</div>";
  }
}else{
?>
<div class="container border p-3 border-danger text-center bg-white">
  <h3 class="text-danger">Você ainda não está está participando do evento, clique abaixo para participar</h3>
  <form action="?page=participante_save" method="post">
    <?php
      if(!empty($usuario->getRa())){
    ?>
    <div class="form-group form-inline  justify-content-center col-md-12">
      <label for="nome" class="font-weight-bold">Campus:</label>
      <select class="form-control m-2" name="turma" required>
        <?php
        $turmas = allTurmas();
        echo generatedSelectTurma($turmas);
         ?>
      </select>
    </div>
    <?php
      }
    ?>
    <div class="row">
      <div class="col-md-12">
        <input type="hidden" class="form-control" name="participante" value="<?php echo $usuario->getIdUsuario();?>">
        <button type="submit" class="btn-lg btn-primary">Participar</button>
      </div>
    </div>
  </form>
</div>
<?php

}
 ?>
