<?php
    class PedidoDTO{
        private $idPed;
        private $dtHoraPed;
        private $valorTotalPed;
        private $situacaoPed;
        private $formaPagamentoPed;
        

        public function setIdPed($idPed){
            $this->idPed = $idPed;
        }
        public function getIdPed(){
            return $this->idPed;
        }
        public function setDtHoraPed($dtHoraPed){
            $this->dtHoraPed = $dtHoraPed;
        }
        public function getDtHoraPed(){
            return $this->dtHoraPed;
        }


        public function setValorTotalPed($valorTotalPed){
            $this->valorTotalPed = $valorTotalPed;
        }
        public function getValorTotalPed(){
            return $this->valorTotalPed;
        }


        public function setSituacaoPed($situacaoPed){
            $this->situacaoPed = $situacaoPed;
        }
        public function getSituacaoPed(){
            return $this->situacaoPed;
        }


        public function setFormaPagamentoPed($formaPagamentoPed){
            $this->formaPagamentoPed = $formaPagamentoPed;
        }
        public function getFormaPagamentoPed(){
            return $this->formaPagamentoPed;
        }


        }


?>