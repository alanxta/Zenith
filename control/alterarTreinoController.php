<?php
require_once '../model/DTO/TreinoDTO.php';
require_once '../model/DAO/TreinoDAO.php';

$idTreino =  $_POST['idTre'];
$descricaoTreino = $_POST['descricaoTre'];
$statusTreino = $_POST['statusTre'];
$tituloTreino = $_POST['tituloTre'];
$videoTreino = $_POST['videoTre'];
$tipoTreino = $_POST['tipoTre'];

$treinoDTO = new TreinoDTO;
$treinoDTO->setIdTre($idTreino);
$treinoDTO->setDescricaoTre($descricaoTreino);
$treinoDTO->setStatusTre($statusTreino);
$treinoDTO->setTituloTre($tituloTreino);
$treinoDTO->setVideoTre($videoTreino);
$treinoDTO->setTipoTre($tipoTreino);




$treinoDAO = new TreinoDAO();

$sucesso = $treinoDAO->alterarTreino($treinoDTO);

if ($sucesso) {
  $msg = "Treino alterado com sucesso!";

} else {
  $msg = "Aconteceu um problema na alteração." . $sucesso;
}

?>