<?php
require_once 'config.php';

class Produtos
{
    public static function select(int $id)
        {
            $tabela = "produto";
            $coluna = "produtoId";

            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
        
            $sql = "select * from $tabela where $coluna = :id" ;

            $stmt = $connPdo->prepare($sql);

            $stmt->bindValue(':id' , $id) ;

            $stmt->execute() ;


            
            if ($stmt->rowCount() > 0)
            {
                return $stmt->fetch(PDO::FETCH_ASSOC) ;
            }
            else
            {
                throw new Exception("Nenhum registro encontrado");
            }
        }

    public static function selectAll(){
        
            $tabela1 = "produto";
            $tabela2 = "corredor";
       
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
        
            $sql = "select * from $tabela1 as t1 inner join $tabela2 as t2 on t1.corredorId=t2.corredorId" ;

            $stmt = $connPdo->prepare($sql);

            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return $stmt->fetchAll(PDO::FETCH_ASSOC) ;
            }
            else
            {
                throw new Exception("Nenhum registro encontrado");
            }
        }


    public static function insert($dados){
           $tabela = "produto";
           
           $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
  
           $sql = "insert into $tabela (produtoId,corredorId,data_validade,qtdeKg,nome_produto) values (:produtoId, :corredorId, :data_validade, :qtdeKg, :nome_produto)"  ;
           $stmt = $connPdo->prepare($sql);
           
           $stmt->bindValue(':produtoId' , $dados['produtoId']) ;
           $stmt->bindValue(':corredorId' , $dados['corredorId']) ;
           $stmt->bindValue(':data_validade' , $dados['data_validade']) ;
           $stmt->bindValue(':qtdeKg' , $dados['qtdeKg']) ;
           $stmt->bindValue(':nome_produto' , $dados['nome_produto']) ;
           $stmt->execute() ;

           if ($stmt->rowCount() > 0)
           {
               return "Registro incluso";
           }else
           {
               throw new Exception("Erro ao inserir o registro");
           }
    }

    public static function update($id, $dados){
           $tabela = "produto";
           $coluna = "produtoId";
           
           $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
  
           $sql = "update $tabela set corredorId=:corredorId, data_validade=:data_validade,qtdeKg=:qtdeKg,nome_produto=:nome_produto where $coluna=:produtoId"  ;
           $stmt = $connPdo->prepare($sql);

           $stmt->bindValue(':produtoId' , $id) ;
           $stmt->bindValue(':corredorId' , $dados['corredorId']) ;
           $stmt->bindValue(':data_validade' , $dados['data_validade']) ;
           $stmt->bindValue(':qtdeKg' , $dados['qtdeKg']) ;
           $stmt->bindValue(':nome_produto' , $dados['nome_produto']) ;
           $stmt->execute() ;

           if ($stmt->rowCount() > 0)
           {
               return "Atualização do registro de codigo $id feita com sucesso";
           }else
           {
               throw new Exception("Erro ao atualizar registro");
           }

    }

    public static function delete($id){
        $tabela = "produto";
        $coluna = "produtoId";
        
        $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);

        $sql = "delete from $tabela where $coluna=:produtoId";
        $stmt = $connPdo->prepare($sql);

        $stmt->bindValue(':produtoId' , $id) ;
        $stmt->execute() ;

        if ($stmt->rowCount() > 0)
           {
               return "Exclusao do registro de codigo $id realizada com sucesso";
           }else
           {
               throw new Exception("Erro ao excluir registro");
           }
    }

    }

?>