<?php
include_once("conexio.php");
include_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

use App\Models\Empleado;

$name = "Pedro";
$surname = "Sanchez Castejon";
$salary = 3000;

/*$sql1="INSERT INTO employee (name, surname, salary) VALUES (
    :name,
    :surname,
    :salary
  )";
$sentencia1 = $pdo->prepare($sql1);

$sentencia1->bindParam(':name',$name);
$sentencia1->bindParam(':surname',$surname);
$sentencia1->bindParam( ':salary',$salary);
$sentencia1->execute();*/

/*$sql1="SELECT id FROM employee WHERE name=:name AND surname=:surname";
$sentencia1 = $pdo->prepare($sql1);

$sentencia1->bindParam(':name',$name);
$sentencia1->bindParam(':surname',$surname);
$sentencia1->execute();
$result=$sentencia1->fetch(PDO::FETCH_OBJ);


$sql1="UPDATE employee SET salary = :salary WHERE id=:id";
$sentencia1 = $pdo->prepare($sql1);

$sentencia1->bindParam(':salary',$salary);
$sentencia1->bindParam(':id',$result->id);
$sentencia1->execute();*/


/*$sql1="SELECT id FROM employee WHERE name=:name AND surname=:surname";
$sentencia1 = $pdo->prepare($sql1);

$sentencia1->bindParam(':name',$name);
$sentencia1->bindParam(':surname',$surname);
$sentencia1->execute();
$result=$sentencia1->fetch(PDO::FETCH_OBJ);


$sql1="DELETE FROM employee WHERE id=:id";
$sentencia1 = $pdo->prepare($sql1);

$sentencia1->bindParam(':id',$result->id);
$sentencia1->execute();*/




$sql = "SELECT * FROM employee";
$sentencia = $pdo->prepare($sql);
$sentencia->setFetchMode(PDO::FETCH_CLASS, Empleado::class);
$sentencia->execute();
$employeees = $sentencia->fetchAll();
var_dump($employeees);


echo "<table>";
foreach ($employeees as $employee) {
    echo "<tr><td>$employee->name $employee->surname</td> <td>$employee->salary</td></tr>";
}
echo "</table>";
