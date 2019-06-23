<?php

	$host = 'rds.cpg0f6sgjhry.ap-south-1.rds.amazonaws.com';
    $user = 'root';
    $pass = 'sanraj2398';
    $db_name = 'root';

$mysqli = new mysqli($host, $user, $pass, $db_name);
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT id, name FROM test WHERE id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $name);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>CustomerID</th>";
echo "<td>" . $id . "</td>";
echo "<th>CompanyName</th>";
echo "<td>" . $name . "</td>";
echo "</tr>";
echo "</table>";
?>