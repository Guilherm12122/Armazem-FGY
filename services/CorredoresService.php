<?php
include 'entities/Corredores.php';

class CorredoresService{
    public function get(){
        return Corredores::selectAll();
    }
}


?>