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

    public function put($id=null){
        if ($id == null ){
            throw new Exception("Falta o código");
         }       
         $dados = json_decode(file_get_contents('php://input'), true, 512);
         if ($dados == null ){
            throw new Exception("Faltam os dados de entrada");
         }
         return Produtos::update($id,$dados);
    }
}

?>