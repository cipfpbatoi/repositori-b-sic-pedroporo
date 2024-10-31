<?php
include_once("conexio.php");
$sql = "SELECT * FROM employee";
$sentencia = $pdo->prepare($sql);
$sentencia -> setFetchMode(PDO::FETCH_OBJ);
$sentencia->execute();
$employeees = $sentencia->fetchAll();
var_dump($employeees);

echo"<table>";
foreach ($employeees as $employee) {
    echo "<tr><td>$employee->name $employee->surname</td> <td>$employee->salary</td></tr>";
}
echo"</table>";