<?php 

namespace App\Services;

class GeraNome
{
    function gerarNomeInexistente($email = null) {

        function gerarNomeInexistente($email = null) {
            
            $silabas = ["ka", "zu", "mi", "ro", "ta", "no", "shi", "lu", "da", "vi", "ne", "xo"];
            
            $nome = "";
            $quantidadeSilabas = rand(2, 4);
            for ($i = 0; $i < $quantidadeSilabas; $i++) {
                $nome .= $silabas[array_rand($silabas)];
            }
        
            $nome = ucfirst($nome);
        
            if ($email) {
                $username = explode("@", $email)[0]; 
                return $username;
            }
        
            return $nome;
        }
        
        $email = "exemplo@email.com";
        echo gerarNomeInexistente($email);
        echo "<br>";
        echo gerarNomeInexistente();
    }
}