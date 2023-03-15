<?php
include 'Produtos.php';

class ProdutosService
{
    public function get($id)
    {
        if ($id){             
           return Produtos::select($id) ;
        }
    }

    public function getAll(){
        return Produtos::selectAll();
    }

}

?>