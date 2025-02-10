<?php
    class TreinoDTO{
        private $idTre;
        private $nomeTre;
        private $statusTre;
        private $descricaoTre;
        private $tituloTre;
        private $videoTre;
        private $tipoTre;
        

        public function setIdTre($idTre){
            $this->idTre = $idTre;
        }
        public function getIdTre(){
            return $this->idTre;
        }
        public function setNomeTre($nomeTre){
            $this->nomeTre = $nomeTre;
        }
        public function getNomeTre(){
            return $this->nomeTre;
        }
        public function setStatusTre($statusTre){
            $this->statusTre = $statusTre;
        }
        public function getStatusTre(){
            return $this->statusTre;
        }


        public function setDescricaoTre($descricaoTre){
            $this->descricaoTre = $descricaoTre;
        }
        public function getDescricaoTre(){
            return $this->descricaoTre;
        }


        public function setTituloTre($tituloTre){
            $this->tituloTre = $tituloTre;
        }
        public function getTituloTre(){
            return $this->tituloTre;
        }

        public function setVideoTre($videoTre){
            $this->videoTre = $videoTre;
        }
        public function getVideoTre(){
            return $this->videoTre;
        }

        public function setTipoTre($tipoTre){
            $this->tipoTre = $tipoTre;
        }
        public function getTipoTre(){
            return $this->tipoTre;
        }

    }
?>