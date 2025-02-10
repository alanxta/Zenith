<?php
require_once '../model/DTO/usuarioDTO.php';
require_once '../model/DAO/usuarioDAO.php';

$idUsuario =  $_POST['idUsu'];
$nomeUsuario = $_POST['nomeUsu'];
$dtNascimentoUsuario = $_POST['dtNascimentoUsu'];
$emailUsuario = $_POST['emailUsu'];
$telefoneUsuario = $_POST['telefoneUsu'];

$usuarioDTO = new UsuarioDTO;
$usuarioDTO->setIdUsu($idUsuario);
$usuarioDTO->setNomeUsu($nomeUsuario);
$usuarioDTO->setDtNascimentoUsu($dtNascimentoUsuario);
$usuarioDTO->setEmailUsu($emailUsuario);
$usuarioDTO->setTelefoneUsu($telefoneUsuario);





$usuarioDAO = new UsuarioDAO();

$sucesso = $usuarioDAO->alterarPerfil($usuarioDTO);

if ($sucesso) {
  $_SESSION['idUsu'] = $idUsuario;
  $_SESSION['nomeUsu'] = $nomeUsuario;
  $_SESSION['dtNascimentoUsu'] = $dtNascimentoUsuario;
  $_SESSION['emailUsu'] = $emailUsuario;
  $_SESSION['telefoneUsu'] = $telefoneUsuario;
  json_encode(["success" => true, "message" => "Usuário alterado com sucesso!"]);
} else {
  json_encode(["success" => false, "message" => "Aconteceu um problema ao alterar o usuário!"]);
}

?>