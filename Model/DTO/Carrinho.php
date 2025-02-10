    <?php
   
        class Carrinho{
           private UsuarioDTO $usuario;
           private array $itemCarrinho = [];

            public function setUsuario(UsuarioDTO $usuario){
                $this->usuario = $usuario;

            }
            public function getUsuario(){
                return $this->usuario;
            }
            public function getItemCarrinho(){
                return $this->itemCarrinho;
            }
            public function getItemCarrinhoByIdPac($idPac){
                return $this->itemCarrinho[$idPac];
            }

            public function addItem(PacoteDTO $pacote) {
                // se o pacote já estiver no carrinho -> adicionar item ao pacote
                if (isset($this->itemCarrinho[$pacote->getIdPac()])) {
                    $this->itemCarrinho[$pacote->getIdPac()]->addItem();
                }else{
                //senão criar um novo item de pacote no carrinho
                    $this->itemCarrinho[$pacote->getIdPac()] = new ItemCarrinho();
                    $this->itemCarrinho[$pacote->getIdPac()]->setPacote($pacote);
                }
            }
            public function removerItem(PacoteDTO $pacote){
                unset($this->itemCarrinho[$pacote->getIdPac()]);
            }
        }

    ?>