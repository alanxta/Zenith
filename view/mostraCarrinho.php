<?php

require_once '../model/DTO/UsuarioDTO.php';
require_once '../model/DTO/PacoteDTO.php';
require_once '../model/DAO/PacoteDAO.php';
require_once '../model/DTO/Carrinho.php'; 
require_once '../model/DTO/ItemCarrinho.php';


session_start();

//print_r($_SESSION);
$nomeUsu = $_SESSION['nomeUsu'];

$carrinho = $_SESSION['carrinho'];


$pacote = new PacoteDAO();
$idPacote = $carrinho->getItemCarrinho();


echo '<pre>';
// print_r($carrinho);

echo "Olá!  ". $nomeUsu . ". Pacotess no carrinho: <br>"; 

$totalCompra = 0;
$qtdPacotesCarrinho = 0;
$totalItens = 0;
foreach ($carrinho->getItemCarrinho() as $item) {

    echo "<li style=\"border: 1px solid black; list-style-type:none; margin-right: 50%\">";
    echo "ID do Pacote: " . $item->getPacote()->getIdPac() . "<br>";
    echo "Nome do Pacote: ". $item->getPacote()->getNomePac() ."<br>";   
    echo "Valor Unitário: " . $item->getPacote()->getValorVendaPac() . "<br>";
    echo "Quantidade: " . $item->getQtdPac();
    //adicionar item
    echo ' <a href="../control/totalCarrinhoController.php?acao=adicionar&idPac=' . $item->getPacote()->getIdPac() . '"><button type="button">+</button></a> ';
    //remover item
    echo '<a href="../control/totalCarrinhoController.php?acao=remover&idPac=' . $item->getPacote()->getIdPac() . '"><button type="button">-</button></a>';

    echo "</br>Valor final item: " . $item->getPacote()->getValorVendaPac() * $item->getQtdPac() . "<br>";
    echo "</li>";

    $totalCompra +=  $item->getPacote()->getValorVendaPac() * $item->getQtdPac();
    $qtdPacotesCarrinho++;
    $totalItens += $item->getQtdPac();

}
echo "<li style=\"border: 1px solid black; list-style-type:none; margin-right: 50%\">";
echo "Valor total da compra: ".$totalCompra ."<br>";
echo "Pacotes no carrinho: ".$qtdPacotesCarrinho ."<br>";
echo "Total de itens no carrinho: ".$totalItens ."<br>";
echo '<a href="../view/fecharCompra.php"><button type="button">Finalizar pedido</button></a>';


echo "</li>";


$_SESSION['qtdPacotesCarrinho'] = $qtdPacotesCarrinho;

?>
<a href="Pacotes.php">Voltar</a>


