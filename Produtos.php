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
        
            $tabela = "produto";
       
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
        
            $sql = "select * from $tabela" ;

            $stmt = $connPdo->prepare($sql);

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

    }

?>