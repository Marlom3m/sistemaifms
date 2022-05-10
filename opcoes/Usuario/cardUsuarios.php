<?php

 require_once  ABSPATH.'model/usuario.php';


function createCard($usuario)
{
  // colocar a tabela aq

  $card = "<tr>";
  $card = $card . "<td>{$usuario->getIdUsuario()}</td>\n"; //imprime o id do usuario
  $card = $card . "<td>{$usuario->getNome()}</td>\n"; //imprime o Nome do usuario
  $card = $card . "<td>{$usuario->getCpf()}</td>\n"; //imprime o ano do usuario
  $card = $card . "<td>{$usuario->getEmail()}</td>\n"; //imprime o dia inicial do usuario
  $card = $card . "<td>{$usuario->getInstituicao()}</td>\n"; //imprime o Dia final do usuario
  $card = $card . "<td>{$usuario->getRa()}</td>\n"; //imprime o Dia final do usuario
  $card = $card . "<td class='actions text-left'>\n";
  $card = $card . "<a href='?page=editar_usuario&id_usuario=".$usuario->getIdUsuario()."' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Editar</a>\n";
 // $card = $card . "<a href='' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#delete-modal' onclick='deletar()'>\n";
 // $card = $card . "<i class='fa fa-trash'></i> Excluir \n";
//  $card = $card . "</a>\n";
  $card = $card . "</td>\n";
  $card = $card . "</tr>\n";

  return $card;
}

 ?>
