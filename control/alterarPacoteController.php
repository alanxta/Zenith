<?php
require_once '../model/DTO/PacoteDTO.php';
require_once '../model/DAO/PacoteDAO.php';

$idPacote =  $_POST['idPac'];
$nomePacote = $_POST['nomePac'];
$valorVendaPacote = $_POST['valorVendaPac'];
$situacaoPacote = $_POST['situacaoPac'];
$tituloPacote = $_POST['tituloPac'];
$descricaoPacote = $_POST['descricaoPac'];


$pacoteDTO = new PacoteDTO;
$pacoteDTO->setIdPac($idPacote);
$pacoteDTO->setNomePac($nomePacote);
$pacoteDTO->setValorVendaPac($valorVendaPacote);
$pacoteDTO->setSituacaoPac($situacaoPacote);
$pacoteDTO->setTituloPac($tituloPacote);
$pacoteDTO->setDescricaoPac($descricaoPacote);





$pacoteDAO = new PacoteDAO();

$sucesso = $pacoteDAO->alterarPacote($pacoteDTO);

if ($sucesso) {
  $msg = "Pacote alterado com sucesso!";

} else {
  $msg = "Aconteceu um prob
  lema na alteração." . $sucesso;
}

?>