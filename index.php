<?php
  require_once 'config.php';
  include(HEADER_TEMPLATE);
//faz o caminho sem sair do index
  if (!isset($_GET['page'])) {
    include 'view/index.php';
  }else if ($_GET['page'] == 'eventos') {
    include 'opcoes/Evento/lista_evento.php';
  }else if($_GET['page'] == 'Salas'){
    include 'opcoes/Sala/lista_sala.php';
  }else if($_GET['page'] == 'Turnos'){
    include 'opcoes/Turno/lista_turno.php';
  }else if($_GET['page'] == 'Palestrantes'){
    include 'opcoes/Palestrante/lista_palestrante.php';
  }else if($_GET['page'] == 'Atividades'){
    include 'opcoes/Atividade/lista_atividade.php';
  }else if($_GET['page'] == 'Turmas'){
    include 'opcoes/Turma/lista_turma.php';
  }else if($_GET['page'] == 'Usuarios'){
    include 'opcoes/Usuario/lista_usuario.php';
  }else if($_GET['page'] == 'Administradores'){
    // include 'caminho para index de Administradores';
  }else if($_GET['page'] == 'evento_add'){
    include 'opcoes/Evento/adicionar_evento.php';
  }else if($_GET['page'] == 'certificados'){
    include 'opcoes/certificado/certificados.php';
  }else if($_GET['page'] == 'certificados_participacao'){
    include 'opcoes/certificado/participacao.php';
  }else if($_GET['page'] == 'certificados_palestrante'){
    include 'opcoes/certificado/palestrante.php';
  }else if($_GET['page'] == 'evento_save'){
    include 'controle/eventos.php';
  }else if($_GET['page'] == 'turma_add'){
    include 'opcoes/Turma/adicionar_turma.php';
  }else if($_GET['page'] == 'turma_save'){
    include 'controle/turmas.php';
  }else if($_GET['page'] == 'turno_add'){
    include 'opcoes/Turno/adicionar_turno.php';
  }else if($_GET['page'] == 'turno_save'){
    include 'controle/turnos.php';
  }else if($_GET['page'] == 'palestrante_add'){
    include 'opcoes/Palestrante/adicionar_palestrante.php';
  }else if($_GET['page'] == 'palestrante_save'){
    include 'controle/palestrantes.php';
  }else if($_GET['page'] == 'editar_turno'){
    include 'opcoes/turno/editar_turno.php';
  }else if($_GET['page'] == 'editar_sala'){
    include 'opcoes/sala/editar_sala.php';
  }else if($_GET['page'] == 'editar_palestrante'){
    include 'opcoes/palestrante/editar_palestrante.php';
  }else if($_GET['page'] == 'editar_evento'){
    include 'opcoes/evento/editar_evento.php';
  }else if($_GET['page'] == 'editar_atividade'){
    include 'opcoes/atividade/editar_atividade.php';
  }else if($_GET['page'] == 'programacao_save'){
    include 'controle/programacao.php';
  }else if($_GET['page'] == 'atividade_add'){
    include 'opcoes/Atividade/adicionar_atividade.php';
  }else if($_GET['page'] == 'editar_turma'){
    include 'opcoes/turma/editar_turma.php';
  }else if($_GET['page'] == 'atividade_save'){
    include 'controle/atividades.php';
  }else if($_GET['page'] == 'sala_add'){
    include 'opcoes/Sala/adicionar_sala.php';
  }else if($_GET['page'] == 'sala_save'){
    include 'controle/salas.php';
  }else if($_GET['page'] == 'editar_usuario'){
    include 'opcoes/Usuario/editar_usuario.php';
  }else if($_GET['page'] == 'usuario_add'){
    include 'opcoes/Usuario/adicionar_usuario.php';
  }else if($_GET['page'] == 'participante_save'){
    include 'controle/participantes.php';
  }else if($_GET['page'] == 'usuario_save'){
    include 'controle/usuarios.php';
  }else if($_GET['page'] == 'cpf'){
    include 'opcoes/Usuario/teste_cpf.php';
  }else if($_GET['page'] == 'login'){
    include 'view/login.php';
  }else if($_GET['page'] == 'refatorar'){
    include 'view/refatorar.php';
  }else if($_GET['page'] == 'participante'){
    include 'view/area_participante.php';
  }else if($_GET['page'] == 'programacao'){
    include 'view/programacao.php';
  }else if($_GET['page'] == 'fazer_login'){
    include 'controle/login.php';
  }else if($_GET['page'] == 'logout'){
    include 'controle/logout.php';
  }else{
    include 'view/index.php';
  }

  include(FOOTER_TEMPLATE);
?>
