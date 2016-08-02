<?php

// Charset
header("Content-Type: text/html; charset=utf-8");

// Função openFile()
function openFile( $arquivo = null )
{
    if( !$arquivo )
    {
        throw new Exception("O nome do arquivo não foi especificado.");
    }

    if( !file_exists($arquivo) )
    {
        throw new Exception("Arquivo não encontrado.");
    }

    if( !$data = file_get_contents($arquivo) )
    {
        throw new Exception("Não foi possível ler o arquivo.");
    }

    // Retorna o conteúdo do arquivo
    return $data;
}

// Tenta abrir o arquivo
try
{
    $arquivo = openFile("data.log");
    echo $arquivo;
}
catch( Exception $exc )
{
    // Em caso de erro, imprime suas descrições.
    echo $exc->getFile() . " - " . $exc->getLine() . " # " . $exc->getMessage();
}







/* 
require 'banco.php';

$banco = new Banco("localhost", "blog", "root", "camelo69");

$banco->insert("posts", array("titulo" => "Post 2", "corpo" => "ASdddjkljkljçkllklkjkljlkjlk"));
if($banco->lastInsert() > 0) {
    echo "Inserido com Sucesso!";
}

echo "<hr>";

$banco->query("Select * From posts");

echo "Quantidade de Posts: " . $banco->numRows();

echo "<hr>";

if($banco->numRows() > 0) {
    foreach ($banco->result() as $post) {
        echo "Título: ".$post['titulo']."<br>";
        echo "Corpo: ".$post['corpo']."<br>";
        echo "<hr>";
    }
} else {
    echo "Não houve resultados";
}

$banco->update("posts", 
        array("titulo" => "Post Teste 48"),
        array("idposts" => 3)); 



class Calculadora {

    private $num;

    public function __construct($numInicial)
    {
        $this->num = $numInicial;
    }

    public function somar($n1)
    {
        $this->num += $n1;
        return $this;
    }

    public function subtrair($n1)
    {
        $this->num -= $n1;
        return $this;
    }

    public function multiplicar($n1)
    {
        $this->num *= $n1;
        return $this;
    }

    public function dividir($n1)
    {
        $this->num /= $n1;
        return $this;
    }

    public function resultado()
    {
        return $this->num;
    }

}


$calc = new Calculadora(10);
$calc->somar(2)->subtrair(3)->multiplicar(5)->dividir(2);
$resultado = $calc->resultado();

echo $resultado;

 


echo "<hr>";

$banco->delete("posts", array("idposts" => 16));
$banco->query("Select * From posts");
if($banco->numRows() > 0) {
    foreach ($banco->result() as $post) {
        echo "Id: ".$post['idposts']."<br>";
        echo "Título: ".$post['titulo']."<br>";
        echo "Corpo: ".$post['corpo']."<br>";
        echo "<hr>";
    }
} else {
    echo "Não houve resultados";
}

 */