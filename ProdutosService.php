<?php
include 'Produtos.php';

class ProdutosService
{
    public function get($id=null)
    {
        if ($id){             
           return Produtos::select($id) ;
        }
        else{
            return Produtos::selectAll();
        }
    }

    public function post(){
        $dados = $_POST; 
        return Produtos::insert($dados);
    }
}

?>