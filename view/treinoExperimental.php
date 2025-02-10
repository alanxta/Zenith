<?php
session_start();
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

                    <span>
							<h2>3 séries de 20x de<br> Agachamento</h2>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/CfqZwFJ0QaM?si=5_BHamewvMeIBgMf" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>


                        <span>
							<h2>3 séries de 20x de<br> flexão</h2>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/qjS5qW4b9oQ?si=wHmVK1D1pYzqH38s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>


                        <span>
							<h2>3 séries de 1 minuto de <br> Prancha</h2>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/Wk5paY5G_Qg?si=OOvC33j5sbeXRtAk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>


                        <span>
							<h2>3 a 5 minutos de <br> Corrida Estacionária</h2>
							<<iframe width="560" height="315" src="https://www.youtube.com/embed/E1XXPXOWjkU?si=EqD8eW6gY4qtgP4M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>

                        <span>
							<h2>3 séries de 20x de<br> Mountain Climbers</h2>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/kLh-uczlPLg?si=m8_kAWxvZrAtk1II" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>


                        <span>
							<h2>2 séries de 1 minuto de<br> Prancha Lateral</h2>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/zt7PjySXWCw?si=KDyT-iXgwwfEmbX7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>


                        <span>
							<h2>1 série de 40x de<br> Burpees</h2>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/3n8aCsen0cg?si=0QktbzTYRrmW64-o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>


                        <span>
							<h2>3 séries de 20x de<br> Abdominais</h2>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/w4r5hIO1b5Q?si=37m7jEXI5tLaqJvi" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>

                        <span>
							<h2>4 séries de 20x de<br> Agachamento com Salto</h2>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/R-M0lqRDqng?si=7Vd4d5ki_ifKnRZU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>


                        <span>
							<h2>2 séries de 10x de<br> Flexão de Braços(tríceps)</h2>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/QUrO2j-hkC4?si=4w89XM_zY-3b-iui" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>


                        <span>
							<h2>1 série de 1 min de <br> Prancha com Elevação</h2>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/a4ilghI4CiM?si=6ZUnGms6vNPyUOSg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>


                        <span>
							<h2>1 série de<br> Alongamento</h2>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/OpVLju5eVxw?si=Mj342u0zJwvRBtoA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</span>







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