<?php

    class ItemCarrinho{
        private PacoteDTO $pacote;
        private $quantidade = 1;//adicionar item já adicionado com qtd = 1

    public function setPacote(PacoteDTO $pacote){
        $this->pacote = $pacote;
    }
    public function getPacote(){
        return $this->pacote;
    }
    public function getQtdPac(){
        return $this->quantidade;
    }

    public function addItem(){
        $this->quantidade++;
    }
    public function removerItem(){
        $this->quantidade--;
    }

}

?>