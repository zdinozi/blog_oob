<?php
include 'config.php';
$id=$_POST['usun1'];
global $conn;
$sql = "DELETE FROM `wpisy` WHERE id=".$id.";";
$query=$conn->query($sql) or die ('Błąd');
echo 'usunieto';
header('Location: logowanie.php');



?>