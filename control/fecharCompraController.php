<?php

session_start();
require_once '../model/DTO/usuarioDTO.php';
require_once '../model/DAO/usuarioDAO.php';

// Verificar se o ID do usuário está na sessão
if (isset($_SESSION['idUsu'])) {
    $idUsuario = $_SESSION['idUsu'];

    
    $usuarioDTO = new UsuarioDTO;
    $usuarioDTO->setIdUsu($idUsuario);

    
    
    $usuarioDAO = new UsuarioDAO();
    $resultado = $usuarioDAO->alterarAcesso($usuarioDTO);

    if ($resultado) {
        $_SESSION['acessoUsu'] = 2;
        // Redirecionar para a página desejada
        echo "<script>alert('Pagamento realizado com sucesso!');location.href='../view/centralUsuario.php';</script>";
        exit;
    } else {
        echo 'Falha ao atualizar o acesso do usuário.';
    }
} else {
    echo 'ID do usuário não está na sessão.';
}
?>