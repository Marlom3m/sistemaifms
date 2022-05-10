<?php
 require_once  ABSPATH.'model/atividade.php';
 require_once  ABSPATH.'model/sala.php';
 require_once  ABSPATH.'model/palestrante.php';

function createCard($atividade)
{
  // colocar a tabela aq

  $card = "<tr>";
  $card = $card . "<td>{$atividade->getIdAtividade()}</td>\n"; //imprime o id do atividade
  $card = $card . "<td>{$atividade->getNome()}</td>\n"; //imprime o Nome do atividade
  $card = $card . "<td>{$atividade->getDescricao()}</td>\n"; //imprime o Nome do atividade
  $card = $card . "<td>{$atividade->getObservacao()}</td>\n"; //imprime o Nome do atividade
  $card = $card . "<td>{$atividade->getLimite()}</td>\n"; //imprime o Nome do atividade
  $card = $card . "<td>{$atividade->getSala()}</td>\n"; //imprime o Nome do atividade
  $card = $card . "<td>{$atividade->getEvento()}</td>\n"; //imprime o Nome do atividade
  $card = $card . "<td class='actions text-left'>\n";
  $card = $card . "<a href='?page=editar_atividade&id_atividade=".$atividade->getIdAtividade()."' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Editar</a>\n";
 // $card = $card . "<a href='' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#delete-modal' onclick='deletar()'>\n";
//  $card = $card . "<i class='fa fa-trash'></i> Excluir \n";
 // $card = $card . "</a>\n";
  $card = $card . "</td>\n";
  $card = $card . "</tr>\n";

  return $card;
}

function createSelectSala($sala){
    $card = "<option value={$sala->getIdSala()}>{$sala->getNome()}</option>";
    return $card;
}
function createSelectPalestrante($palestrante){
    $card = "<option value={$palestrante->getIdPalestrante()}>{$palestrante->getNome()}</option>";
    return $card;
}
 ?>
