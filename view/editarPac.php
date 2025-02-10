<?php
session_start();
require_once '../model/DTO/PacoteDTO.php';
require_once '../model/DAO/PacoteDAO.php';
require_once '../control/listarPacoteController.php';

$idPacote = $_GET["idPac"];
//var_dump($idUsuario);

$pacoteDAO = new PacoteDAO();
$retorno = $pacoteDAO->pesquisarPacotePorId($idPacote);

//var_dump($retorno);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pacotes</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../css/editarPac.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li class="logo">
                    <a href="#">
                        <span class="icon">
                            <img src="../img/logo.png" alt="">
                        </span>
                    </a>
                </li>

                <li>
                    <a href="Listar.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Listar Usuários</span>
                    </a>
                </li>

                <li>
                    <a href="CadastrarUsuAdm.php">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="title">Cadastrar Usuários</span>
                    </a>
                </li>

                <li>
                    <a href="adicionarPacote.php">
                        <span class="icon">
                            <ion-icon name="cash-outline"></ion-icon>
                        </span>
                        <span class="title">Pacotes</span>
                    </a>
                </li>

                <li>
                    <a href="adicionarTreino.php">
                        <span class="icon">
                            <ion-icon name="bar-chart-outline"></ion-icon>
                        </span>
                        <span class="title">Treinos</span>
                    </a>
                </li>

                <li>
                    <a href="../control/logoutUsuarioController.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Pesquise Aqui">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->


            <?php
    $pacote_selecionado = null;
    foreach ($todos as $t) { 
      if ($t["idPac"] == $_GET["idPac"]) {
        $pacote_selecionado = $t;
        break;
      }}?>


            <div class="alterar">
                <form class="formulario" name="alterarPac" id="alterarPac" >
                    <ul>
                        <div class="dadoUsu">
                            <h1 class="titulo">Alterar dados dos pacotes</h2>
                            <div>
                                <input type="hidden" name="idPac" value="<?php echo $retorno["idPac"]; ?>">
                                <li><input type="text" placeholder="Nome" name="nomePac" value="<?php echo $retorno["nomePac"]; ?>"required><br>
                                <li><input type="text" placeholder="Título" name="tituloPac" value="<?php echo $retorno["tituloPac"]; ?>"required><br>
                                <li><input type="text" placeholder="Descrição" name="descricaoPac"value="<?php echo $pacote_selecionado["descricaoPac"]; ?>" required><br>
                            </div>


                            <div>
                            <li><input type="text" placeholder="Preço" name="valorVendaPac"value="<?php echo $pacote_selecionado["valorVendaPac"]; ?>" required><br>
                                <li><select class="selects" name="situacaoPac" id="situacaoPac" value="<?php echo $pacote_selecionado["situacaoPac"]; ?>">
                                    <option value="Disponível">Disponível</option>
                                    <option value="Indisponível">Indisponível</option>

                                </select><br>
                            </div>

                        </div>
                        <div>


                        <li><button class="botao" type="submit">Confirmar</button></li>
                    </ul>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
     document.getElementById("alterarPac").addEventListener("submit", function (event) {
  event.preventDefault();

  const formData = new FormData(this);

  fetch("../Control/alterarPacoteController.php", {
    method: "POST",
    body: formData
  })
    .then(response => {
      if (response.ok) {
        return response.text(); 
      } else {
        throw new Error('Falha ao salvar as alterações.'); 
      }
    })
    .then(data => {
      
      Swal.fire({
        icon: 'success',
        title: 'Pacote alterado com sucesso :)',
        text: data.message, 
      });
    })
    .catch(error => {
      
      Swal.fire({
        icon: 'error',
        title: 'Erro!',
        text: error.message, 
      });
    });
});</script>


        <!-- =========== Scripts =========  -->
        <script src="../js/adm.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('a[href="../control/logoutUsuarioController.php"]').click(function(e) {
        e.preventDefault();
        if (confirm('Você está prestes a encerrar sua sessão. Tem certeza que deseja sair?')) {
            window.location.href = $(this).attr('href');
        }
    });
});
</script>


<script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../js/jquery.mask.js"> </script>

    <script>
        $('#cpf').mask('000.000.000-00', { reverse: true });
        $('#telefone').mask('(00) 0000-0000');
    </script>
</body>

</html>