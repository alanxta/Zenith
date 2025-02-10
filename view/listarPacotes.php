<?php
require_once '../control/listarPacoteController.php';


//var_dump($todos);

//var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <a href="cadastrarPacote.php">Cadastrar Produtos</a>

    <h1>Lista de Produtos</h1>
    <ul>
        <?php foreach ($todos as $t){ ?>
            <li>
                <?php echo $t['nomePac']; ?>
                 - R$ 
                 <?php echo number_format($t['valorVendaPac'], 2, ',', '.'); ?>
                 
                <a href="../control/carrinhoController.php?idPac=<?php echo $t['idPac']; ?>&nomePac=<?php echo $t['nomePac']; ?>&valorVendaPac=<?php echo $t['valorVendaPac']; ?>">Adicionar ao Carrinho</a>

               <!--<input type="number" name="quantity" value="1" min="1">-->
            </li>
        <?php } ?>
    </ul>
    <a href="mostraCarrinho.php">Ver Carrinho</a>


</body>

</html>
