<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

# use Php\

#ROTAS

$r->get('/olamundo', function (){
    return "Olá mundo!";
} );

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá '.$params[1];
} );

#ROTAS

$r->get('/exer1/formulario', function(){
    include("exer1.html");
});

$r->post('/exer1/resposta', function(){
    
});


// as rotas devem estar antes do handler

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());


