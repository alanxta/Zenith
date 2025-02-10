<?php
session_start();
require_once '../model/DAO/UsuarioDAO.php';
require_once '../model/DTO/UsuarioDTO.php';


//receber os dados do formulario
$nomeUsuario = strip_tags($_POST["nomeUsu"]);
$emailUsuario = strip_tags($_POST["emailUsu"]);
$cpfUsuario = strip_tags($_POST["cpfUsu"]);
$dtNascimentoUsuario = ($_POST["dtNascimentoUsu"]);
$telefoneUsuario = strip_tags($_POST["telefoneUsu"]);
$situacaoUsuario = strip_tags($_POST["situacaoUsu"]);
$perfilUsuario = strip_tags($_POST["perfilUsu"]);
$senhaUsuario = MD5($_POST["senhaUsu"]);
$fotoUsuario = "";


////echo "{$senhaUsuario}";
//criar o objeto DTO para armazenar os dados do formulario
$usuarioDTO = new UsuarioDTO();

$usuarioDTO->setNomeUsu($nomeUsuario);
$usuarioDTO->setEmailUsu($emailUsuario);
$usuarioDTO->setCpfUsu($cpfUsuario);
$usuarioDTO->setDtNascimentoUsu($dtNascimentoUsuario);
$usuarioDTO->setTelefoneUsu($telefoneUsuario);
$usuarioDTO->setSituacaoUsu($situacaoUsuario);
$usuarioDTO->setPerfilUsu($perfilUsuario);
$usuarioDTO->setSenhaUsu($senhaUsuario);


if (isset($_FILES["fotoUsu"])) {
  $Arquivo = $_FILES["fotoUsu"]["name"];
  $pastaDestino = "../imagemUsu";
  $Arquivo = uniqid()."_".$Arquivo;
  $arqDestino = $pastaDestino.'/'.$Arquivo;
  if (move_uploaded_file($_FILES["fotoUsu"]["tmp_name"], $arqDestino)) {
      $fotoUsuario = $Arquivo;
  }
}

$usuarioDTO->setFotoUsu($fotoUsuario);

//var_dump($usuarioDTO);


//criar o objeto que gravará os dados no banco
$usuarioDAO = new UsuarioDAO();
      
$sucesso = $usuarioDAO->salvarUsuario($usuarioDTO);
if ($sucesso === "E-mail já cadastrado!") {
  echo json_encode(["success" => false, "message" => $sucesso]);
} else if ($sucesso) {
  echo json_encode(["success" => true, "message" => "Usuário cadastrado com sucesso!\n Faça o login para continuar"] );
} else {
  echo json_encode(["success" => false, "message" => "Aconteceu um problema no cadastramento"]);
}
?>
