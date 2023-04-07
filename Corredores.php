<?php
require 'config.php';

class Corredores{
    public static function selectAll(){
        
        $tabela = "corredor";
   
        $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
    
        $sql = "select * from $tabela" ;
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
}

?>