<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Central do Usuário</title>
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
					<a href="#">
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

			<div clas>
			<section class="tamanhoExperimental">
				<div class="pacoteExperimental">
					
					<ul>
					<a href="treinoExperimental.php">
						<li><h1 class="titulo">Experimental</h1></li>
						<li><img class="imagem" src="../img/Banner.png" alt=""></li>
						<li><p class="descricao"> Já pensou poder treinar da sua casa sem nenhuma dor de cabeça ? Ou simplesmente seguir sua rotina 
						de treinos sem sair de casa ? <br> aqui na zenith você consegue e isso tudo nunca foi tão fácil como é agora.
						</p>    </li>
					</a>
					</ul>
					
				</div>
			</section>

			

			<section class="flex-container">


			<?php
			if($_SESSION['acessoUsu'] == 1){
			echo	"<div class='pacote'>";
			echo		"<ul>";
			echo		"<img src='../img/cadeado.png' class='cadeado'>";
			echo			"<a href='Pacotes.php' class='link'>";
			echo			"<li><h1 class='titulo'>Emagrecer</h1></li>";
			echo			"<li><img class='imagem' src='../img/pacoteEmagrecer.avif' alt=''></li>";
			echo			"<li><p class='descricao'>Se você tem o foco em perder peso rapidamente, esse é o treino certo para você. Com exercícios breves e explicados, atingindo os resultados desejados por você.";
			echo			"</a>";
			echo			"</p>";
			echo			"</li>";    
			echo		"</ul>";
			echo	"</div>";

				
			echo	"<div class='pacote'>";
			echo		"<ul>";
			echo		"<img src='../img/cadeado.png' class='cadeado'>";
			echo			"<a href='Pacotes.php' class='link'>";
			echo			"<li><h1 class='titulo'>Fortalecer</h1></li>";
			echo			"<li><img class='imagem' src='../img/pacoteFortalecer.jpg' alt=''></li>";
			echo			"<li><p class='descricao'> Pra que criar  zero o que você já tem? com esse treino o foco para melhorar sua musculatura nunca foi tão fácil fortalecer e por incrível que pareça na palma da sua mão.";
			echo			"</a>";
			echo			"</p>" ;  
			echo			"</li>";
						
			echo		"</ul>";
			echo	"</div>";

			echo	"<div class='pacote'>";
				echo		"<ul>";
				echo		"<img src='../img/cadeado.png' class='cadeado'>";
				echo			"<a href='Pacotes.php' class='link'>";
				echo			"<li><h1 class='titulo'>Ganhar Massa</h1></li>";
				echo			"<li><img class='imagem' src='../img/pacoteGanharMassa.avif' alt=''></li>";
				echo			"<li><p class='descricao'>  Este programa é perfeito para quem está determinado a adquirir o que falta. Se o seu objetivo é esse, com vídeos interativos e tutoriais avançados, seu treino na academia será excelente.";
				echo			"</a>";
				echo			"</p>"   ; 
				echo				"</li>";
						
				echo		"</ul>";
				echo	"<br>";
				echo	"</div>";

			}

			elseif($_SESSION['acessoUsu'] == 2){
				echo	"<div class='pacote'>";
				echo		"<ul>";
				echo			"<a href='treinoEmagrecer.php' class='link'>";
				echo			"<li><h1 class='titulo'>Emagrecer</h1></li>";
				echo			"<li><img class='imagem' src='../img/pacoteEmagrecer.avif' alt=''></li>";
				echo			"<li><p class='descricao'>Se você tem o foco em perder peso rapidamente, esse é o treino certo para você. Com exercícios breves e explicados, atingindo os resultados desejados por você.";
				echo			"</a>";
				echo			"</p>";
				echo			"</li>";    
				echo		"</ul>";
				echo	"</div>";
	
					
				echo	"<div class='pacote'>";
				echo		"<ul>";
				echo			"<a href='treinoFortalecer.php' class='link'>";
				echo			"<li><h1 class='titulo'>Fortalecer</h1></li>";
				echo			"<li><img class='imagem' src='../img/pacoteFortalecer.jpg' alt=''></li>";
				echo			"<li><p class='descricao'> Por que criar do zero o que você já tem? Com esse treino, o foco para melhorar sua musculatura nunca foi tão fácil. E por incrível que pareça, tudo isso na palma da sua mão.";
				echo			"</a>";
				echo			"</p>" ;  
				echo			"</li>";
							
				echo		"</ul>";
				echo	"</div>";
	
				echo	"<div class='pacote'>";
					echo		"<ul>";
					echo			"<a href='treinoGanharMassa.php' class='link'>";
					echo			"<li><h1 class='titulo'>Ganhar Massa</h1></li>";
					echo			"<li><img class='imagem' src='../img/pacoteGanharMassa.avif' alt=''></li>";
					echo			"<li><p class='descricao'> Este programa é perfeito para quem está determinado a adquirir o que falta. Se o seu objetivo é esse, com vídeos interativos e tutoriais avançados, seu treino na academia será excelente.";
					echo			"</a>";
					echo			"</p>"   ; 
					echo				"</li>";
							
					echo		"</ul>";
					echo	"</div>";
					echo	"<br>";
				}
			

				?>





			</section>	

			

			
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