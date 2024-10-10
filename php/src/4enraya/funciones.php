<?php
const CASILLAVACIA = 'buid';
const NUMFICHASGANAR = 4;

const NUM_FILAS = 6;
const NUM_COLUMNAS = 7;
function iniciarArray()
{
    $filas = NUM_FILAS;
    $columnas = NUM_COLUMNAS;
    $array = [];
    for ($i = 1; $i <= $filas; $i++) {
        $fila = [];
        for ($a = 1; $a <= $columnas; $a++) {
            $fila[$a] = CASILLAVACIA;
        }
        $array[$i] = $fila;
    }
    return $array;
}
function pintarJuego($pantalla)
{
    foreach ($pantalla as $screen => $filas) {
        echo "<tr>";
        foreach ($filas as $columna => $valor) {
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
function hacerMovimiento(&$pantalla, $columna, $jugador)
{

    for ($i = count($pantalla); $i >= 1; $i--) {
        //$fila=$pantalla[$i];
        //var_dump($fila);
        if ($pantalla[$i][$columna] === CASILLAVACIA) {
            //$fila[$columna]=$jugador;
            $pantalla[$i][$columna] = $jugador;
            return;
        }
    }
}
function comprobarGanador($pantalla, $jugador, $columna)
{
    if (comprobarHorizontal($pantalla, $jugador) || comprobarVertical($pantalla, $jugador) || comprobarInclinadaDerecha($pantalla, $jugador) || comprobarInclinadaIzquierda($pantalla, $jugador)) {
        return $jugador;
    }
    if (comprobarEmpate($pantalla)) {
        return "empate";
    }
    return null;
}
function comprobarEmpate($pantalla)
{
    foreach ($pantalla as $pantalla => $fila) {
        if (in_array(CASILLAVACIA, $fila)) {
            return false;
        } else {
            return true;
        }
    }
}
function comprobarInclinadaDerecha($pantalla, $jugador)
{
    $fichasSeguidas = 0;
    for ($i = count($pantalla); $i >= 1; $i--) {
        for ($a = 1; $a <= NUM_COLUMNAS; $a++) {

            if ($pantalla[$i][$a] == $jugador) {
                $fichasSeguidas++;
                for ($e = 1; $e <= NUMFICHASGANAR - 1; $e++) {
                    if ($pantalla[$i - $e][$a + $e] == $jugador) {
                        $fichasSeguidas++;
                        if ($fichasSeguidas == NUMFICHASGANAR) {
                            return true;
                        }
                    } else {
                        $fichasSeguidas = 0;
                        break;
                    }
                }
            } else {
                $fichasSeguidas = 0;
            }
        }
    }
    return false;
}
function comprobarInclinadaIzquierda($pantalla, $jugador)
{
    $fichasSeguidas = 0;
    for ($i = count($pantalla); $i >= 1; $i--) {
        for ($a = NUM_COLUMNAS; $a >= 1; $a--) {

            if ($pantalla[$i][$a] == $jugador) {
                $fichasSeguidas++;
                for ($e = 1; $e <= NUMFICHASGANAR - 1; $e++) {
                    if ($pantalla[$i - $e][$a - $e] == $jugador) {
                        $fichasSeguidas++;
                        if ($fichasSeguidas == NUMFICHASGANAR) {
                            return true;
                        }
                    } else {
                        $fichasSeguidas = 0;
                        break;
                    }
                }
            } else {
                $fichasSeguidas = 0;
            }
        }
    }
    return false;
}
function comprobarVertical($pantalla, $jugador)
{
    $fichasSeguidas = 0;
    for ($a = 1; $a <= NUM_COLUMNAS; $a++) {

        for ($i = count($pantalla); $i >= 1; $i--) {
            if ($pantalla[$i][$a] == $jugador) {
                $fichasSeguidas++;
            } else {
                $fichasSeguidas = 0;
            }
            if ($fichasSeguidas === NUMFICHASGANAR) {
                return true;
            }
        }
    }
    return false;
}
function comprobarHorizontal($pantalla, $jugador)
{
    foreach ($pantalla as $pantalla => $fila) {
        $fichasSeguidas = 0;
        for ($i = 1; $i <= count($fila); $i++) {
            if ($fila[$i] === $jugador) {
                $fichasSeguidas++;
            } else {
                $fichasSeguidas = 0;
            }
            if ($fichasSeguidas === NUMFICHASGANAR) {
                return true;
            }
        }
    }
    return false;
}
