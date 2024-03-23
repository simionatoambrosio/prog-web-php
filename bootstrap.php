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

## Ex5

$r->get('/exercicio5/formulario', function(){
    include("exercicio5.html");
});

$r->post('/exercicio5/resposta', function(){
    $valor = $_POST['valorFatorial'];

    $fatorial =1;
    $contador =1;
    
    while($contador<=$valor){
     $fatorial *= $contador;
     $contador++;
    } 
    echo "O fatorial do número {$valor} é igual a {$fatorial}";

});

## Ex6

$r->get('/exercicio6/formulario', function(){
    include("exercicio6.html");
});

$r->post('/exercicio6/resposta', function(){
    $valorA = $_POST['valorA'];
    $valorB = $_POST['valorB'];

    $vetor = array();
    array_push($vetor, $valorA);
    array_push($vetor, $valorB);


    if ($vetor[0] == $vetor[1]) {
        echo "Números iguais: {$vetor[0]}";
    }
    else if ($vetor[1] < $vetor[0]){
        echo "{$vetor[1]} {$vetor[0]}";
    }
    else {
        echo "{$vetor[0]} {$vetor[1]}";
    }

});

## Ex7

$r->get('/exercicio7/formulario', function(){
    include("exercicio7.html");
});

$r->post('/exercicio7/resposta', function(){
    $valorMetros = $_POST['valorMetros'];

    $valorCentimetros = $valorMetros * 100;

    return "{$valorMetros}m é igual a {$valorCentimetros}cm";
});

## Ex8

$r->get('/exercicio8/formulario', function(){
    include("exercicio8.html");
});

$r->post('/exercicio8/resposta', function(){
    $area = $_POST['area'];

    $litrosTinta = $area / 3;
    $nLatas = ceil($litrosTinta / 18);

    $custoLatas = $nLatas * 80;
    $formatarValorCustoLatas = number_format($custoLatas,0,",",".");
    return "Você vai precisar de {$nLatas} lata(s) e irá gastar {$formatarValorCustoLatas} reais";
});

## Ex9

$r->get('/exercicio9/formulario', function(){
    include("exercicio9.html");
});

$r->post('/exercicio9/resposta', function(){
    $anoNascimento = $_POST['anoNasc'];

    define('ANO_ATUAL', date('Y'));

    $idade = $anoAtual - $anoNascimento;


    return "";
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




