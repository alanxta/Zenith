<?php
require_once '../control/listarPacoteController.php';
session_start();


//var_dump($todos);

//var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pacotes</title>
	<link rel="stylesheet" type="text/css" href="../css/stylePacote.css">

</head>

<body>
<a href="centralUsuario.php">	<img src="../img/volta.png" width="50px"></a>


	<div class="tabela-preco">

	<?php
			foreach ($todos as $t) {


;
		echo	"<div class='card-preco'>";
		echo	"<h3 class='card-preco-header'>". $t['nomePac'] . "</h3>";
		echo	"<div class='preco'><sup>R$</sup>". $t['valorVendaPac']  . "<span>/Mês</span></div>";
		echo	"<ul>";
		echo 	"<li><img src='../imagemPac/" . $t['imagemPac'] . "'></li>";
		echo		"<li><h1></h1></li>";
				

		echo	"</ul>";
		echo "<a href=\"../control/carrinhoController.php?idPac=" . $t['idPac'] . "&nomePac=" . $t['nomePac'] . "&valorVendaPac=" . $t['valorVendaPac'] . "\" class='btn'>Quero este plano</a>";

		echo "</div>";


			}?>


		</div>

	</div>




	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>