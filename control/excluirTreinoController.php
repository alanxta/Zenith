<?php

    require_once '../model/DTO/TreinoDTO.php';
    require_once '../model/DAO/TreinoDAO.php';

    error_reporting(0);

      $idTre = $_GET['idTre'];

      $treinoDAO = new TreinoDAO();
      
      $sucesso = $treinoDAO->excluirTreino($idTre);

      if ($sucesso) {
        $msg = "Treino excluido com sucesso!";

      } else {
        $msg = "Aconteceu um problema na exclusao." . $sucesso;
      }


?>