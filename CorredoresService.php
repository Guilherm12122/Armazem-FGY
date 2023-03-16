<?php
include 'Corredores.php';

class CorredoresService{
    public function get(){
        return Corredores::selectAll();
    }
}


?>