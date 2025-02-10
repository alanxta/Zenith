<?php
session_start();
require_once '../model/DTO/usuarioDTO.php';
require_once '../model/DAO/usuarioDAO.php';
require_once '../control/listarUsuariosController.php';

$idUsuario = $_SESSION['idUsu'];
//var_dump($idUsuario);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alterar Perfil</title>
	<!-- ======= Styles ====== -->
	<link rel="stylesheet" href="../css/styleAlterarPerfil.css">
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
					<a href="perfilUsu.php">
						<span class="icon">
							<ion-icon name="person-circle-outline"></ion-icon>
						</span>
						<span class="title">Meu Perfil</span>
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

        <?php
            $usuario_selecionado = null;
    foreach ($todos as $t) { 
      if ($t["idUsu"] == $_GET["idUsu"]) {
        $usuario_selecionado = $t;
        break;
      }}?>
                    
                    <h2 class="titulo">
                    Alterar Dados <ion-icon class="icone" name="person-circle-outline"></ion-icon>
                    </h2>
                    
                    
                    <div class="meuPerfil">
                        <div class="meusDados">
                            <div class="divisaoDados">
                           
                                <form id="alterarPer">
                                <input type="hidden" name="idUsu" value="<?php echo $usuario_selecionado["idUsu"]; ?>">
                                <input type="hidden" name="situacaoUsu" value="<?php echo $usuario_selecionado['situacaoUsu'] == 'Ativo'   ?>">
                                    <h1>Meus dados</h1>
                                        <div class="fotoPerfil">

                                        </div>
                                        
                                        <div class="dados">
                                        <ul>
                                        <li><h2>Nome</h2>
                                        <input type="text" name="nomeUsu" value="<?php echo $usuario_selecionado['nomeUsu']; ?>"required>
                                                          </li>

                                        <li><h2>Email</h2>
                                        <input type="text" name="emailUsu" value="<?php echo $usuario_selecionado['emailUsu']; ?>"required>   
                                                           </li>

                                        <li><h2>Telefone</h2>
                                        <input type="text" id="telefone" name="telefoneUsu"value="<?php echo $usuario_selecionado['telefoneUsu']; ?>" required>
                                                            </li>

                                        <li><h2>Data de Nascimento</h2>
                                        <input type="date" name="dtNascimentoUsu"value="<?php echo $usuario_selecionado['dtNascimentoUsu']; ?>" required>  
                                                            </li>
                                      
                                                  </ul>
                                                </div>
                                         <div class="botoes">
                                                <button class="salvar" type="submit"><h2>Salvar<ion-icon name="save-outline"></ion-icon></h2></button>
                                                        </div>


                                        </form>

                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById("alterarPer").addEventListener("submit", function (event) {
event.preventDefault();

const formData = new FormData(this);

fetch("../Control/alterarPerfilController.php", {
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
title: 'Perfil alterado com sucesso :)',
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
                                                    
                                                    </div>

 

                        </div>



	
    
    
    
    
    
    
    
    
    
                       

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
   
</body>

</html>