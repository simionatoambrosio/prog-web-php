<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';  #retorna o que está depois do / do endereço na URL Ex: www.fatecpp.gov.br/calendario

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', 'Php\Primeiroprojeto\Controllers\HomeController@olaMundo');

$r->get('/olapessoa', function(){
    return "Olá pessoa";
});

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá, '.$params[1];
});

$r->get('/exer1/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer1');

$r->post('/exer1/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    $soma = $valor1 + $valor2;

    return "A soma é: {$soma}";

});

// entendimento básico de funcionamento de rotas em aplicações
// nomear as rotas -> o caminho que o servidor vai identificar
// após identificar ele irá executar a função associada

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

    $idade = ANO_ATUAL - $anoNascimento;
    $nDiasVividos = $idade * 365; // assumindo que um ano tem 365 dias
    // assumindo que não levaremos em conta anos bissextos

    $idade2025 = 2025 - $anoNascimento;



    return "Você possui {$idade} anos, já viveu aproximadamente {$nDiasVividos} dias e terá {$idade2025} anos em 2025";
});

## Ex10

$r->get('/exercicio10/formulario', function(){
    include("exercicio10.html");
});

$r->post('/exercicio10/resposta', function(){
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    $imc = $peso / ($altura * $altura);

    if ($imc < 18.5) {
        $resposta = "Magreza";
    }
    else if ($imc >= 18.5 && $imc <= 24.9) {
        $resposta = "Normal";
    }
    else if ($imc >= 25 && $imc <= 29.9) {
        $resposta = "Sobrepeso";
    }
    else if ($imc >= 30 && $imc <= 39.9) {
        $resposta = "Obesidade";
    }
    else if ($imc >= 40) {
        $resposta = "Obsidade grave";
    }

    echo "Com base no IMC você está classificado como <strong>{$resposta}</strong>";

    echo "<p>Para saber mais sobre o Índice de Massa Corporal (IMC), <a href='https://www.programasaudefacil.com.br/calculadora-de-imc' target='_blank'>acesse o site</a>.</p>";
});

# Projeto CRUD

# Categoria
# Consultando todas as categorias cadastradas
$r->get('/categoria', 'Php\Primeiroprojeto\Controllers\CategoriaController@index');
$r->get('/categoria/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\CategoriaController@index');

# Chamando o formulário para inserir o registro
$r->get('/categoria/inserir', 'Php\Primeiroprojeto\Controllers\CategoriaController@inserir');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/categoria/novo', 'Php\Primeiroprojeto\Controllers\CategoriaController@novo');

# Enviando os dados para serem armazenados no banco de dados
$r->get('/categoria/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\CategoriaController@alterar');

# Enviando os dados para serem armazenados no banco de dados
$r->get('/categoria/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\CategoriaController@excluir');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/categoria/editar', 'Php\Primeiroprojeto\Controllers\CategoriaController@editar');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/categoria/deletar', 'Php\Primeiroprojeto\Controllers\CategoriaController@deletar');


# Produto
$r->get('/produto', 'Php\Primeiroprojeto\Controllers\ProdutoController@index');
$r->get('/produto/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\ProdutoController@index');

# Chamando o formulário para inserir o registro
$r->get('/produto/inserir', 'Php\Primeiroprojeto\Controllers\ProdutoController@inserir');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/produto/novo', 'Php\Primeiroprojeto\Controllers\ProdutoController@novo');

# Enviando os dados para serem armazenados no banco de dados
$r->get('/produto/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\ProdutoController@alterar');

# Enviando os dados para serem armazenados no banco de dados
$r->get('/produto/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\ProdutoController@excluir');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/produto/editar', 'Php\Primeiroprojeto\Controllers\ProdutoController@editar');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/produto/deletar', 'Php\Primeiroprojeto\Controllers\ProdutoController@deletar');


# Cliente

# Consultando todas os clientes cadastradas
$r->get('/cliente', 'Php\Primeiroprojeto\Controllers\ClienteController@index');
$r->get('/cliente/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\ClienteController@index');

# Chamando o formulário para inserir o registro
$r->get('/cliente/inserir', 'Php\Primeiroprojeto\Controllers\ClienteController@inserir');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/cliente/novo', 'Php\Primeiroprojeto\Controllers\ClienteController@novo');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/cliente/novo', 'Php\Primeiroprojeto\Controllers\ClienteController@novo');

# Enviando os dados para serem armazenados no banco de dados
$r->get('/cliente/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\ClienteController@alterar');

# Enviando os dados para serem armazenados no banco de dados
$r->get('/cliente/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\ClienteController@excluir');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/cliente/editar', 'Php\Primeiroprojeto\Controllers\ClienteController@editar');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/cliente/deletar', 'Php\Primeiroprojeto\Controllers\ClienteController@deletar');


# Fornecedor
$r->get('/fornecedor', 'Php\Primeiroprojeto\Controllers\FornecedorController@index');
$r->get('/fornecedor/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\FornecedorController@index');

# Chamando o formulário para inserir o registro
$r->get('/fornecedor/inserir', 'Php\Primeiroprojeto\Controllers\FornecedorController@inserir');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/fornecedor/novo', 'Php\Primeiroprojeto\Controllers\FornecedorController@novo');

# Enviando os dados para serem armazenados no banco de dados
$r->get('/fornecedor/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\FornecedorController@alterar');

# Enviando os dados para serem armazenados no banco de dados
$r->get('/fornecedor/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\FornecedorController@excluir');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/fornecedor/editar', 'Php\Primeiroprojeto\Controllers\FornecedorController@editar');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/fornecedor/deletar', 'Php\Primeiroprojeto\Controllers\FornecedorController@deletar');


# Despesa
$r->get('/despesa', 'Php\Primeiroprojeto\Controllers\DespesaController@index');
$r->get('/despesa/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\DespesaController@index');

# Chamando o formulário para inserir o registro
$r->get('/despesa/inserir', 'Php\Primeiroprojeto\Controllers\DespesaController@inserir');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/despesa/novo', 'Php\Primeiroprojeto\Controllers\DespesaController@novo');

# Enviando os dados para serem armazenados no banco de dados
$r->get('/despesa/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\DespesaController@alterar');

# Enviando os dados para serem armazenados no banco de dados
$r->get('/despesa/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\DespesaController@excluir');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/despesa/editar', 'Php\Primeiroprojeto\Controllers\DespesaController@editar');

# Enviando os dados para serem armazenados no banco de dados
$r->post('/despesa/deletar', 'Php\Primeiroprojeto\Controllers\DespesaController@deletar');





#ROTAS

$resultado = $r->handler();

#se der erro de rota, a aplicação é finalizada
if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada";
    die();
}

if($resultado instanceof Closure) { // dentro dessa variável há uma função?
    #se existir a rota, executa essa função e passa os parâmetros respectivos
    echo $resultado($r->getParams());
}
elseif(is_string($resultado)){
    $resultado = explode("@", $resultado); // separa a variavel do nome do método
    $controller = new $resultado[0]; // instanciando o controller
    $resultado = $resultado[1]; 
    // acessando o método
    echo $controller->$resultado($r->getParams());
}




