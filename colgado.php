<?php
function clear(){
    if (PHP_OS == "WINNT") {
        system("cls");
    } else {
        system("clear");
    }
}

$possible_words = ["bebida", "piloto", "Baldosa", "terremoto", "asteroide", "platzi"];

define("MAX_ATTEMPS", 6);

echo "Juego del ahorcado \n";
//inicializamos el juego

$choosen_word = $possible_words[rand(0, 9)];
$choosen_word = strtolower($choosen_word);
$word_length = strlen($choosen_word);
$discover_letter = str_pad("", $word_length, "_");
$attempts = 0;
do {

    echo "Palabra de $word_length letras \n";

    echo $discover_letter . "\n";


    //pedimos al usuario que escriba
    $player_letter = readline("Escribe una letra: ");
    $player_letter = strtolower($player_letter);

    if (str_contains($choosen_word, $player_letter)) {
        //verificamos todas las ocurrencias de eta letra para reemplazarla
        $offset = 0;
        while (
            ($letter_position = strpos($choosen_word, $player_letter, $offset)) !== false
        ) {
            $discover_letter[$letter_position] = $player_letter;
            $offset = $letter_position + 1;
        }
    } else {
        clear();
        $attempts++;
        echo "letra incorrecta. te quedan " . (MAX_ATTEMPS - $attempts);
        sleep(2);
    }
    clear();
}   while($attempts < MAX_ATTEMPS && $discover_letter != $choosen_word);
clear();
if ($attempts < MAX_ATTEMPS) {
    echo "Felicidades!! has adivinado la palabra \n";
}else{
    echo "suerte la proxima ameo!!";
}

echo "la palabra es: $choosen_word \n";
echo "tu descubriste $discover_letter \n";