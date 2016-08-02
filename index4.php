<?php


if ($arquivo = fopen("jogos.txt", "w")) {
	for($i = 0; $i < 1; $i++) {
            fputs($arquivo, $texto."\n".$texto2."\n");
	}
        fclose($arquivo);
} else {
	echo "Gravação falhou";
}




if ($arquivo = fopen("jogos.txt", "r")) {
	while(!feof($arquivo)) {
            $linha = fgets($arquivo, 40);
            echo $linha."<br/>"; 
	}
	fclose($arquivo);
} else {
	echo "Leitura falhou";
}




echo "<hr>";
$sorteado = array(1,3,5,7,8,10,11,12,15,18,19,20,21,23,25);
foreach ($jogo as $key => $value) {
    echo $key . " - " . $value."<br>";
    
    $result = array_diff($jogo[$key]. $jogo[$value], $sorteado);
    echo $total = count($sorteado) - count($result);
}





if ($arquivo = fopen("jogos.txt", "r")) {
	while(!feof($arquivo)) {
            $jogo[] = fgets($arquivo, 41);
	}
	$quantidade_elementos = count($jogo);
	echo "Tem ".$quantidade_elementos." elementos";        
} else {
	echo "Gravação falhou";
}


if ($arquivo = fopen("jogos.txt", "r")) {
	while(!feof($arquivo)) {
            $linha[] = fgets($arquivo, 42);
	}
	fclose($arquivo);
} else {
	echo "Leitura falhou";
}


echo "<pre>";
print_r($linha);
echo "<pre/>";