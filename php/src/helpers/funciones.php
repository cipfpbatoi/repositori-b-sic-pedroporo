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
                    CURLOPT_CUSTOMREQUEST => "PATCH",
                    CURLOPT_HTTPHEADER => $headers
                ]);
                $data=curl_exec($ch);
                curl_close($ch);
                return $data;
            }
            ?>