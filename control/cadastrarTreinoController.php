<?php
session_start();
require_once '../model/DAO/TreinoDAO.php';
require_once '../model/DTO/TreinoDTO.php';


//receber os dados do formulario
$statusTreino = strip_tags($_POST["statusTre"]);
$descricaoTreino = strip_tags($_POST["descricaoTre"]);
$videoTreino = $_POST["videoTre"];
$tituloTreino = strip_tags($_POST["tituloTre"]);
$tipoTreino = strip_tags($_POST["tipoTre"]);



//criar o objeto DTO para armazenar os dados do formulario
$treinoDTO = new TreinoDTO();

$treinoDTO->setStatusTre($statusTreino);
$treinoDTO->setDescricaoTre($descricaoTreino);
$treinoDTO->setVideoTre($videoTreino);
$treinoDTO->setTituloTre($tituloTreino);
$treinoDTO->setTipoTre($tipoTreino);



//criar o objeto que gravará os dados no banco
$treinoDAO = new TreinoDAO();
      
$sucesso = $treinoDAO->salvarTreino($treinoDTO);

if ($sucesso === "treino já cadastrado!") {
  echo json_encode(["success" => false, "message" => $sucesso]);
} else if ($sucesso) {
  echo json_encode(["success" => true, "message" => "Pacote cadastrado com sucesso!"] );
} else {
  echo json_encode(["success" => false, "message" => "Aconteceu um problema no cadastramento"]);
}
?>
