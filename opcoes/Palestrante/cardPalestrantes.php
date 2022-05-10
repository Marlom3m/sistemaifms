<?php
 require_once  ABSPATH.'model/palestrante.php';


function createCard($palestrante)
{
  // colocar a tabela aq

  $card = "<tr>";
  $card = $card . "<td>{$palestrante->getIdPalestrante()}</td>\n"; //imprime o id do palestrante
  $card = $card . "<td>{$palestrante->getNome()}</td>\n"; //imprime o Nome do palestrante
  $card = $card . "<td>{$palestrante->getEmail()}</td>\n"; //imprime o dia inicial do palestrante
  $card = $card . "<td>{$palestrante->getInstituicao()}</td>\n"; //imprime o ano do palestrante
  $card = $card . "<td class='actions text-left'>\n";
  $card = $card . "<a href='?page=editar_palestrante&id_palestrante=".$palestrante->getIdPalestrante()."' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Editar</a>\n";
  $card = $card . "<a href='' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#delete-modal' onclick='deletar()'>\n";
  $card = $card . "<i class='fa fa-trash'></i> Excluir \n";
  $card = $card . "</a>\n";
  $card = $card . "</td>\n";
  $card = $card . "</tr>\n";

  return $card;
}

 ?>
