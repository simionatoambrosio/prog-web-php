<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';  #retorna o que está depois do / do endereço na URL Ex: www.fatecpp.gov.br/calendario

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', function (){
    return "Olá mundo!";
});

$r->get('/olapessoa', function(){
    return "Olá pessoa";
});

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá, '.$params[1];
});

$r->get('/exer1/formulario', function(){
    include("exer1.html");
});

$r->post('/exer1/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    $soma = $valor1 + $valor2;

    return "A soma é: {$soma}";

});

# Exercícios
# Ex1

$r->get('/exercicio1/formulario', function(){
    include("exercicio1.html");
});

$r->post('/exercicio1/resposta', function(){
    $valor = $_POST['valor'];

    if($valor > 0) {
        $resultado = "Valor positivo";
    }
    else if ($valor < 0) {
        $resultado = "Valor negativo";
    }
    else {
        $resultado = "Igual a zero";
    }

    return "O valor informado é: {$resultado}";

});

# Ex2

$r->get('/exercicio2/formulario', function(){
    include("exercicio2.html");
});

$r->post('/exercicio2/resposta', function(){
    $vetor = array();

    
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $valor3 = $_POST['valor3'];
    $valor4 = $_POST['valor4'];
    $valor5 = $_POST['valor5'];
    $valor6 = $_POST['valor6'];
    $valor7 = $_POST['valor7'];
    
    array_push($vetor, $valor1);
    array_push($vetor, $valor2);
    array_push($vetor, $valor3);
    array_push($vetor, $valor4);
    array_push($vetor, $valor5);
    array_push($vetor, $valor6);
    array_push($vetor, $valor7);
    
    $menorValor = $vetor[0];
    $posicao = 0;
    for ($i=0; $i < count($vetor); $i++) { 
        if($vetor[$i] < $menorValor) {
            $menorValor = $vetor[$i];
            $posicao = $i;
        }
    }

    return "O menor valor é {$menorValor} e sua posição é {$posicao}";
});

## Ex3

$r->get('/exercicio3/formulario', function(){
    include("exercicio3.html");
});

$r->post('/exercicio3/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    if($valor1 == $valor2) {
        $soma = $valor1 + $valor2;
        $somax3 = $soma * 3;
        return "O valor do triplo da soma dos números é igual a: {$somax3}";
    }

    $soma = $valor1 + $valor2;

    return "A soma dos dois números é: {$soma}";

});

## Ex4

$r->get('/exercicio4/formulario', function(){
    include("exercicio4.html");
});

$r->post('/exercicio4/resposta', function(){
    $valorTabuada = $_POST['valorTabuada'];

    for ($i=0; $i <= 10; $i++) {
        $resultado = $i * $valorTabuada;
        echo "{$valorTabuada}x{$i} = {$resultado} <br>";
    }

});

#ROTAS

$resultado = $r->handler();

#se der erro de rota, a aplicação é finalizada
if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada";
    die();
}

#se existir a rota, executa essa função e passa os parâmetros respectivos
echo $resultado($r->getParams());




