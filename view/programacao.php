<?php
require_once ABSPATH.'model/programacao.php';
require_once ABSPATH.'model/participante.php';

$programacao = new Programacao();
$programacoes = $programacao->getProgramacao(2);
date_default_timezone_set ('America/Cuiaba');
$hojeDia = date("Y-m-d");
foreach($programacoes as $indice => $programa){
  $palestrantes = $programacao->getPalestrantes($programa->id_atividade);
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
<div class="container border bg-white pt-3">
  <div class="row align-items-center">
    <div class="col-10">
      <h4><?php echo $programa->nomea;?></h4>
      <h6><?php echo $programa->descricao;?></h6>
      <h6 class="font-italic"><?php if(isset($programa->observacao)){echo $programa->observacao;}?></h6>
      <h6 class="font-weight-bold"><?php echo "Data: ".date("d/m", strtotime($programa->data))." Hora: ".date("H:i", strtotime($programa->hora))." hs";?></h6>
      <h6><?php echo "Local: <a href='".$programa->nomes."' target='_blank'>";?>Youtube</a></h6>
      <h5><?php if(count($palestrantes)>1){echo "Palestrantes: ";}else{echo "Palestrante: ";} ?></h5>
      <?php
        foreach($palestrantes as $indice => $palestrante){
       ?>
      <h6 class="font-italic"><?php echo $palestrante->nome; if(isset($palestrante->instituicao)){echo " (".$palestrante->instituicao.")";}?></h6>
      <?php
        }
       ?>
    </div>
    <?php
    if($hojeDia<=$programa->data){
      if(!empty($_SESSION['participante'])){
        $participante = unserialize($_SESSION['participante']);
        if(empty($programacao->verificaAtividade($programa->id_data_atividade,$participante->getIdParticipante()))){
    ?>
    <div class="col-2 justify-content-center ">
      <form action="?page=programacao_save" method="post">
    		<div class="row">
    			<div class="col-md-12">
            <input type="hidden" class="form-control" name="atividade" value="<?php echo $programa->id_data_atividade;?>">
    				<button type="submit" class="btn btn-primary">Participar</button>
    			</div>
    		</div>
    	</form>
    </div>
    <?php
      }else{
    ?>
    <div class="col-2 justify-content-center ">
      <form action="?page=programacao_save" method="post">
    		<div class="row">
    			<div class="col-md-12">
            <input type="hidden" class="form-control" name="desfazer" value="<?php echo $programa->id_data_atividade;?>">
    				<button type="submit" class="btn btn-secondary">Cancelar Participação</button>
    			</div>
    		</div>
    	</form>
    </div>
    <?php
      }
    }else{
     ?>

     <div class="col-2 justify-content-center ">
       <h5>Faça a inscrição para participar</h5>
     </div>

     <?php
     }
   }

      ?>
  </div>
  <div class="row align-items-center">
    <?php
      foreach($palestrantes as $indice => $palestrante){
     ?>
    <img class="col-2 rounded-circle"  src="<?php echo $palestrante->foto; ?>"><br>
    <?php
      }
     ?>
   </div>
</div>
<br>

<?php
}
?>
