<?php

    require_once '../model/DTO/UsuarioDTO.php';
    require_once '../model/DAO/UsuarioDAO.php';
    
      $usuarioDAO = new UsuarioDAO();
            
      $todos = $usuarioDAO->listarUsuarios();

    // echo '<pre>';
    // var_dump($todos);



?>