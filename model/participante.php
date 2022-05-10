<?php
require_once(ABSPATH.'config.php');
require_once DBAPI;
 /**
  * enumeração dos portes
  */
 class participante extends Database{

   private $id_participante;
   private $fk_usuario;
   private $fk_turma;
   private $fk_turno;



   function __construct(){
  }
    public function getIdParticipante()
    {
        return $this->id_participante;
    }

    public function setIdParticipante($id_participante)
    {
        $this->id_participante = $id_participante;
    }

    public function getUsuario()
    {
        return $this->fk_usuario;
    }

    public function setUsuario($fk_usuario)
    {
        $this->fk_usuario= $fk_usuario;
    }

    public function getTurma()
    {
        return $this->fk_turma;
    }

    public function setTurma($fk_turma)
    {
        $this->fk_turma = $fk_turma;
    }


    public function getTurno()
    {
        return $this->fk_turno;
    }

    public function setTurno($inst)
    {
        $this->fk_turno = $inst;
    }

    function salvar($evento){
      $sql = "insert into participante (fk_usuario, fk_turma, fk_turno) values (?,?,?)";
      $parametros = array($this->getUsuario(),$this->getTurma(),$this->getTurno());
      $id = $this->insertDB($sql,$parametros);
      $sql = "insert into evento_participante (fk_participante, fk_evento) values (?,?)";
      $parametros = array($id,$evento);
      $this->insertDB($sql,$parametros);
      return $id;
    }
    
    function salvarCertificado($participante,$certificado){
      $sql = "insert into certificado (nome, fk_participante) values (?,?)";
      $parametros = array($certificado.".pdf",$participante);
      $id = $this->insertDB($sql,$parametros);
      return $id;
    }

    function pesquisaParticipante($evento, $usuario){
      $sql = "select p.id_participante, p.fk_turno, p.fk_usuario, p.fk_turma
              from participante as p
              join evento_participante as ep ON ep.fk_participante = p.id_participante
              where p.fk_usuario = ? and ep.fk_evento= ?";
      $parametros = array($usuario,$evento);
      $dados = $this->selectDB($sql,$parametros,'participante');
      if(!empty($dados)){
        $this->setIdParticipante($dados[0]->getIdParticipante());
        $this->setUsuario($dados[0]->getUsuario());
        $this->setTurma($dados[0]->getTurma());
        $this->setTurno($dados[0]->getTurno());
      }
      return $this;
    }

    function existe($usuario, $evento){
      $sql = "select *
              from participante as p
              join evento_participante as ep ON ep.fk_participante = p.id_participante
              where p.fk_usuario = ? and ep.fk_evento = ?";
      $parametros = array($usuario,$evento);
      $dados = $this->selectDB($sql,$parametros);
      if(empty($dados)){
        return false;
      }
      return true;
    }

    function pesquisaAtividades(){
      $sql = "select a.nome as anome, s.nome as snome, a.descricao, da.data, da.hora, da.id_data_atividade, dap.presenca
              from atividade as a
              join sala as s ON s.id_sala = a.fk_sala
              join data_atividade as da ON da.fk_atividade = a.id_atividade
              join data_atividade_participante as dap ON da.id_data_atividade = dap.fk_data_atividade
              where dap.fk_participante = ?
              order by da.data, da.hora";
      $parametros = array($this->getIdParticipante());
      return $this->selectDB($sql,$parametros);
    }

    function nomesCertificados($evento){
      $sql = "select u.nome as unome, p.id_participante
              from atividade as a
              join data_atividade as da ON da.fk_atividade = a.id_atividade
              join data_atividade_participante as dap ON da.id_data_atividade = dap.fk_data_atividade
              join participante as p ON dap.fk_participante = p.id_participante
              join usuario as u ON p.fk_usuario = u.id_usuario
              where a.fk_evento = ? and dap.presenca = 1
              group by unome
              order by unome";
      $parametros = array($evento);
      return $this->selectDB($sql,$parametros);
    }
    function atividadesCertificado($evento, $idpart){
      $sql = "select a.nome as anome, da.duracao
              from atividade as a
              join data_atividade as da ON da.fk_atividade = a.id_atividade
              join data_atividade_participante as dap ON da.id_data_atividade = dap.fk_data_atividade
              join participante as p ON dap.fk_participante = p.id_participante
              join usuario as u ON p.fk_usuario = u.id_usuario
              where a.fk_evento = ? and dap.presenca = 1 and p.id_participante = ?
              order by anome";
      $parametros = array($evento, $idpart);
      return $this->selectDB($sql,$parametros);
    }

    function registraPresenca($atividade){
      $sql = "update data_atividade_participante
              set presenca = 1
              where fk_participante = ? and fk_data_atividade = ?";
      $parametros = array($this->getIdParticipante(),$atividade);
      return $this->updateDB($sql,$parametros);
    }
    
    function pegarCertificado(){
      $sql = "select nome 
              from certificado
              where fk_participante = ?";
      $parametros = array($this->getIdParticipante());
      return $this->selectDB($sql,$parametros);
    }

}



 ?>
