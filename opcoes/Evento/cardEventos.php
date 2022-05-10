<?php
 require_once  ABSPATH.'model/evento.php';


function createCard($evento)
{
  // colocar a tabela aq

  $card = "<tr>";
  $card = $card . "<td>{$evento->getIdEvento()}</td>\n"; //imprime o id do Evento
  $card = $card . "<td>{$evento->getNome()}</td>\n"; //imprime o Nome do Evento
  $card = $card . "<td>{$evento->getAno()}</td>\n"; //imprime o ano do Evento
  $card = $card . "<td>{$evento->getInicio()}</td>\n"; //imprime o dia inicial do Evento
  $card = $card . "<td>{$evento->getFinal()}</td>\n"; //imprime o Dia final do Evento
  $card = $card . "<td class='actions text-left'>\n";
  $card = $card . "<a href='?page=editar_evento&id_evento=".$evento->getIdEvento()."' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Editar</a>\n";
  $card = $card . "<a href='' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#delete-modal' onclick='deletar()'>\n";
  $card = $card . "<i class='fa fa-trash'></i> Excluir \n";
  $card = $card . "</a>\n";
  $card = $card . "</td>\n";
  $card = $card . "</tr>\n";

  return $card;
}

 ?>
