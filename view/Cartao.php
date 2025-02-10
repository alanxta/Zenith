<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/408317c14f.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/pagamento.css">
	<title>Pagamento Cartão</title>
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


						<div class="type selected">
							<a href="#">

								<div class="logo">
									<i class="far fa-credit-card"></i>
								</div>
								<div class="text">
									<p>Cartão de Crédito</p>
								</div>
							</a>
						</div>








						<div class="type">
							<a href="Pix.php">
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
					<div class="column billing">
						<div class="title">
							<div class="num">1</div>
							<h4>Informação do usuário</h4>
						</div>
						<div class="field full">
							<label for="name">Nome Completo</label>
							<input id="name" type="text" placeholder="Nome Completo">
						</div>
						<div class="field full">
							<label for="address">Endereço do Titular</label>
							<input id="address" type="text" placeholder="Endereço do Titular">
						</div>
						<div class="flex justify-space-between">
							<div class="field half">
								<label for="city">Cidade</label>
								<input id="city" type="text" placeholder="Cidade">
							</div>
							<div class="field half">
								<label for="state">Estado</label>
								<input id="state" type="text" placeholder="Estado">
							</div>
						</div>
						<div class="field full">
							<label for="zip">Cep</label>
							<input id="zip" type="text" placeholder="Cep">
						</div>
					</div>
					<div class="column shipping">
						<div class="title">
							<div class="num">2</div>
							<h4>Informações do Cartao de Crédito</h4>
						</div>
						<div class="field full">
							<label for="name">Nome do Titular</label>
							<input id="name" type="text" placeholder="Nome Completo">
						</div>
						<div class="field full">
							<label for="address">Numero do Cartão</label>
							<input id="address" type="text" placeholder="1234-5678-9012-3456">
						</div>
						<div class="flex justify-space-between">
							<div class="field half">
								<label for="city">Mês de expiracão</label>
								<input id="city" type="text" placeholder="12">
							</div>
							<div class="field half">
								<label for="state">Ano de expiração</label>
								<input id="state" type="text" placeholder="19">
							</div>
						</div>
						<div class="field full">
							<label for="zip">CVC</label>
							<input id="zip" type="text" placeholder="468">
						</div>
					</div>
				</div>
			</div>
			<div class="card-actions flex justify-space-between">
				<div class="flex-start">
					<a href="Pacotes.php" class="links"><button class="button button-secondary">Retornar</button></a>
				</div>
				<div class="flex-end">
					<a href="../control/fecharCompraController.php?idUsu=<?php echo $_SESSION['idUsu']; ?>" class="links"><button class="button button-primary">Prosseguir</button></a>
				</div>
			</div>
		</div>
	</article>





</body>

</html>