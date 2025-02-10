<?php
    include 'Conexao.php';
    require_once '../model/DTO/UsuarioDTO.php';
    class UsuarioDAO{
        public $pdo = null;

        public function __construct(){
            $this->pdo = Conexao::getInstance();
        }
        public function salvarUsuario(UsuarioDTO $usuarioDTO){

            try{
                $sql = "INSERT INTO usuario (nomeUsu, emailUsu, cpfUsu, dtNascimentoUsu, telefoneUsu, situacaoUsu, perfilUsu, senhaUsu, fotoUsu) VALUES (?,?,?,?,?,?,?,?,?)";

                $stmt = $this->pdo->prepare($sql);
    
                $nomeUsu = $usuarioDTO->getNomeUsu();
                $emailUsu = $usuarioDTO->getEmailUsu();
                $cpfUsu = $usuarioDTO->getCpfUsu();
                $dtNascimentoUsu = $usuarioDTO->getDtNascimentoUsu();
                $telefoneUsu = $usuarioDTO->getTelefoneUsu();
                $situacaoUsu = $usuarioDTO->getSituacaoUsu();
                $perfilUsu = $usuarioDTO->getPerfilUsu();
                $senhaUsu = $usuarioDTO->getSenhaUsu();
                $fotoUsu = $usuarioDTO->getFotoUsu();

    
                $stmt->bindValue(1, $nomeUsu);
                $stmt->bindValue(2, $emailUsu);
                $stmt->bindValue(3, $cpfUsu);
                $stmt->bindValue(4, $dtNascimentoUsu);
                $stmt->bindValue(5, $telefoneUsu);
                $stmt->bindValue(6, $situacaoUsu);
                $stmt->bindValue(7, $perfilUsu);
                $stmt->bindValue(8, $senhaUsu);
                $stmt->bindValue(9, $fotoUsu);

    
                $retorno = $stmt->execute();
                return  $retorno;

            }catch(PDOException $exc){
                echo $exc->getMessage();
            }

        }

 //LISTAR USUÁRIOS
 public function listarUsuarios()
 {
     try {
         $sql = "SELECT * FROM usuario";
         $stmt = $this->pdo->prepare($sql);
         

         $stmt->execute();

         $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

         return $retorno;
     } catch (PDOException $exc) {
         echo $exc->getMessage();
     }
 }
//excluir usuários
 public function excluirUsuario($idUsuario) {
         try {
             $sql = "DELETE FROM usuario
             WHERE idUsu = ?";
             
             $stmt = $this->pdo->prepare($sql);
             $stmt->bindValue(1, $idUsuario);

             
             $retorno = $stmt->execute();
            
             return $retorno;
          } catch (PDOException $exc) {
             echo $exc->getMessage();
             
          }
       }


 public function alterarUsuario(UsuarioDTO $usuarioDTO)
 {

     try {
         $sql = "UPDATE usuario SET nomeUsu=?,emailUsu=?,dtNascimentoUsu=?,telefoneUsu=?,situacaoUsu=?,perfilUsu=?
         WHERE idUsu= ? ";
         $stmt = $this->pdo->prepare($sql);

         $idUsuario = $usuarioDTO->getIdUsu();
         $nomeUsuario = $usuarioDTO->getNomeUsu();
         $emailUsuario = $usuarioDTO->getEmailUsu();
         $dtNascimentoUsuario = $usuarioDTO->getDtNascimentoUsu();
         $telefoneUsuario = $usuarioDTO->getTelefoneUsu();
         $situacaoUsuario = $usuarioDTO->getSituacaoUsu();
         $perfilUsuario = $usuarioDTO->getPerfilUsu();


         $stmt->bindValue(1, $nomeUsuario);
         $stmt->bindValue(2, $emailUsuario);
         $stmt->bindValue(3, $dtNascimentoUsuario);
         $stmt->bindValue(4, $telefoneUsuario);
         $stmt->bindValue(5, $situacaoUsuario);
         $stmt->bindValue(6, $perfilUsuario);
         $stmt->bindValue(7, $idUsuario);

         $retorno =  $stmt->execute();



         return $retorno;
     } catch (PDOException $exc) {
         echo $exc->getMessage();           
     }
 }

  //PesquisarUsuarioPorId
public function pesquisarUsuarioPorId($idUsuario) {
 try {
     $sql = "SELECT * FROM usuario WHERE idUsu = {$idUsuario}; ";
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
public function validarLogin($emailUsu,$senhaUsu) {
 try {
     $sql = "SELECT * FROM usuario WHERE emailUsu = '{$emailUsu}' AND
      senhaUsu = '{$senhaUsu}'; ";
     $stmt = $this->pdo->prepare($sql);
     
     $stmt->execute();
       $retorno = $stmt->fetch(PDO::FETCH_ASSOC); 
     return $retorno;
  } catch (PDOException $exc) {
     echo $exc->getMessage();  
  }
}

function LogOut(){
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
 }

 public function buscarUsuarioPorEmail($emailUsu)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE emailUsu = {$emailUsu}; ";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

public function emailExists($emailUsu) {
            try {
                $sql = "SELECT COUNT(*) FROM usuario WHERE emailUsu = ?";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(1, $emailUsu);
                $stmt->execute();
                $count = $stmt->fetchColumn();
    
                return $count > 0;
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        }


        public function alterarPerfil(UsuarioDTO $usuarioDTO)
        {
       
            try {
                $sql = "UPDATE usuario SET nomeUsu=?,emailUsu=?,dtNascimentoUsu=?,telefoneUsu=?
                WHERE idUsu= ? ";
                $stmt = $this->pdo->prepare($sql);
       
                $idUsuario = $usuarioDTO->getIdUsu();
                $nomeUsuario = $usuarioDTO->getNomeUsu();
                $emailUsuario = $usuarioDTO->getEmailUsu();
                $dtNascimentoUsuario = $usuarioDTO->getDtNascimentoUsu();
                $telefoneUsuario = $usuarioDTO->getTelefoneUsu();
       
                $stmt->bindValue(1, $nomeUsuario);
                $stmt->bindValue(2, $emailUsuario);
                $stmt->bindValue(3, $dtNascimentoUsuario);
                $stmt->bindValue(4, $telefoneUsuario);
                $stmt->bindValue(5, $idUsuario);
       
                $retorno =  $stmt->execute();
       
       
       
                return $retorno;
            } catch (PDOException $exc) {
                echo $exc->getMessage();           
            }
        }








        public function alterarAcesso(UsuarioDTO $usuarioDTO) {
            try {
                $sql = "UPDATE usuario SET acessoUsu = 2 WHERE idUsu = ?";
                $stmt = $this->pdo->prepare($sql);
    
                $idUsuario = $usuarioDTO->getIdUsu();
    
                $stmt->bindValue(1, $idUsuario, PDO::PARAM_INT);
    
                $retorno = $stmt->execute();
    
                return $retorno;
            } catch (PDOException $exc) {
                echo $exc->getMessage();           
            }
  
    }
}



?>