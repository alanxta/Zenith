<?php
session_start();
    require_once '../model/DTO/PacoteDTO.php';
    require_once '../model/DAO/PacoteDAO.php';

 
      $nomePacote = strip_tags($_POST["nomePac"]);
      $valorVendaPacote = strip_tags($_POST["valorVendaPac"]);
      $descricaoPacote = strip_tags($_POST["descricaoPac"]);  
      $imagemPacote = "";
      $tituloPacote = strip_tags($_POST["tituloPac"]); 
      $codigoPacote = strip_tags($_POST["codigoPac"]);
      $situacaoPacote = strip_tags($_POST["situacaoPac"]);


      $pacoteDTO = new PacoteDTO();
      $pacoteDTO->setNomePac($nomePacote);
      $pacoteDTO->setValorVendaPac($valorVendaPacote);
      $pacoteDTO->setDescricaoPac($descricaoPacote);

      $pacoteDTO->setTituloPac($tituloPacote);
      $pacoteDTO->setCodigoPac($codigoPacote);
      $pacoteDTO->setSituacaoPac($situacaoPacote);

      if (isset($_FILES["imagemPac"])) {
        $Arquivo = $_FILES["imagemPac"]["name"];
        $pastaDestino = "../imagemPac";
        $Arquivo = uniqid()."_".$Arquivo;
        $arqDestino = $pastaDestino.'/'.$Arquivo;
        if (move_uploaded_file($_FILES["imagemPac"]["tmp_name"], $arqDestino)) {
            $imagemPacote = $Arquivo;
        }
      }
      
      $pacoteDTO->setImagemPac($imagemPacote);



      //echo "{$usuarioDTO->getDtNascimentoUsu()}";
      $pacoteDAO = new PacoteDAO();
            
      $sucesso = $pacoteDAO->salvarPacote($pacoteDTO);

 
    
      if ($sucesso === "treino já cadastrado!") {
        echo json_encode(["success" => false, "message" => $sucesso]);
      } else if ($sucesso) {
        echo json_encode(["success" => true, "message" => "Pacote cadastrado com sucesso!"] );
      } else {
        echo json_encode(["success" => false, "message" => "Aconteceu um problema no cadastramento"]);
      }
     // header("Location: ../view/cadastrarProduto.php");
   

?>