<?php
require_once(ABSPATH.'config.php');
require_once DBAPI;
 /**
  * enumeração dos portes
  */
 class DataAtividade extends Database{

   private $id_DataAtividade;
   private $data;
   private $hora;
   private $duracao;
   private $fk_atividade;


   function __construct(){
  }
    public function getIdDataAtividade()
    {
        return $this->id_DataAtividade;
    }

    public function setIdDataAtividade($id_DataAtividade)
    {
        $this->id_DataAtividade = $id_DataAtividade;
    }


    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function getDuracao()
    {
        return $this->duracao;
    }

    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;
    }
    public function getAtividade()
    {
        return $this->fk_atividade;
    }

    public function setAtividade($atividade)
    {
        $this->fk_atividade = $atividade;
    }



    function salvar(){
      $sql = "insert into data_atividade (data, hora, duracao, fk_atividade) values (?,?,?,?)";
      $parametros = array($this->getData(),$this->getHora(),$this->getDuracao(),$this->getAtividade());
      return $this->insertDB($sql,$parametros);
    }


}



 ?>
