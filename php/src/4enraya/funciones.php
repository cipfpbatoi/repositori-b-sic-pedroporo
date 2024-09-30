<?php
function iniciarArray()
{
    $filas = 6;
    $columnas = 7;
    $array = [];
    for ($i = 1; $i <= $filas; $i++) {
        $fila = [];
        for ($a = 1; $a <= $columnas; $a++) {
            $fila[$a] = "buid";
        }
        $array[$i] = $fila;
    }
    return $array;
}
function pintarJuego($pantalla)
{
    foreach ($pantalla as $screen => $filas) {
        echo "<tr>";
        foreach($filas as $columna => $valor ){
            echo "<td class='$valor'><input type='submit'style='opacity: 0;' class='botonOculto' name='columna' value='$columna'></td>";
        }
        echo "</tr>";
    }
    /*for ($i = 1; $i <= $filas; $i++) {
        echo "<tr>";
        for ($a = 1; $a <= $columnas; $a++) {
            echo "<td class='buid'><input type='submit'style='opacity: 0;' class='botonOculto' name='columna' value='$a'></td>";
        }
        echo "</tr>";
    }*/
}
function elegirJugador(&$jugador)
{
    if ($jugador == "player1") {
        $jugador = "player2";
    } else if ($jugador == "player2") {
        $jugador = "player1";
    } else {
        $jugador = "player1";
    }
}
function hacerMovimiento(&$pantalla,$columna,$jugador) {

    for ($i = count($pantalla); $i >= 1; $i--) {
        //$fila=$pantalla[$i];
        //var_dump($fila);
        if ($pantalla[$i][$columna]==='buid') {
            //$fila[$columna]=$jugador;
            $pantalla[$i][$columna]=$jugador;
            return;
        }
    }
}
function comprobarGanador($pantalla,$jugador){
    if (comprobarHorizontal($pantalla,$jugador)){
        return true;
    }
}
function comprobarHorizontal($pantalla,$jugador) {
    for ($i = count($pantalla); $i >= 1; $i--) {
        $fichasSeguidas=0;
        for ($a=1; $a <= count($pantalla[$i]); $a++) { 
            if ($pantalla[$i][$a]===$jugador) {
                $fichasSeguidas++;
            }
            if ($fichasSeguidas>=4) {
                return true;
            }
        }
        
    }
    return false;
}
