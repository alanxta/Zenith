<?php
    include 'Conexao.php';
    require_once '../model/DTO/PacoteDTO.php';
    class PacoteDAO{
        public $pdo = null;

        public function __construct(){
            $this->pdo = Conexao::getInstance();
        }
        public function salvarPacote(PacoteDTO $pacoteDTO){

            try{
                $sql = "INSERT INTO pacote (nomePac, valorVendaPac, imagemPac, codigoPac, situacaoPac, descricaoPac, comentarioPac, estrelaPac, tituloPac) VALUES (?,?,?,?,?,?,?,?,?)";

                $stmt = $this->pdo->prepare($sql);
    
                $nomePac = $pacoteDTO->getNomePac();
                $valorVendaPac = $pacoteDTO->getValorVendaPac();
                $imagemPac = $pacoteDTO->getImagemPac();
                $codigoPac = $pacoteDTO->getCodigoPac();
                $situacaoPac = $pacoteDTO->getSituacaoPac();
                $descricaoPac = $pacoteDTO->getDescricaoPac();
                $comentarioPac = $pacoteDTO->getComentarioPac();
                $estrelaPac = $pacoteDTO->getEstrelaPac();
                $tituloPac = $pacoteDTO->getTituloPac();


    
                $stmt->bindValue(1, $nomePac);
                $stmt->bindValue(2, $valorVendaPac);
                $stmt->bindValue(3, $imagemPac);
                $stmt->bindValue(4, $codigoPac);
                $stmt->bindValue(5, $situacaoPac);
                $stmt->bindValue(6, $descricaoPac);
                $stmt->bindValue(7, $comentarioPac);
                $stmt->bindValue(8, $estrelaPac);
                $stmt->bindValue(9, $tituloPac);

    
                $retorno = $stmt->execute();
                return  $retorno;

            }catch(PDOException $exc){
                echo $exc->getMessage();
            }

        }

 //LISTAR PACOTES
 public function listarPacotes()
 {
     try {
         $sql = "SELECT * FROM pacote";
         $stmt = $this->pdo->prepare($sql);
         

         $stmt->execute();

         $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

         return $retorno;
     } catch (PDOException $exc) {
         echo $exc->getMessage();
     }
 }
//excluir pacotes
 public function excluirPacotes($idPacote) {
         try {
             $sql = "DELETE FROM pacote
             WHERE idPac = ?";
             
             $stmt = $this->pdo->prepare($sql);
             $stmt->bindValue(1, $idPacote);

             
             $retorno = $stmt->execute();
            
             return $retorno;
          } catch (PDOException $exc) {
             echo $exc->getMessage();
             
          }
       }


 public function alterarPacote(PacoteDTO $pacoteDTO)
 {

     try {
         $sql = "UPDATE pacote SET nomePac=?,valorVendaPac=?,situacaoPac=?,descricaoPac=?,tituloPac=?
         WHERE idPac= ? ";
         $stmt = $this->pdo->prepare($sql);

         $nomePacote = $pacoteDTO->getNomePac();
         $valorVendaPacote = $pacoteDTO->getValorVendaPac();
         $situacaoPacote = $pacoteDTO->getSituacaoPac();
         $descricaoPacote = $pacoteDTO->getDescricaoPac();
         $tituloPacote = $pacoteDTO->getTituloPac();
         $idPacote = $pacoteDTO->getIdPac();

         $stmt->bindValue(1, $nomePacote);
         $stmt->bindValue(2, $valorVendaPacote);
         $stmt->bindValue(3, $situacaoPacote);
         $stmt->bindValue(4, $descricaoPacote);
         $stmt->bindValue(5, $tituloPacote);
         $stmt->bindValue(6, $idPacote);


         $retorno =  $stmt->execute();



         return $retorno;
     } catch (PDOException $exc) {
         echo $exc->getMessage();           
     }
 }

  //PesquisarPacotePorId
public function pesquisarPacotePorId($idPacote) {
 try {
     $sql = "SELECT * FROM pacote WHERE idPac = {$idPacote}; ";
     $stmt = $this->pdo->prepare($sql);
     
     $stmt->execute();
       $retorno = $stmt->fetch(PDO::FETCH_ASSOC); 
     return $retorno;
  } catch (PDOException $exc) {
     echo $exc->getMessage();  
  }
}
//
// MD5('123')


    }

?>