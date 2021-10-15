<?php
include 'config.php';
class Zalogowano
{
    public function __construct(){
        if($_SESSION['start']!=1) header('Location: main.php');
    }
}
$s1=new Zalogowano();

?>