<?php
require_once(ABSPATH.'config.php');
require_once DBAPI;
 /**
  * enumeração dos portes
  */
 class Usuario extends Database{

   private $id_usuario;
   private $nome;
   private $cpf;
   private $email;
   private $senha;
   private $ra;
   private $tipo;
   private $comunidade;
   private $instituicao;


   function __construct(){
  }
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome= $nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getRa()
    {
        return $this->ra;
    }

    public function setRa($ra)
    {
        $this->ra = $ra;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getComunidade()
    {
        return $this->comunidade;
    }

    public function setComunidade($comunidade)
    {
        $this->comunidade = $comunidade;
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
      $sql = "insert into usuario (nome, cpf, email, senha, ra, tipo, comunidade, instituicao) values (?,?,?,?,?,?,?,?)";
      $parametros = array($this->getNome(),$this->getCpf(),$this->getEmail(),$this->getSenha(),$this->getRa(),$this->getTipo(), $this->getComunidade(),$this->getInstituicao());
      return $this->insertDB($sql,$parametros);
    }

    function pesquisaUsuario($atributo, $valor){
      $sql = "select * from usuario where ".$atributo." = ?";
      $parametros = array($valor);
      $dados = $this->selectDB($sql,$parametros,'usuario');
      if(!empty($dados)){
        $this->setIdUsuario($dados[0]->getIdUsuario());
        $this->setNome($dados[0]->getNome());
        $this->setCpf($dados[0]->getCpf());
        $this->setEmail($dados[0]->getEmail());
        $this->setSenha($dados[0]->getSenha());
        $this->setRa($dados[0]->getRa());
        $this->setComunidade($dados[0]->getComunidade());
        $this->setTipo($dados[0]->getTipo());
        $this->setInstituicao($dados[0]->getInstituicao());
      }
    }

    function existe($atributo, $valor){
      $sql = "select * from usuario where ".$atributo." = ?";
      $parametros = array($valor);
      $dados = $this->selectDB($sql,$parametros);
      if(empty($dados)){
        return false;
      }
      return true;
    }

    function alterarSenha(){
      $sql = "update usuario set senha = ? where id_usuario = ?";
      $parametros = array($this->getSenha(),$this->getIdUsuario());
      return $this->updateDB($sql,$parametros);
    }

        function participantes($evento){
        $sql = "select u.id_usuario, u.nome, u.cpf, u.email, u.instituicao, u. ra from usuario as u join participante as p on p.fk_usuario = u.id_usuario join evento_participante as ep on ep.fk_participante = p.id_participante where ep.fk_evento = ? order by u.nome";
      $parametros = array($evento);
      return $this->selectDB($sql,$parametros,'usuario');
    }

     function totalpart($evento){
        $sql = "select count(fk_participante) as total from evento_participante as ep where ep.fk_evento = ?";
      $parametros = array($evento);
      return $this->selectDB($sql,$parametros);
    }

}



 ?>
