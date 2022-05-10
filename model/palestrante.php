<?php
require_once(ABSPATH.'config.php');
require_once DBAPI;
 /**
  * enumeração dos portes
  */
 class Palestrante extends Database{

   private $id_palestrante;
   private $nome;
   private $email;
   private $instituicao;
   private $foto;


   function __construct(){
  }
    public function getIdPalestrante()
    {
        return $this->id_palestrante;
    }

    public function setIdPalestrante($id_palestrante)
    {
        $this->id_palestrante = $id_palestrante;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome= $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getInstituicao()
    {
        return $this->instituicao;
    }

    public function setInstituicao($inst)
    {
        $this->instituicao = $inst;
    }

    function salvar(){
      $sql = "insert into palestrante (nome, email, foto, instituicao) values (?,?,?,?)";
      $parametros = array($this->getNome(),$this->getEmail(), $this->getfoto(),$this->getInstituicao());
      return $this->insertDB($sql,$parametros);
    }

    function pesquisaPalestrante($atributo, $valor){
      $sql = "select * from palestrante where ".$atributo." = ?";
      $parametros = array($valor);
      $dados = $this->selectDB($sql,$parametros,'palestrante');
      if(!empty($dados)){
        $this->setIdPalestrante($dados[0]->getIdPalestrante());
        $this->setNome($dados[0]->getNome());
        $this->setEmail($dados[0]->getEmail());
        $this->setfoto($dados[0]->getfoto());
        $this->setInstituicao($dados[0]->getInstituicao());
      }
    }

    function existe($atributo, $valor){
      $sql = "select * from palestrante where ".$atributo." = ?";
      $parametros = array($valor);
      $dados = $this->selectDB($sql,$parametros);
      if(empty($dados)){
        return false;
      }
      return true;
    }

    function allPalestrantes($table){
      $sql = "select * from ".$table. " ORDER BY nome";
      $parametros = null;
      return $this->selectDB($sql,$parametros,$table);
    }
    
    function gerarCertificados($evento){
      $sql = "select a.nome as anome, p.nome as pnome, e.nome as enome, da.data, da.duracao, e.inicio, e.final
              from atividade as a
              join palestrante_atividade as pa ON pa.fk_atividade = a.id_atividade
              join palestrante as p ON p.id_palestrante= pa.fk_palestrante
              join evento as e ON e.id_evento = a.fk_evento
              join data_atividade as da ON a.id_atividade = da.fk_atividade
              where a.fk_evento = ? 
              order by anome, pnome";
      $parametros = array($evento);
      return $this->selectDB($sql,$parametros);
    }

}



 ?>
