<?php

    require_once '../model/DTO/pacoteDTO.php';
    require_once '../model/DAO/pacoteDAO.php';
    
      $pacoteDAO = new PacoteDAO();
            
      $todos = $pacoteDAO->listarPacotes();

    // echo '<pre>';
    // var_dump($todos);



?>