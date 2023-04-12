<?php
include 'services/ProdutosService.php';
include 'services/CorredoresService.php';
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");  // Necessário para a mesma máquina (localhost)  
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control: no-cache, no-store, must-revalidate");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Max-Age: 86400");

var_dump($_GET);
var_dump($_GET['url']) ; 

if ($_GET['url']){
       
    $url = explode('/' , $_GET['url']);
    var_dump($url); 

    if ($url[0] === 'api' ){           
        array_shift($url);
        
        $service = ucfirst( $url[0]).'Service' ;
        array_shift($url);
        
        $method = strtolower( $_SERVER['REQUEST_METHOD']);           
        var_dump($service) ;            
        var_dump($method) ;            
        var_dump($url);

        try {
            $response =  call_user_func_array(array( new  $service , $method), $url) ;
            
            http_response_code(200) ; 
            echo json_encode( array('sucesso' => true ,'mensagem' => '' , 'data' => $response));

        } catch (Exception $e) {
            http_response_code(404) ;
            echo json_encode( array('sucesso' => false ,'mensagem' => $e->getMessage() , 'data' => []));
        }

    }
}

?>