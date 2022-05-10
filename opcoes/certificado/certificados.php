<script type="text/javascript">
 function esconderTudo(){
   desativar("participacao");
   desativar("palestrante");
 }
 function mudarAction(escolha){
    if(escolha.value=="0"){
      esconderTudo();
    }else if(escolha.value=="1"){
      ativar("participacao");
      desativar("palestrante");

    }else if(escolha.value=="2"){
      ativar("palestrante");
      desativar("participacao");
    }
  }

  function ativar(el) {
        document.getElementById(el).style.display = 'block';

    }
    function desativar(el) {
        document.getElementById(el).style.display = 'none';
    }

    function mudarEstado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none")
            document.getElementById(el).style.display = 'block';
        else
            document.getElementById(el).style.display = 'none';
    }

  window.onload=function(){
    esconderTudo();
    desativar("registro2");
    desativar("registro3");
  }
 </script>

<?php
    require_once ABSPATH.'model/usuario.php';
    $usuario = unserialize($_SESSION['usuario']);
    if($usuario->getEmail() == "marlom"){

?>
	  <!-- tentando arrumar o fomulario-->
	  <div class="container" >
      <h3 class="text-center">CERTIFICADOS</h3>
      <center><a href='participacao.pdf'><button class='btn btn-primary btn-lg'>CERTIFICADOS DE PARTICIPAÇÃO</button></a></center>;
      <center><a href='palestrante.pdf'><button class='btn btn-primary btn-lg'>CERTIFICADOS PALESTRANTES</button></a></center><br>;
    </div>
    <div class="container" >
      <h3 class="text-center">MODELO DE CERTIFICADO</h3>
      <div class="form-group">
        <select class="form-control" id="sel1" onchange="mudarAction(this)">
          <option value="0">Escolha um modelo de certificado</option>
          <option value="2">Palestrantes</option>
          <option value="1">Participação</option>
        </select>
      </div>
      
<?php
    }else{
?>
    <div class="container" >
      <h3 class="text-center">CERTIFICADOS</h3>
      <center><a href='participacao.pdf'><button class='btn btn-primary btn-lg'>CERTIFICADOS DE PARTICIPAÇÃO</button></a></center>;
      <center><a href='palestrante.pdf'><button class='btn btn-primary btn-lg'>CERTIFICADOS PALESTRANTES</button></a></center><br>;
    </div>
<?php
    }
?>
  <!-- CERTIFICADO AVALIADORES -->
      <div id="palestrante">
      <form action="?page=certificados_palestrante" method="post" enctype="multipart/form-data" >
        <div class="row">
          <div class="form-group col-md-6">
            Frente:
            <img src="opcoes/certificao/imagens/avalfrente.jpg" width="100%">
          </div>
          <div class="form-group col-md-6">
            Verso:
            <img src="opcoes/certificao/imagens/avalverso.jpg" width="100%">
          </div>
        </div>
        <div class="form-group">
           <label>Texto:</label>
           <textarea class="form-control" rows="4" name="arquivo['texto']" required>
             Exemplo: do Instituto Federal de Educação, Ciência e Tecnologia de Mato Grosso do Sul, realizada de 04 a 08 de Outubro de 2021.
           </textarea>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label>Local/Campus:</label>
            <input type="text" class="form-control" name="arquivo['campus']" required>
          </div>
          <div class="form-group col-md-4">
            <label>Data:</label>
            <input type="date" class="form-control" placeholder="dd/mm/aaaa" name="arquivo['data']" required>
          </div>

          <div class="form-group col-md-4">
            <label>Último Registro:</label>
            <input type="number" class="form-control" name="arquivo['ult_registro']">
          </div>
        </div>
        <div class="form-check" >
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" onclick="mudarEstado('registro2')" id="check2">Registrar no Livro
          </label>
        </div>
        <div id="registro2">
          <div class="row">
            <div class="form-group col-md-3">
              <label>Registros por página:</label>
                <input type="number" class="form-control"  name="arquivo['reg_pagina']">
            </div>
            <div class="form-group col-md-3">
              <label>Linha da pagina atual:</label>
              <input type="number" class="form-control"  name="arquivo['linha']">
            </div>
            <div class="form-group col-md-3">
              <label>Página:</label>
              <input type="number" class="form-control"  name="arquivo['pagina']">
            </div>
            <div class="form-group col-md-3">
              <label>Livro:</label>
              <input type="number" class="form-control"  name="arquivo['livro']">
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group col-md-6">
            <p>Frente do Certificado:</p>
            <input type="file" class="form-control-file"  name="arquivo1" required>
          </div>
          <div class="form-group col-md-6">
            <p>Verso do Certificado:</p>
            <input type="file" class="form-control-file"  name="arquivo2" required>

          </div>
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-primary" formtarget="_blank">Enviar</button>
        </div>
    </form>
  </div>

    <!-- CERTIFICADO PARTICIPAÇÃO -->
      <div id="participacao">
      <form action="?page=certificados_participacao" method="post" enctype="multipart/form-data" >
        <div class="row">
          <div class="form-group col-md-6">
            Frente:
            <img src="../imagens/partfrente.jpg" width="100%">
          </div>
          <div class="form-group col-md-6">
            Verso:
            <img src="../imagens/2premio.jpg" width="100%">
          </div>
        </div>
        <div class="form-group">
           <label>Texto:</label>
           <textarea class="form-control" rows="4" name="arquivo['texto']" required>Exemplo: foi apresentado na VIII Feira de Ciências e Tecnologia da Fronteira, FECIFRON 2020, realizada nos dias 19 e 20 de outubro 2020.</textarea>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label>Local/Campus:</label>
            <input type="text" class="form-control" name="arquivo['campus']" required>
          </div>
          <div class="form-group col-md-4">
            <label>Data:</label>
            <input type="date" class="form-control" placeholder="dd/mm/aaaa" name="arquivo['data']" required>
          </div>

          <div class="form-group col-md-4">
            <label>Último Registro:</label>
            <input type="number" class="form-control" name="arquivo['ult_registro']">
          </div>
        </div>
        <div class="form-check" >
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" onclick="mudarEstado('registro3')" id="check3">Registrar no Livro
          </label>
        </div>
        <div id="registro3">
          <div class="row">
            <div class="form-group col-md-3">
              <label>Registros por página:</label>
                <input type="number" class="form-control"  name="arquivo['reg_pagina']">
            </div>
            <div class="form-group col-md-3">
              <label>Linha da pagina atual:</label>
              <input type="number" class="form-control"  name="arquivo['linha']">
            </div>
            <div class="form-group col-md-3">
              <label>Página:</label>
              <input type="number" class="form-control"  name="arquivo['pagina']">
            </div>
            <div class="form-group col-md-3">
              <label>Livro:</label>
              <input type="number" class="form-control"  name="arquivo['livro']">
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group col-md-6">
            <p>Frente do Certificado:</p>
            <input type="file" class="form-control-file"  name="arquivo1" required>
          </div>
          <div class="form-group col-md-6">
            <p>Verso do Certificado:</p>
            <input type="file" class="form-control-file"  name="arquivo2" required>

          </div>
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-primary" formtarget="_blank">Enviar</button>
        </div>
    </form>
  </div>
	</div>
