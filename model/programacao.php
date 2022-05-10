<?php
require_once(ABSPATH.'config.php');
require_once DBAPI;
 /**
  * enumeração dos portes
  */
 class Programacao extends Database{

   function __construct(){
   }

  function getProgramacao($id){
    $sql = "select a.nome as nomea, a.descricao, a.id_atividade, a.observacao, a.limite, s.nome as nomes, da.data, da.hora, da.id_data_atividade
            from atividade as a
            join sala as s on s.id_sala=a.fk_sala
            join data_atividade as da on a.id_atividade = da.fk_atividade
            where a.fk_evento = ?
            order by da.data, da.hora";
    $parametros = array($id);
    return $this->selectDB($sql,$parametros);
  }

  function getPalestrantes($id){
    $sql = "select p.nome, p.instituicao, p.foto
            from palestrante as p
            join palestrante_atividade as pa on p.id_palestrante=pa.fk_palestrante
            where pa.fk_atividade = ?
            order by p.nome";
    $parametros = array($id);
    return $this->selectDB($sql,$parametros);
  }

  function salvarParticipacao($atividade, $participante){
    $sql = "insert into data_atividade_participante (fk_data_atividade, fk_participante) values (?,?);";
    $parametros = array($atividade,$participante);
    return $this->insertDB($sql,$parametros);
  }

  function deletarParticipacao($atividade, $participante){
    $sql = "delete from data_atividade_participante where fk_data_atividade = ? and fk_participante = ?;";
    $parametros = array($atividade,$participante);
    return $this->deleteDB($sql,$parametros);
  }

  function verificaAtividade($atividade,$participante){
    $sql = "select * from data_atividade_participante where fk_data_atividade = ? and fk_participante = ?;";
    $parametros = array($atividade,$participante);
    return $this->selectDB($sql,$parametros);
  }

}



 ?>
