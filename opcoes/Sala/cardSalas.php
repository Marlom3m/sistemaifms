<?php
 require_once  ABSPATH.'model/sala.php';


function createCard($sala)
{
  // colocar a tabela aq

  $card = "<tr>";
  $card = $card . "<td>{$sala->getIdSala()}</td>\n"; //imprime o id do sala
  $card = $card . "<td>{$sala->getNome()}</td>\n"; //imprime o Nome do sala
  $card = $card . "<td class='actions text-left'>\n";
  $card = $card . "<a href='?page=editar_sala&id_sala=".$sala->getIdSala()."' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Editar</a>\n";
  $card = $card . "<a href='' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#delete-modal' onclick='deletar()'>\n";
  $card = $card . "<i class='fa fa-trash'></i> Excluir \n";
  $card = $card . "</a>\n";
  $card = $card . "</td>\n";
  $card = $card . "</tr>\n";

  return $card;
}

 ?>
