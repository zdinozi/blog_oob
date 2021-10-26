<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<div id="main-welcome">
    <h1>Witaj na blogu!</h1>
    <p style="text-align:center;">Zalogowano jako: <?php
        include 'config.php';
        echo $_SESSION['user'];
        ?></p>
</div>
<a href="wyloguj.php"><div id="wyl">
        <p style="color: white; text-align: center;">Wyloguj się</p>
    </div></a>
<a href="add.php" id="a1">
        <div id="block">
            <p id="block1" >Kliknij aby dodać wpis.</p>
        </div>
</a>
<h1>WPISY</h1>
<p id="old_nr" style="display:none"></p>
<p id="new_nr" style="display:none"></p>
<?php
class Wpisy
{
    public function wypisz(){
        global $conn;
        $q='SELECT * FROM wpisy';
        $result=$conn->query($q);
        echo '<div id="m-table"><table>';
        while($obj=$result->fetch_object())
        {
            echo '<tr><td>'.$obj->Nick.'</td><td>'.$obj->temat.'</td><td>'.$obj->text.'</td><td>'.$this->sprawdz($obj->Nick,$_SESSION['user'],$obj->id).'</td></tr>';
        }
        echo '</table></div>';
    }
    public function sprawdz($nick1,$nick2,$id)
    {
        $id1=$id;
        if($nick1==$nick2){
            return "<form action='usun.php' method='post'><input name='usun1' type='hidden' value=".$id1."><input type='submit' name='usun' value='Usuń'></form>";
        }
        else{
            return  '';
        }
    }
}
$w1=new Wpisy();
$w1->wypisz();



?>
<br/>
<footer>
    <a href="https://github.com/zdinozi" target="_blank"><img src="github-ww.png" style="width: 50px; height: 50px;"></a>&nbsp;&nbsp;
    <a href="https://www.linkedin.com/in/wiktor-banasiak-672425222/" target="_blank"><img src="linkedin.png" style="width: 50px; height: 50px;"></a>
</footer>
</body>
</html>