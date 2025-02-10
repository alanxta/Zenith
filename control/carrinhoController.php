<?php


include_once '../model/DTO/UsuarioDTO.php';
include_once '../model/DTO/PacoteDTO.php';
include_once '../model/DTO/Carrinho.php'; 
include_once '../model/DTO/ItemCarrinho.php';

session_start();

if (!isset($_SESSION['carrinho'])) {
    $carrinho = new Carrinho();
    $_SESSION['carrinho'] = $carrinho;
}else{
    $carrinho = $_SESSION['carrinho'];
}

$usuario = new UsuarioDTO();
$usuario->setIdUsu($_SESSION["idUsuario"]);

$idPac = $_GET["idPac"];
$nomePac = $_GET["nomePac"];
$valorVendaPac = $_GET["valorVendaPac"];

$pacote = new PacoteDTO();    
$pacote->setIdPac($idPac);
$pacote->setNomePac($nomePac);
$pacote->setValorVendaPac($valorVendaPac);

$carrinho->setUsuario($usuario);
$carrinho->addItem($pacote);

echo '<pre>';
var_dump($carrinho);


header("Location: ../view/Cartao.php");

?>

