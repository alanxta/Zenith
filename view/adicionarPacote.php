<?php
require_once '../control/listarPacoteController.php';
require_once '../control/excluirPacoteController.php';
require_once '../control/alterarPacoteController.php';
session_start();
//echo '<pre>';
//var_dump($todos);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastrar Pacotes</title>
	<!-- ======= Styles ====== -->
	<link rel="stylesheet" href="../css/styleAddTreino.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('.delete-user').click(function(e) {
        e.preventDefault();
        var userId = $(this).data('id');
        var tableRow = $(this).closest('tr');
        if (confirm('Tem certeza que deseja excluir este treino?')) {
            $.ajax({
                url: '../Control/excluirUsuarioController.php',
                type: 'GET',
                data: { idUsu: userId },
                success: function(response) {
                    alert('Treino excluído com sucesso!');
                    tableRow.remove();
                },
                error: function() {
                    alert('Erro ao excluir usuário.');
                }
            });
        }
    });
});
</script>
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


                <?php
                if ($_SESSION['perfilUsu'] == 'Administrador') {
                    echo "<li>";
                    echo "<a href='Listar.php'>";
                    echo "<span class='icon'>";
                    echo "<ion-icon name='people-outline'></ion-icon>";
                    echo "</span>";
                    echo "<span class='title'>Listar Usuários</span>";
                    echo "</a>";
                    echo "</li>";
                }
                ?>

                <?php
                if ($_SESSION['perfilUsu'] == 'Administrador') {
                    echo "<li>";
                    echo "<a href='CadastrarUsuAdm.php'>";
                    echo "<span class='icon'>";
                    echo "<ion-icon name='person-add-outline'></ion-icon></span>";
                    echo "<span class='title'>Cadastrar Usuários</span>";
                    echo "</a>";
                    echo "</li>";
                }
                ?>

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
                            <ion-icon name="home-outline"></ion-icon>
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


				<div class="user">
                <img src="../imagemUsu/<?= $_SESSION['fotoUsu'];      ?>" alt="">
				</div>
			</div>


			<!-- ================ Order Details List ================= -->
			<div class="details">
				<div class="recentOrders">
					<div class="cardHeader">
						<h2>Cadastrar Pacotes</h2>
					</div>


					<div>
						<form id="cadastroPac">
                            <div>
                        <input class="inputs" type="text" placeholder="Nome" name="nomePac" required>
							<input class="inputs" type="text" placeholder="Titulo" name="tituloPac" required>
							<input class="inputs" type="text" placeholder="Descrição" name="descricaoPac" required>
                            </div>

                            <div>
                            <input class="inputs" type="text" placeholder="Código" name="codigoPac" required>
                            <select class="inputs" name="situacaoPac" >
                                <option value="Disponível">Disponível</option>
                                <option value="Indisponível">Indisponível</option>
                            </select>
                            
                            <input class="inputs" type="text" placeholder="Preço" name="valorVendaPac" required>
                            <input class="imagemC" type="file" name="imagemPac">
                            </div>
                            
							<input type="submit" id="botao" class="botao">
						</form>

                        <table>
                            <p class="listagem">Listagem de Pacotes</p>
						<thead>
							<tr>
                                <td>Id</td>
								<td>Titulo</td>
								<td>Descrição</td>
								<td>Situação</td>
								<td>Preço</td>
                                <td>Ações</td>
							</tr>
						</thead>

                        <?php
							foreach ($todos as $t) {

								// <!-- Exibir dados do usuário -->
								echo "<tr>";
                                echo "<td>" . $t['idPac'] . "</td>";
								echo "<td>" . $t['tituloPac'] . "</td>";
								echo "<td>" . $t['descricaoPac'] . "</td>";
                                echo "<td>" . $t['situacaoPac'] . "</td> \n";
                                echo "<td>" . $t['valorVendaPac'] . "</td> \n";

								?>
								<!-- Link para editar o usuário -->
								<td><a href="editarPac.php?idPac=<?php echo $t['idPac']; ?>"><img src="../img/editar.png"
											alt="" width="30px"></a></td>

								<!-- Link para excluir o usuário -->
								<td><button><a href="#" class="delete-user" data-id="<?= $t['idPac']; ?>"><img src="../img/excluir.png" width="30px"></a></button></td>
								<?php
								echo "<tr>";
							} ?>
                        
					</div>
				</div>

                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.getElementById("cadastroPac").addEventListener("submit", function (event) {
      event.preventDefault();

      const formData = new FormData(this);

fetch("../control/cadastrarPacoteController.php", {
  method: "POST",
  body: formData
})
  .then(response => {
    if (!response.ok) {
      throw new Error(response.statusText);
    }
    return response.json(); 
  })
  .then(data => {
    if (data.success) {
      Swal.fire({
        icon: 'success',
        title: 'Sucesso!',
        text: data.message,

      });
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Erro!',
        text: data.message,
      });
    }
  })
  .catch(error => {
    Swal.fire({
      icon: 'error',
      title: 'Erro!',
      text: 'Ocorreu um erro ao processar o cadastro. Tente novamente mais tarde.',
    });
    console.error('Error:', error);
  });
});
</script>



				<!-- =========== Scripts =========  -->
				<script src="../js/adm.js"></script>

				<!-- ====== ionicons ======= -->
				<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
				<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

				<script src="https://code.jquery.com/jquery-3.7.1.js"
					integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
				<script src="../js/jquery.mask.js"> </script>
				<script src="../js/sweetalert2.all.min.js"></script>

				<script>
					$('#cpf').mask('000.000.000-00', { reverse: true });
					$('#telefone').mask('(00) 0000-0000');
				</script>


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
</body>

</html>