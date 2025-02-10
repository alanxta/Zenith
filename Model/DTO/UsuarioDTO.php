<?php
    class UsuarioDTO{
        private $nomeUsu;
        private $emailUsu;
        private $cpfUsu;
        private $senhaUsu;
        private $dtNascimentoUsu;
        private $telefoneUsu;
        private $fotoUsu;
        private $idUsu;
        private $situacaoUsu;
        private $perfilUsu;
        private $acessoUsu;
        
        public function setNomeUsu($nomeUsu){
            $this->nomeUsu = $nomeUsu;
        }
        public function getNomeUsu(){
            return $this->nomeUsu;
        }

        public function setEmailUsu($emailUsu){
            $this->emailUsu = $emailUsu;
        }
        public function getEmailUsu() {
            return $this->emailUsu;
        }   

        public function setCpfUsu($cpfUsu){
            $this->cpfUsu = $cpfUsu;
        }
        public function getCpfUsu() {
            return $this->cpfUsu;
        }   

        public function setSenhaUsu($senhaUsu){
            $this->senhaUsu = $senhaUsu;
        }
        public function getSenhaUsu() {
            return $this->senhaUsu;
        }   

        public function setDtNascimentoUsu($dtNascimentoUsu){
            $this->dtNascimentoUsu = $dtNascimentoUsu;
        }
        public function getDtNascimentoUsu() {
            return $this->dtNascimentoUsu;
        }  

        public function setTelefoneUsu($telefoneUsu){
            $this->telefoneUsu = $telefoneUsu;
        }
        public function getTelefoneUsu() {
            return $this->telefoneUsu;
        }  

        
        public function setFotoUsu($fotoUsu){
            $this->fotoUsu = $fotoUsu;
        }
        public function getFotoUsu() {
            return $this->fotoUsu;
        }

        public function setIdUsu($idUsu){
            $this->idUsu = $idUsu;
    
        }
        public function getIdUsu(){
            return $this->idUsu;
        }

        public function setSituacaoUsu($situacaoUsu){
            $this->situacaoUsu = $situacaoUsu;
    
        }
        public function getSituacaoUsu(){
            return $this->situacaoUsu;
        }

        public function setPerfilUsu($perfilUsu){
            $this->perfilUsu = $perfilUsu;
    
        }
        public function getPerfilUsu(){
            return $this->perfilUsu;
        }

        public function setAcessoUsu($acessoUsu){
            $this->acessoUsu = $acessoUsu;
    
        }
        public function getAcessoUsu(){
            return $this->acessoUsu;
        }
        


        }


?>