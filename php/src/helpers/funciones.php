<?php
            function suma(int $a, int $b): int {
                return $a + $b;
            }
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
            function createArraySecreta(string &$secreta,&$letrasAdivinadas){
                $letrasSecreta=str_split($secreta);
                $array=[];
                for ($i=0; $i < count($letrasSecreta); $i++) { 
                    if (in_array($letrasSecreta[$i],$letrasAdivinadas)) {
                        $array[$i]="$letrasSecreta[$i]";
                    }else{
                        $array[$i]="_";
                    }
                }
                return $array;
            }
            function comprobarLetra(string $letra,string &$secreta,&$letrasAdivinadas) {
                if (!in_array($letra,$letrasAdivinadas)) {
                    if (in_array($letra,str_split($secreta))) {
                        $letrasAdivinadas[count($letrasAdivinadas)+1]=$letra;
                    }
                    
                }
            }
            ?>