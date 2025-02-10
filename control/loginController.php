<?php

session_start();
require_once '../model/DTO/usuarioDTO.php';
require_once '../model/DAO/usuarioDAO.php';


//Valida se o usuário passou pela tela de login
if (!isset($_POST["emailUsu"])) {
  header("location:../view/Login-cadastro.php?msg=Acesso indevido!");
}
$emailUsu = strip_tags($_POST["emailUsu"]);
$senhaUsu = MD5($_POST["senhaUsu"]);
$usuarioDAO = new UsuarioDAO();
$sucesso = $usuarioDAO->validarLogin($emailUsu, $senhaUsu);
if ($sucesso) {
  $msg = "legal!! estou logado!!";
  //Grava os principais dados de login do usuário
  $_SESSION["idUsu"] = $sucesso["idUsu"];
  $_SESSION["nomeUsu"] = $sucesso["nomeUsu"];
  $_SESSION["cpfUsu"] = $sucesso["cpfUsu"];
  $_SESSION["telefoneUsu"] = $sucesso["telefoneUsu"];
  $_SESSION["dtNascimentoUsu"] = $sucesso["dtNascimentoUsu"];
  $_SESSION["fotoUsu"] = $sucesso["fotoUsu"];
  $_SESSION["emailUsu"] = $sucesso["emailUsu"];
  $_SESSION["situacaoUsu"] = $sucesso["situacaoUsu"];
  $_SESSION["perfilUsu"] = $sucesso["perfilUsu"];
  $_SESSION["acessoUsu"] = $sucesso["acessoUsu"];

  // Redireciona para a página correspondente ao perfil do usuário
  switch ($_SESSION["perfilUsu"]) {
    case 'Administrador':
      echo "<script>location.href='../view/Listar.php';</script>";
      break;
    case 'Funcionário':
      echo "<script>location.href='../view/centralFuncionario.php';</script>";
      break;
    case 'Cliente':
      echo "<script>location.href='../view/centralUsuario.php';</script>";
      break;
    default:
    echo "<script>alert('Perfil Inválido');location.href='../view/Login-cadastro.php';</script>";
      break;
  }





} else {
  $msg = "Usuário ou senha inválido!";
  echo "<script>alert('Usuário ou senha inválido');location.href='../view/Login-cadastro.php';</script>";
}

?>