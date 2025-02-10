<?php
require_once '../control/listarUsuariosController.php';
require_once '../control/excluirUsuarioController.php';
require_once '../control/alterarUsuarioController.php';
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
	<title>Listar Usuários</title>
	<!-- ======= Styles ====== -->
	<link rel="stylesheet" href="../css/listarAdmin.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script>
    $(document).ready(function() {
        $('.delete-user').click(function(e) {
            e.preventDefault();
            var userId = $(this).data('id');
            var tableRow = $(this).closest('tr');
            if (confirm('Tem certeza que deseja excluir este usuário?')) {
                $.ajax({
                    url: '../Control/excluirUsuarioController.php',
                    type: 'GET',
                    data: { idUsu: userId },
                    success: function(response) {
                        alert('Usuário excluído com sucesso!');
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

				<li>
					<a href="#">
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
						<p>Seja bem vindo, <?php echo $_SESSION['nomeUsu'];  ?></p>
					</label>
				</div>

				<div class="user">
				<img src="../imagemUsu/<?= $_SESSION['fotoUsu'];      ?>" alt="">
				</div>
			</div>


			<!-- ================ Order Details List ================= -->
			<div class="details">
				<div class="recentOrders">
					<div class="cardHeader">
						<h2>Listagem de Usuários</h2>
					</div>

					<table>
						<thead>
							<tr>
								<td>Nome</td>
								<td>Email</td>
								<td>CPF</td>
								<td>Telefone</td>
								<td>Data de Nascimento</td>
								<td>Situação</td>
								<td>Ações</td>
							</tr>
						</thead>

						<tbody>

							<?php
							foreach ($todos as $t) {
								if($t['idUsu'] != 1){
								//Verificar a situaçao
								if ($t['situacaoUsu'] == 'Ativo') {
									$t['situacaoUsu'] = '<span class="status ativo ">Ativo</span>';
								} else {
									$t['situacaoUsu'] = '<span class="status desativado">Inativo</span>';
								}
								// <!-- Exibir dados do usuário -->
								echo "<tr>";
								echo "<td>" . $t['nomeUsu'] . "</td>";
								echo "<td>" . $t['emailUsu'] . "</td>";
								echo "<td>" . $t['cpfUsu'] . "</td> \n";
								echo "<td>" . $t['telefoneUsu'] . "</td> \n";
								echo "<td>" . $t['dtNascimentoUsu'] . "</td> \n";
								echo "<td>" . $t['situacaoUsu'] . "</td> \n";
								?>
								<!-- Link para editar o usuário -->
								<td><a href="editarUsu.php?idUsu=<?php echo $t['idUsu']; ?>"><img src="../img/editar.png"
											alt="" width="30px"></a></td>

								<!-- Link para excluir o usuário -->
								<td><button><a href="#" class="delete-user" data-id="<?= $t['idUsu']; ?>"><img src="../img/excluir.png" width="30px"></a></button></td>
								</br>
								<?php
								echo "<tr>";
							}
							} ?>


						</tbody>
					</table>
				</div>

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
</body>

</html>