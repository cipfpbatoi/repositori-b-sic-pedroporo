<?php
            function getWord() : String {
                $ch= curl_init();
                $headers=[
                    "Content-type: application/jston; charset=UTF-8"
                ];
                curl_setopt_array($ch,[
                    CURLOPT_URL => "https://clientes.api.greenborn.com.ar/public-random-word",
                    CURLOPT_RETURNTRANSFER => true,
                //    CURLOPT_CUSTOMREQUEST => "PATCH",
                    CURLOPT_HTTPHEADER => $headers
                ]);
                $data=curl_exec($ch);
                curl_close($ch);
                return str_replace(["[","]",'"'],"",$data);
            }
            function createArraySecreta(string &$secreta,$letrasAdivinadas){
                $letrasSecreta=str_split($secreta);
                for ($i=0; $i < count($letrasSecreta); $i++) { 
                    if (in_array($letrasSecreta[$i],$letrasAdivinadas)) {
                        echo "<a class='correct'>$letrasSecreta[$i] </a>";
                    }else{
                        echo "<a>_ </a>";
                    }
                }
            }
            function comprobarLetra(string $letra,string $secreta,&$letrasAdivinadas,&$incorrectas) {
                if (!in_array($letra,$letrasAdivinadas)&&!in_array($letra,$incorrectas)) {
                    if (in_array($letra,str_split($secreta))) {
                        $letrasAdivinadas[]=$letra;
                    }else{
                        $incorrectas[]=$letra;
                    }
                    
                }
            }
            ?>