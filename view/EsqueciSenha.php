<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <title>Esqueci minha senha</title>
  <style>
    body {
      background-color: white;
    }

    .container {
      width: 25%;
      margin: auto;
      text-align: center;
    }

    h1 {
      margin-top: 0;
    }

    input {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 2px solid purple;
      border-radius: 10px;
    }

    button {
      background-color: #512da8;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      border-radius: 10px;
    }
  </style>



</head>
<body>
  <div class="container">
    <h1>Esqueci minha senha</h1>
    <p>Digite seu endereço de e-mail abaixo e enviaremos um link para redefinir sua senha.</p>
    <form>
      <input type="email" id="emailUsu" name="emailUsu" placeholder="Endereço de e-mail" required>
      <button type="button" onclick="verificarEmail()">Enviar</button>
    </form>
  </div>
</body>
</html>

