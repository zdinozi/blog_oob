<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<h1>Witaj na blogu!</h1>
<div id="log"><center>
        <a href="login.php" id="logowanie_a">
            <p id="logowanie">Zaloguj się</p>
        </a>
    </center></div>
<div id="rej"><center>
        <a href="rejestracja.php" id="rejestracja_a">
            <p id="rejestracja">Zarejestruj się</p>
        </a>
    </center></div>
<h1>WPISY</h1>
<p style="text-align:center;">Aby dodawać wpisy musisz się zalogować.</p>
<p id="old_nr" style="display:none"></p>
<p id="new_nr" style="display:none"></p>
<?php
include 'config.php';

class Wpisy
{
    public function wypisz(){
        $conn = new mysqli('localhost', 'root', '', 'Blog_obiektowo') or die ('Błędne zapytanie');
        $conn->set_charset('utf8');
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

</body>
</html>