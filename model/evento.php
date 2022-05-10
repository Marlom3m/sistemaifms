<?php
require_once(ABSPATH.'config.php');
require_once DBAPI;
 /**
  * enumeração dos portes
  */
 class Evento extends Database{

   private $id_evento;
   private $nome;
   private $ano;
   private $inicio;
   private $final;


   function __construct(){
  }
    public function getIdEvento()
    {
        return $this->id_evento;
    }

    public function setIdEvento($id_evento)
    {
        $this->id_evento = $id_evento;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome= $nome;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    public function getInicio()
    {
        return $this->inicio;
    }

    public function setInicio($inicio)
    {
        $this->inicio = $inicio;
    }

    public function getFinal()
    {
        return $this->final;
    }

    public function setFinal($final)
    {
        $this->final = $final;
    }



    function salvar(){
      $sql = "insert into evento (nome, ano, inicio, final) values (?,?,?,?)";
      $parametros = array($this->getNome(),$this->getAno(),$this->getInicio(),$this->getFinal());
      return $this->insertDB($sql,$parametros);
    }

    function allAtividades($evento,$table){
      $sql = "select * from atividade where fk_evento = ?";
      $parametros = array($evento);
      return $this->selectDB($sql,$parametros,$table);
    }

    function pesquisaEvento($atributo, $valor){
      $sql = "select * from evento where ".$atributo." = ?";
      $parametros = array($valor);
      $dados = $this->selectDB($sql,$parametros,'evento');
      if(!empty($dados)){
        $this->setIdEvento($dados[0]->getIdEvento());
        $this->setNome($dados[0]->getNome());
        $this->setInicio($dados[0]->getInicio());
        $this->setFinal($dados[0]->getFinal());
        $this->setAno($dados[0]->getAno());
      }
    }

}



 ?>
