<?php
session_start();
require_once '../model/DTO/usuarioDTO.php';
require_once '../model/DAO/usuarioDAO.php';
require_once '../control/listarUsuariosController.php';

$idUsuario = $_GET["idUsu"];
//var_dump($idUsuario);

$usuarioDAO = new UsuarioDAO();
$retorno = $usuarioDAO->pesquisarUsuarioPorId($idUsuario);

//var_dump($retorno);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuários</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../css/editarAdmin.css">
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
    $usuario_selecionado = null;
    foreach ($todos as $t) { 
      if ($t["idUsu"] == $_GET["idUsu"]) {
        $usuario_selecionado = $t;
        break;
      }}?>


            <div class="alterar">
                <form class="formulario" name="alterarUsu" id="alterarUsu" >
                    <ul>
                        <div class="dadoUsu">
                            <h1 class="titulo">Alterar dados do Usuário</h2>
                            <div>
                                <input type="hidden" name="idUsu" value="<?php echo $usuario_selecionado["idUsu"]; ?>">
                                <li><input type="text" name="nomeUsu" value="<?php echo $usuario_selecionado["nomeUsu"]; ?>"required><br>
                                <li><input type="date" name="dtNascimentoUsu"value="<?php echo $usuario_selecionado["dtNascimentoUsu"]; ?>" required><br>
                            </div>
                            <div>
                                <li><input type="text" name="emailUsu" value="<?php echo $usuario_selecionado["emailUsu"]; ?>"required><br>
                                <li><input id="telefone" type="text" name="telefoneUsu"value="<?php echo $usuario_selecionado["telefoneUsu"]; ?>" required><br>
                            </div>

                            <div>
                                <li><select class="selects" name="perfilUsu" id="perfilUsu" value="<?php echo $usuario_selecionado["perfilUsu"]; ?>">
                                    <option value="Administrador">Administrador</option>
                                    <option value="Funcionário">Funcionário</option>
                                    <option value="Cliente">Cliente</option>
                                </select><br>
                                <li><select class="selects" name="situacaoUsu" id="situacaoUsu" value="<?php echo $usuario_selecionado["situacaoUsu"]; ?>">
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>

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
     document.getElementById("alterarUsu").addEventListener("submit", function (event) {
  event.preventDefault();

  const formData = new FormData(this);

  fetch("../Control/alterarUsuarioController.php", {
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
        title: 'Usuário alterado com sucesso :)',
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