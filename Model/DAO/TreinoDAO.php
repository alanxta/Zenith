<?php
    include 'Conexao.php';
    require_once '../model/DTO/TreinoDTO.php';
    class TreinoDAO{
        public $pdo = null;

        public function __construct(){
            $this->pdo = Conexao::getInstance();
        }
        public function salvarTreino(TreinoDTO $treinoDTO){

            try{
                $sql = "INSERT INTO treino (descricaoTre, videoTre, tituloTre, statusTre, tipoTre) VALUES (?,?,?,?,?)";

                $stmt = $this->pdo->prepare($sql);
    
                $descricaoTre = $treinoDTO->getDescricaoTre();
                $videoTre = $treinoDTO->getVideoTre();
                $tituloTre = $treinoDTO->getTituloTre();
                $statusTre = $treinoDTO->getStatusTre();
                $tipoTre = $treinoDTO->getTipoTre();


    
                $stmt->bindValue(1, $descricaoTre);
                $stmt->bindValue(2, $videoTre);
                $stmt->bindValue(3, $tituloTre);
                $stmt->bindValue(4, $statusTre);
                $stmt->bindValue(5, $tipoTre);


    
                $retorno = $stmt->execute();
                return  $retorno;

            }catch(PDOException $exc){
                echo $exc->getMessage();
            }

        }

 //LISTAR Treinos
 public function listarTreinos()
 {
     try {
         $sql = "SELECT * FROM treino";
         $stmt = $this->pdo->prepare($sql);
         

         $stmt->execute();

         $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

         return $retorno;
     } catch (PDOException $exc) {
         echo $exc->getMessage();
     }
 }
//excluir treino
 public function excluirTreino($idTreino) {
         try {
             $sql = "DELETE FROM treino
             WHERE idTre = ?";
             
             $stmt = $this->pdo->prepare($sql);
             $stmt->bindValue(1, $idTreino);

             
             $retorno = $stmt->execute();
            
             return $retorno;
          } catch (PDOException $exc) {
             echo $exc->getMessage();
             
          }
       }


 public function alterarTreino(TreinoDTO $treinoDTO)
 {

     try {
         $sql = "UPDATE treino SET descricaoTre=?,statusTre=?,tituloTre=?,videoTre=?,tipoTre=?
         WHERE idTre= ? ";
         $stmt = $this->pdo->prepare($sql);

         $idTreino = $treinoDTO->getIdTre();
         $descricaoTreino = $treinoDTO->getDescricaoTre();
         $statusTreino = $treinoDTO->getStatusTre();
         $tituloTreino = $treinoDTO->getTituloTre();
         $videoTreino = $treinoDTO->getVideoTre();
         $tipoTreino = $treinoDTO->getTipoTre();



         $stmt->bindValue(1, $descricaoTreino);
         $stmt->bindValue(2, $statusTreino);
         $stmt->bindValue(3, $tituloTreino);
         $stmt->bindValue(4, $videoTreino);
         $stmt->bindValue(5, $tipoTreino);
         $stmt->bindValue(6, $idTreino);

         $retorno =  $stmt->execute();



         return $retorno;
     } catch (PDOException $exc) {
         echo $exc->getMessage();           
     }
 }

  //PesquisarTreinoPorId
public function pesquisarTreinoPorId($idTreino) {
 try {
     $sql = "SELECT * FROM treino WHERE idTre = {$idTreino}; ";
     $stmt = $this->pdo->prepare($sql);
     
     $stmt->execute();
       $retorno = $stmt->fetch(PDO::FETCH_ASSOC); 
     return $retorno;
  } catch (PDOException $exc) {
     echo $exc->getMessage();  
  }
}

public function listarTreinosEmagrecer()
{
    try {
        $sql = "SELECT * FROM treino WHERE tipoTre = 'Emagrecer'";
        $stmt = $this->pdo->prepare($sql);
        

        $stmt->execute();

        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $retorno;
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
}

public function listarTreinosFortalecer()
{
    try {
        $sql = "SELECT * FROM treino WHERE tipoTre = 'Fortalecer'";
        $stmt = $this->pdo->prepare($sql);
        

        $stmt->execute();

        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $retorno;
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
}

public function listarTreinosGanharMassa()
{
    try {
        $sql = "SELECT * FROM treino WHERE tipoTre = 'Ganhar Massa'";
        $stmt = $this->pdo->prepare($sql);
        

        $stmt->execute();

        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $retorno;
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
}



    }

?>