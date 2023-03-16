<?php
include 'ProdutosService.php';
include 'CorredoresService.php';
header("Content-Type: application/json; charset=UTF-8");

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
            echo json_encode( array('status' => 'sucess' , 'data' => $response));

        } catch (Exception $e) {
            http_response_code(404) ;
            echo json_encode( array('status' => 'error' , 'data' => $e->getMessage()));
        }

    }
}

?>