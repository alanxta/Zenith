<?php

    require_once '../model/DTO/treinoDTO.php';
    require_once '../model/DAO/treinoDAO.php';
    
      $treinoDAO = new TreinoDAO();
            
      $todos = $treinoDAO->listarTreinos();

    // echo '<pre>';
    // var_dump($todos);



?>