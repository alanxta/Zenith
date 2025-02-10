<?php


include_once '../model/DTO/UsuarioDTO.php';
include_once '../model/DTO/PacoteDTO.php';
include_once '../model/DTO/Carrinho.php'; 
include_once '../model/DTO/ItemCarrinho.php';

session_start();
$carrinho = $_SESSION['carrinho'];
$idPac = $_GET["idPac"];

if(isset($_GET['acao']) && $_GET['acao'] == 'remover') {
    //remover item
    echo "entro";
    var_dump($carrinho->getItemCarrinhoByIdPac($idPac));
        if( $carrinho->getItemCarrinhoByIdPac($idPac)->getQtdPac() > 1){
            $carrinho->getItemCarrinhoByIdPac($idPac)->removerItem();
        }else{
            $pacote = new PacoteDTO();
            $pacote->setIdPac($idPac);
            $carrinho->removerItem($pacote);
        }
    echo "<pre>";
    var_dump($carrinho);

}

if(isset($_GET['acao']) && $_GET['acao'] == 'adicionar') {

    //adicionar ao carrinho

    $pacote = new PacoteDTO();    
    $pacote->setIdPac($idPacote);

    $carrinho->addItem($pacote);

    echo '<pre>';
    var_dump($carrinho);
}

$_SESSION['carrinho'] = $carrinho ;


header("Location: ../view/mostraCarrinho.php");

?>