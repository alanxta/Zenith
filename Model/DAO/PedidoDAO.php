<?php
    include 'Conexao.php';
    require_once '../model/DTO/PedidoDTO.php';
    class PedidoDAO{
        public $pdo = null;

        public function __construct(){
            $this->pdo = Conexao::getInstance();
        }
        public function salvarPedido(PedidoDTO $pedidoDTO){

            try{
                $sql = "INSERT INTO pedido (dtHoraPed, valorTotalPed, situacaoPed, formaPagamentoPed) VALUES (?,?,?,?)";

                $stmt = $this->pdo->prepare($sql);
    
                $dtHoraPed = $pedidoDTO->getDtHoraPed();
                $valorTotalPed = $pedidoDTO->getValorTotalPed();
                $situacaoPed = $pedidoDTO->getSituacaoPed();
                $formaPagamentoPed = $pedidoDTO->getFormaPagamentoPed();


    
                $stmt->bindValue(1, $dtHoraPed);
                $stmt->bindValue(2, $valorTotalPed);
                $stmt->bindValue(3, $situacaoPed);
                $stmt->bindValue(4, $formaPagamentoPed);


    
                $retorno = $stmt->execute();
                return  $retorno;

            }catch(PDOException $exc){
                echo $exc->getMessage();
            }

        }

 //LISTAR PEDIDOS
 public function listarPedidos()
 {
     try {
         $sql = "SELECT * FROM pedido";
         $stmt = $this->pdo->prepare($sql);
         

         $stmt->execute();

         $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

         return $retorno;
     } catch (PDOException $exc) {
         echo $exc->getMessage();
     }
 }
//excluir pedido
 public function excluirPedidos($idPedido) {
         try {
             $sql = "DELETE FROM pedido
             WHERE idPed = ?";
             
             $stmt = $this->pdo->prepare($sql);
             $stmt->bindValue(1, $idPedido);

             
             $retorno = $stmt->execute();
            
             return $retorno;
          } catch (PDOException $exc) {
             echo $exc->getMessage();
             
          }
       }


 public function alterarPedido(PedidoDTO $pedidoDTO)
 {

     try {
         $sql = "UPDATE pedido SET dtHoraPed=?,valorTotalPed=?,situacaoPed=?,formaPagamentoPed=?
         WHERE idPed= ? ";
         $stmt = $this->pdo->prepare($sql);

         $dtHoraPedido = $pedidoDTO->getDtHoraPed();
         $valorTotalPedido = $pedidoDTO->getValorTotalPed();
         $situacaoPedido = $pedidoDTO->getSituacaoPed();
         $formaPagamentoPedido = $pedidoDTO->getFormaPagamentoPed();
         $idPedido = $pedidoDTO->getIdPed();

         $stmt->bindValue(1, $dtHoraPedido);
         $stmt->bindValue(2, $valorTotalPedido);
         $stmt->bindValue(3, $situacaoPedido);
         $stmt->bindValue(4, $formaPagamentoPedido);
         $stmt->bindValue(5, $idPedido);

         $retorno =  $stmt->execute();



         return $retorno;
     } catch (PDOException $exc) {
         echo $exc->getMessage();           
     }
 }

  //PesquisarPedidoPorId
public function pesquisarPedidoPorId($idPedido) {
 try {
     $sql = "SELECT * FROM pedido WHERE idPed = {$idPedido}; ";
     $stmt = $this->pdo->prepare($sql);
     
     $stmt->execute();
       $retorno = $stmt->fetch(PDO::FETCH_ASSOC); 
     return $retorno;
  } catch (PDOException $exc) {
     echo $exc->getMessage();  
  }
}

 //função dentro do PedidoDAO

 public function novoPedido($idUsu)
 {
     //echo "{$usuarioDTO->getDtNascimentoUsu()}";
    
     try {
         

         $usuario_idUsu = $idUsu;
         $dtHoraPed = date('d/m/Y H:i');
         $valorTotalPed = '0.00';
         $situacaoPed = 'Aberto';
         $formaPagamentoPed = 'Não definido';
         
         
         $sql = "INSERT INTO pedido ('dtHoraPed', 'valorTotalPed', 'situacaoPed', 'formaPagamentoPed', 'usuario_idUsu') 
         VALUES ('{$dtHoraPed}', '{$valorTotalPed}', '{$situacaoPed}', '{$formaPagamentoPed}', '{$usuario_idUsu}')";
         $stmt = $this->pdo->prepare($sql);

         $retorno = $stmt->execute();
         return $retorno;
     } catch (PDOException $exc) {
         echo $exc->getMessage();
     }
 }

    }

?>