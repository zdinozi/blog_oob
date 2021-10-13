<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="style.css">
</head>
<body>
Witaj na blogu!<br/>

<a href="add.php">Kliknij aby dodać wpis.
</a>

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
            echo '<tr><td>'.$obj->temat.'</td><td>'.$obj->text.'</td></tr>';
        }
        echo '</table>';
    }

}
$w1=new Wpisy();
$w1->wypisz();

?>

</body>
</html>