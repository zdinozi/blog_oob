<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<h1>Witaj na blogu!</h1>
<a href="add.php" id="a1"><div id="block"><p id="block1">Kliknij aby dodać wpis.</p></div></a>
<h1>WPISY</h1>
<p id="old_nr" style="display:none"></p>
<p id="new_nr" style="display:none"></p>
<?php
class Wpisy
{
    public function wypisz(){
        $conn = new mysqli('localhost', 'root', '', 'Blog_obiektowo') or die ('Błędne zapytanie');
        $conn->set_charset('utf8');
        $q='SELECT * FROM wpisy';
        $result=$conn->query($q);
        echo '<table>';
        while($obj=$result->fetch_object())
        {
            echo '<tr><td>'.$obj->Nick.'</td><td>'.$obj->temat.'</td><td>'.$obj->text.'</td></tr>';
        }
        echo '</table>';
    }

}
$w1=new Wpisy();
$w1->wypisz();

?>

</body>
</html>