<?php

    require_once '../model/DTO/PacoteDTO.php';
    require_once '../model/DAO/PacoteDAO.php';

    error_reporting(0);

      $idPac = $_GET['idPac'];

      $pacoteDAO = new PacoteDAO();
      
      $sucesso = $pacoteDAO->excluirPacotes($idPac);

      if ($sucesso) {
        $msg = "Pacote excluido com sucesso!";

      } else {
        $msg = "Aconteceu um problema na exclusao." . $sucesso;
      }


?>