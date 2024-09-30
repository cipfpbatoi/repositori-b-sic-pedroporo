<?php
$accesosPagina = 0;
if (isset($_COOKIE['accesos'])) {
    $accesosPagina = $_COOKIE['accesos']; // recuperamos una cookie
    setcookie('accesos', ++$accesosPagina); // le asignamos un valor
}
