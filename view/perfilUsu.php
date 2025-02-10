<?php
session_start();
require_once '../model/DTO/usuarioDTO.php';
require_once '../model/DAO/usuarioDAO.php';

$idUsuario = $_SESSION['idUsu'];
$usuarioDAO = new UsuarioDAO();
$usuario = $usuarioDAO->pesquisarUsuarioPorId($idUsuario);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Meu Perfil</title>
	<!-- ======= Styles ====== -->
	<link rel="stylesheet" href="../css/stylePerfilUsu.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




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
					<a href="#">
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
						<input type="text" placeholder="Faça sua pesquisa aqui">
						<ion-icon name="search-outline"></ion-icon>
					</label>
				</div>

				<div class="user">
        <img src="../imagemUsu/<?= $_SESSION['fotoUsu'];      ?>" alt="">
				</div>
			</div>


            <div class="alinharPerfil">
                    
                    <h2 class="titulo">
                    Meu Perfil <ion-icon class="icone" name="person-circle-outline"></ion-icon>
                    </h2>
                    
                    
                    <div class="meuPerfil">
                        <div class="meusDados">
                            <div class="divisaoDados">

                            
                           
                                <form action="">
                                    <h1>Meus dados</h1>
                                        <div class="fotoPerfil">
                                        <img src="../imagemUsu/<?= $_SESSION['fotoUsu'];      ?>" width="100px">
                                        </div>
                                        
                                        <div class="dados">
                                        <ul>
                                        <li><h2>Nome</h2>
                                         <p class="session"> <?php echo $usuario['nomeUsu'];   ?> </p>  
                                                          </li>

                                        <li><h2>Email</h2>
                                        <p class="session"> <?php echo $usuario['emailUsu'];   ?> </p>    
                                                           </li>

                                        <li><h2>Telefone</h2>
                                        <p class="session"> <?php echo $usuario['telefoneUsu'];   ?> </p>   
                                                            </li>
                  
                                        <li><h2>CPF</h2>
                                        <p class="session"> <?php echo $usuario['cpfUsu'];   ?> </p>   
                                                            </li>

                                        <li><h2>Data de Nascimento</h2>
                                        <p class="session"> <?php echo $usuario['dtNascimentoUsu'];   ?> </p>   
                                                            </li>
                                      
                                                  </ul>
                                                </div>
                                         <div class="botoes">
                                         <a href="alterarPerfil.php?idUsu=<?php echo $_SESSION['idUsu']; ?>" class="alterarPerfil" >Alterar meus dados</a>
                                                        </div>


                                        </form>
                                                    
                                                    </div>

                                <div class="assinatura">
                                        <div class="alinharAssinatura">
                                        <h2>Assinatura</h2>
                                                <img src="../img/zBronze.png" alt="">
                                                <div class="duracao">
                                                
                                                </div>
                                                </div>
                                                    
                        <div class="container1">
                            <div id="calc-container">
                              <h2>Calculadora de IMC</h2>
                              <form id="imc-form">
                                <div class="form-inputs">
                                  <div class="form-control">
                                    <label for="height">Altura:</label>
                                    <input
                                      type="text"
                                      name="height"
                                      id="height"
                                      placeholder="Exemplo 1,75"
                                      required
                                    />
                                  </div>
                                  <div class="form-control">
                                    <label for="weight">Peso:</label>
                                    <input
                                      type="text"
                                      name="weight"
                                      id="weight"
                                      placeholder="Exemplo 70,5"
                                    />
                                  </div>
                                </div>
                                <div class="action-control">
                                  <button class="button2" id="clear-btn">Limpar</button>
                                  <button  class="button1" id="calc-btn">Calcular</button>
                                </div>
                              </form>
                            </div>
                            <div id="result-container" class="hide">
                              <p id="imc-number">Seu IMC: <span></span></p>
                              <p id="imc-info">Situação atual: <span></span></p>
                              <h3>Confira as classificações</h3>
                              <div id="imc-table">
                                <div class="table-header">
                                  <h4>IMC</h4>
                                  <h4>Classificação</h4>
                                  <h4>Obesidade</h4>
                                </div>
                              </div>
                              <button class="button2" id="back-btn">Voltar</button>
                            </div>
                          </div>
                                                </div>

                                                






        







                        </div>



	
    
    
    
    
    
    
    
    
    
                       

	<!-- =========== Scripts =========  -->
	<script src="../js/adm.js"></script>
   

	<!-- ====== ionicons ======= -->
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script src="../js/calcimc.js"></script>
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