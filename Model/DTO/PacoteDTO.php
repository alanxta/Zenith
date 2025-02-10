<?php
    class PacoteDTO{
        private $idPac;
        private $nomePac;
        private $valorVendaPac;
        private $imagemPac;
        private $codigoPac;
        private $situacaoPac;
        private $descricaoPac;
        private $comentarioPac;
        private $estrelaPac;
        private $tituloPac;

        public function setIdPac($idPac){
            $this->idPac = $idPac;
        }
        public function getIdPac(){
            return $this->idPac;
        }
        public function setNomePac($nomePac){
            $this->nomePac = $nomePac;
        }
        public function getNomePac(){
            return $this->nomePac;
        }


        public function setValorVendaPac($valorVendaPac){
            $this->valorVendaPac = $valorVendaPac;
        }
        public function getValorVendaPac(){
            return $this->valorVendaPac;
        }


        public function setImagemPac($imagemPac){
            $this->imagemPac = $imagemPac;
        }
        public function getImagemPac(){
            return $this->imagemPac;
        }


        public function setCodigoPac($codigoPac){
            $this->codigoPac = $codigoPac;
        }
        public function getCodigoPac(){
            return $this->codigoPac;
        }


        public function setSituacaoPac($situacaoPac){
            $this->situacaoPac = $situacaoPac;
        }
        public function getSituacaoPac(){
            return $this->situacaoPac;
        }


        public function setDescricaoPac($descricaoPac){
            $this->descricaoPac = $descricaoPac;
        }
        public function getDescricaoPac(){
            return $this->descricaoPac;
        }


        public function setComentarioPac($comentarioPac){
            $this->comentarioPac = $comentarioPac;
        }
        public function getComentarioPac(){
            return $this->comentarioPac;
        }


        public function setEstrelaPac($estrelaPac){
            $this->estrelaPac = $estrelaPac;
        }
        public function getEstrelaPac(){
            return $this->estrelaPac;
        }

        public function setTituloPac($tituloPac){
            $this->tituloPac = $tituloPac;
        }
        public function getTituloPac(){
            return $this->tituloPac;
        }
  
        }


?>