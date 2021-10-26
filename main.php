<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<div id="main-welcome">
    <h1>Witaj na blogu!</h1>
</div>
<div id="main-buttons">
    <div id="log">
        <p id="logowanie"><a href="login.php" id="logowanie_a">Zaloguj się</a></p>
    </div>
    <div id="rej">
        <p id="rejestracja"><a href="rejestracja.php" id="rejestracja_a">Zarejestruj się</a></p>
    </div>
</div>
<h1>WPISY</h1>
<p style="text-align:center;">Aby dodawać wpisy musisz się zalogować.</p>
<p id="old_nr" style="display:none"></p>
<p id="new_nr" style="display:none"></p>
<?php
include 'config.php';

class Wpisy
{
    public function wypisz(){
        global $conn;
        $q='SELECT * FROM wpisy';
        $result=$conn->query($q);
        echo '<div id="m-table"><table>';
        while($obj=$result->fetch_object())
        {
            echo '<tr><td>'.$obj->Nick.'</td><td>'.$obj->temat.'</td><td>'.$obj->text.'</td></tr>';
            }
        echo '</table></div>';
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