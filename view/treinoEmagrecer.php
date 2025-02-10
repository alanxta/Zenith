<?php
session_start();

require_once '../model/DTO/treinoDTO.php';
require_once '../model/DAO/treinoDAO.php';

  $treinoDAO = new TreinoDAO();
		
  $todos = $treinoDAO->listarTreinosEmagrecer();

// echo '<pre>';
// var_dump($todos);




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Treino Emagrecer</title>
	<!-- ======= Styles ====== -->
	<link rel="stylesheet" href="../css/styleCentralT.css">
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
					<a href="centralUsuario.php">
						<span class="icon">
							<ion-icon name="home-outline"></ion-icon>
						</span>
						<span class="title">Central de treinos</span>
					</a>
				</li>

				<li>
					<a href="perfilUsu.php">
						<span class="icon">
							<ion-icon name="person-circle-outline"></ion-icon>
						</span>
						<span class="title">Meu Perfil</span>
					</a>
				</li>

				<li>
					<a href="Pacotes.php">
						<span class="icon">
							<ion-icon name="cash-outline"></ion-icon>
						</span>
						<span class="title">Pacotes</span>
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
			<div class="divTreinos">
				<div class="alinhamentoAlongamento">

					<h2 class="tituloDiv">Alongamento</h2>

					<div class="alongamento">

						<span>
							<h2>Quadríceps</h2>
							<iframe src="https://www.youtube.com/embed/DRaXCfb7b_Y?si=GGKEp-LZaqL8sJ5d"
								title="YouTube video player" frameborder="0"
								allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
								referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>



						<span>
							<h2>Isquiotibiais</h2>
							<iframe src="https://www.youtube.com/embed/xugYzuSgsrs?si=Llv1GMQNn3rz6cuT"
								title="YouTube video player" frameborder="0"
								allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
								referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>


					</div>
				</div>

				<div class="alinhamentoAquecimento">

					<h2 class="tituloDiv">Aquecimento</h2>

					<div class="aquecimento">

						<span>
							<h2>5 a 10 minutos de <br> Polichinelo</h2>
							<iframe src="https://www.youtube.com/embed/dJFfySv3tUg?si=WOMVSSHhVJHjhJk4"
								title="YouTube video player" frameborder="0"
								allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
								referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>



						<span>
							<h2>3 a 5 minutos de <br> Corrida Estacionária</h2>
							<iframe src="https://www.youtube.com/embed/pvLUTrZFvi4?si=wUTXwPLU6nFypERK"
								title="YouTube video player" frameborder="0"
								allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
								referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>

					</div>
				</div>



				<div class="alinhamentoTreinos">

					<div class="avaliacoes">

						<ul class="avaliacao">
							<li class="star-icon" data-avaliacao="1"></li>
							<li class="star-icon" data-avaliacao="2"></li>
							<li class="star-icon" data-avaliacao="3"></li>
							<li class="star-icon" data-avaliacao="4"></li>
							<li class="star-icon" data-avaliacao="5"></li>
						</ul>

					</div>

					<h2 class="tituloDiv">Seu Treino</h2>

					<div class="treino">



						<?php


						foreach ($todos as $t) {
			
						echo "<span>";
						echo "<h2>". $t['tituloTre'];
						echo "<br>".$t['descricaoTre']."</h2>";
						echo $t['videoTre'];
						echo "</span>";
			
						}
						?>





					</div>






					</div>
				</div>
			</div>
		</div>

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