<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/408317c14f.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/pagamento.css">
	<title>Pagamento Pix</title>
</head>

<body>

	<article class="card">
		<div class="container">
			<div class="card-title">
				<h2>Pagamento</h2>
			</div>
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


$produto = new PacoteDAO();
$idProduto = $carrinho->getItemCarrinho();


echo "<p style=\" font-size:20px\">" ."Olá! " . $nomeUsu . ", o pacote escolhido foi:" . "</p>"; 

$totalCompra = 0;
$qtdProdutosCarrinho = 0;
$totalItens = 0;
foreach ($carrinho->getItemCarrinho() as $item) {

    echo "<li style=\"border: 2px solid black; list-style-type:none; margin-right: 50%; font-size: 20px;   font-weight: bold; margin-bottom: 20px; width: 300px\">";
    echo "<div>" ." Nome do Pacote: ". $item->getPacote()->getNomePac() . "<br>" ;   
    echo " Valor Final: " . $item->getPacote()->getValorVendaPac() . "<br>" ;
    echo "</li>";


}
$_SESSION['qtdProdutosCarrinho'] = $qtdProdutosCarrinho;

?>
			<div class="card-body">
				<div class="payment-type">
					<h4>Escolha seu método de pagamento</h4>
					<div class="types flex justify-space-between">
						<div class="type">
							<a href="Cartao.php">

								<div class="logo">
									<i class="far fa-credit-card"></i>
								</div>
								<div class="text">
									<p>Cartão de Crédito</p>
								</div>
							</a>
						</div>








						<div class="type selected">
							<a href="#">
								<div class="logo">
									<i class="fa-brands fa-pix"></i>
								</div>
								<div class="text">
									<p>Pix</p>
								</div>
							</a>
						</div>





						<div class="type">
							<a href="Paypal.php">
								<div class="logo">
									<i class="fab fa-paypal"></i>
								</div>
								<div class="text">
									<p>PayPal</p>
								</div>
							</a>
						</div>


					</div>
				</div>
				<div class="payment-info flex justify-space-between">
					<div class="qr-code">
						<img src="../img/pix.png" width="500px">
					</div>
				</div>
			</div>
	</article>


</body>

</html>