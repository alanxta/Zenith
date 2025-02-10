<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastrar Usuarios</title>
	<!-- ======= Styles ====== -->
	<link rel="stylesheet" href="../css/cadastrarUsuAdm.css">
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
					<a href="#">
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


				<div class="user">
				<img src="../imagemUsu/<?= $_SESSION['fotoUsu'];      ?>" alt="">
				</div>
			</div>


			<!-- ================ Order Details List ================= -->
			<div class="details">
				<div class="recentOrders">
					<div class="cardHeader">
						<h2>Cadastrar Usuarios</h2>
					</div>


					<div>
						<form id="cadastro" enctype="multipart/form-data">
							<input class="inputs" type="text" placeholder="Nome" name="nomeUsu" required>
							<input class="inputs" type="email" placeholder="Email" name="emailUsu" required>
							<input class="inputs" type="text" placeholder="CPF" name="cpfUsu" id="cpf">
							<input class="inputs" type="text" placeholder="Telefone" name="telefoneUsu" id="telefone"required>
							<input class="inputs" type="date" placeholder="Data de nascimento" name="dtNascimentoUsu"required>
							<select name="perfilUsu" class="inputs">
								<option value="Cliente">Cliente</option>
								<option value="Funcionário">Funcionário</option>
								<option value="Administrador">Administrador</option>
							</select>
							<select name="situacaoUsu" class="inputs">
								<option value="Ativo">Ativo</option>
								<option value="Inativo">Inativo</option>
							</select>
							<input class="inputs" type="password" placeholder="Senha" name="senhaUsu" required>
							<input class="inputs" id="fotoUsu" type="file" name="fotoUsu" accept="image/*">
							<input type="submit" id="botao" class="botao">

						</form>
					</div>
				</div>


				<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.getElementById("cadastro").addEventListener("submit", function (event) {
      event.preventDefault();

      const formData = new FormData(this);

fetch("../Control/cadastrarUsuarioAdmController.php", {
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

<script>
  $(function() {
    $('#botao').click(function() {
      Swal.fire({
        title: 'Cadastro realizado com sucesso!',
        text: 'Seu cadastro foi efetuado com sucesso. Agora você pode acessar o sistema.',
        icon: 'success',
        confirmButtonText: 'Ok'
      });
    });
  });
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