<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/boot.css">
    <link rel="stylesheet" href="../css/styleLoginCadastro.css">
    <link rel="stylesheet" href="../css/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <title>Login/Cadastro</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form id="cadastro" enctype="multipart/form-data">
                <h1>Criar Conta</h1>
                <input type="text" placeholder="Nome" name="nomeUsu" id="nomeUsu" required>
                <input type="email" placeholder="Email" name="emailUsu" id="emailUsu" required>
                <input type="text" placeholder="CPF" name="cpfUsu" id="cpf">
                <input type="text" placeholder="Telefone" name="telefoneUsu" id="telefone" required>
                <input type="date" placeholder="Data de nascimento" name="dtNascimentoUsu" id="dtNascimentoUsu" required>
                <input type="file" placeholder="Foto" name="fotoUsu" id="fotoUsu" >
                <input type="password" placeholder="Senha" name="senhaUsu" id="senhaUsu" required>
                <input type="hidden" name="perfilUsu" value="Cliente">
                <input type="hidden" name="situacaoUsu" value="Ativo">
                <input type="hidden" name="acessoUsu" value="1">
                <button input type="submit" value="Cadastrar">Enviar</button>
            </form>


        </div>
        <div class="form-container sign-in">
          <a href="../index.php" ><img src="../img/seta.png" class="setinha"></a>
            <form name="Login" id="Login" action="../control/loginController.php" method="post">
                <h1>Faça seu Login</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>ou use seu email e senha</span>
                <input type="email" placeholder="Email" name="emailUsu" required>
                <input type="password" placeholder="Senha" name="senhaUsu" required>
                <a href="EsqueciSenha.php">Esqueceu sua senha?</a>
                <button input type="submit" value="submit">Acessar</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <a href="../index.php"><img src="../img/logo.png" alt="" class="logo_login"></a>
                    <h1>Bem vindo!</h1>
                    <p>Insira seus dados pessoais para usar todos os recursos do site</p>
                    <p>Caso já seja cadastrado, clique no botão abaixo.</p>
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <a href="../index.php"><img src="../img/logo.png" alt="" class="logo_login"></a>
                    <h1>Olá, Cliente</h1>
                    <p>Caso não tenha um login, realize seu cadastro no botão abaixo</p>
                    <button class="hidden" id="register">Cadastre-se</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.getElementById("cadastro").addEventListener("submit", function (event) {
      event.preventDefault();

      const formData = new FormData(this);

fetch("../Control/cadastrarUsuarioController.php", {
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('a[href="../control/loginController.php"]').click(function(e) {
        e.preventDefault();
        if (confirm('Você está prestes a encerrar sua sessão. Tem certeza que deseja sair?')) {
            window.location.href = $(this).attr('href');
        }
    });
});
</script>





 





    <script src="script.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../js/jquery.mask.js"> </script>

    <script>
        $('#cpf').mask('000.000.000-00', { reverse: true });
        $('#telefone').mask('(00) 0000-0000');
    </script>

</body>

</html>