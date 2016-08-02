<?php

if ($arquivo = fopen("sorteio.txt", "r")) {
	while(!feof($arquivo)) {
            $sorteado[] = (int) fgets($arquivo);
	}
	fclose($arquivo);
} else {
	echo "Leitura falhou";
}

$jogo1 = array(1,3,5,7,8,10,11,12,14,17,19,20,21,23,24);
$jogo2 = array(1,2,4,7,9,10,12,14,15,17,19,20,21,22,23);
$jogo3 = array(2,3,6,7,8,11,12,14,15,16,17,19,20,22,24);
$jogo4 = array(1,4,5,7,8,10,12,13,15,16,19,20,21,23,24);
$jogo5 = array(1,2,4,6,8,9,12,13,14,17,18,19,20,22,24);
$jogo6 = array(1,3,4,5,6,9,10,12,14,15,16,18,20,21,22);
$jogo7 = array(1,3,5,7,9,11,13,15,16,18,19,21,22,23,25);
$jogo8 = array(1,2,4,7,8,10,12,13,15,16,18,19,20,22,23);
$jogo9 = array(1,3,4,6,8,10,12,14,15,16,18,19,22,23,24);
$jogo10 = array(1,3,4,7,8,10,12,14,15,16,18,20,21,23,24);
$jogo11 = array(1,2,3,7,8,9,12,13,14,17,18,21,22,23,25);
$jogo12 = array(2,3,5,6,8,10,12,13,14,17,18,20,22,23,24);
$jogo13 = array(1,3,4,5,8,10,12,14,15,17,20,21,22,24,25);
$jogo14 = array(1,3,4,5,6,7,8,11,14,16,18,19,22,23,24);
$jogo15 = array(1,4,5,6,8,9,11,13,14,15,16,17,19,22,23);
$jogo16 = array(1,2,3,5,6,7,8,11,13,17,19,20,23,24,25);
$jogo17 = array(1,3,4,5,6,8,10,13,15,16,19,20,22,23,24);
$jogo18 = array(1,2,4,5,6,8,11,12,15,17,18,19,20,22,25);
$jogo19 = array(2,3,5,6,8,13,14,15,16,17,19,20,22,23,25);
$jogo20 = array(2,4,5,6,8,9,11,13,15,18,19,20,22,23,24);
$jogo21 = array(3,4,6,7,9,10,11,12,13,14,17,18,19,23,25);
$jogo22 = array(2,4,5,6,7,8,13,14,15,17,18,20,21,23,25);
$jogo23 = array(1,3,4,6,8,10,12,13,16,18,19,20,21,23,24);
$jogo24 = array(1,2,3,6,8,11,12,14,17,18,20,22,23,24,25);
$jogo25 = array(2,3,4,8,9,11,12,14,16,18,19,21,22,23,25);
$jogo26 = array(1,3,4,5,7,9,10,12,13,18,19,20,22,23,24);
$jogo27 = array(1,2,4,7,8,11,12,14,16,18,19,22,23,24,25);
$jogo28 = array(1,3,4,5,7,8,10,12,13,14,17,18,20,22,23);
$jogo29 = array(1,3,4,6,9,10,12,14,15,16,17,18,20,21,23);
$jogo30 = array(1,4,7,8,9,11,12,13,15,16,18,20,21,24,25);

function verificaJogo($numJogo, $jogo, $sorteado) {
    $result = array_diff($jogo, $sorteado);
    $total = count($sorteado) - count($result);
    if ($total == 11) {
        return "Total de acertos no jogo $numJogo: " . "<b><span style='background-color: gray; color: white'>".$total."</span></b><br>";
    } else if ($total == 12) {
        return "Total de acertos no jogo $numJogo: " . "<b><span style='background-color: orange; color: white'>".$total."</span></b><br>";
    } else if ($total == 13) {
        return "Total de acertos no jogo $numJogo: " . "<b><span style='background-color: green; color: white'>".$total."</span></b><br>";
    } else if ($total == 14) {
        return "Total de acertos no jogo $numJogo: " . "<b><span style='background-color: blue; color: white'>".$total."</span></b><br>";
    } else if ($total == 15) {
        return "Total de acertos no jogo $numJogo: " . "<b><span style='background-color: red; color: white'>".$total."</span></b><br>";
    } else {
        return "Total de acertos no jogo $numJogo: " . $total."<br>";
    }

}

echo verificaJogo(1, $jogo1, $sorteado);
echo verificaJogo(2, $jogo2, $sorteado);
echo verificaJogo(3, $jogo3, $sorteado);
echo verificaJogo(4, $jogo4, $sorteado);
echo verificaJogo(5, $jogo5, $sorteado);
echo verificaJogo(6, $jogo6, $sorteado);
echo verificaJogo(7, $jogo7, $sorteado);
echo verificaJogo(8, $jogo8, $sorteado);
echo verificaJogo(9, $jogo9, $sorteado);
echo verificaJogo(10, $jogo10, $sorteado);
echo verificaJogo(11, $jogo11, $sorteado);
echo verificaJogo(12, $jogo12, $sorteado);
echo verificaJogo(13, $jogo13, $sorteado);
echo verificaJogo(14, $jogo14, $sorteado);
echo verificaJogo(15, $jogo15, $sorteado);
echo verificaJogo(16, $jogo16, $sorteado);
echo verificaJogo(17, $jogo17, $sorteado);
echo verificaJogo(18, $jogo18, $sorteado);
echo verificaJogo(19, $jogo19, $sorteado);
echo verificaJogo(20, $jogo20, $sorteado);
echo verificaJogo(21, $jogo21, $sorteado);
echo verificaJogo(22, $jogo22, $sorteado);
echo verificaJogo(23, $jogo23, $sorteado);
echo verificaJogo(24, $jogo24, $sorteado);
echo verificaJogo(25, $jogo25, $sorteado);
echo verificaJogo(26, $jogo26, $sorteado);
echo verificaJogo(27, $jogo27, $sorteado);
echo verificaJogo(28, $jogo28, $sorteado);
echo verificaJogo(29, $jogo29, $sorteado);
echo verificaJogo(30, $jogo30, $sorteado);
