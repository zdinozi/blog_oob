<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<h1>DODAJ WPIS</h1>
<form action="" method="post">
    <table>
    <center><tr><td>Temat:</td><td><input type="text" name="temat" id="i1" maxlength="255"></td></tr><br/><br/><br/>
        <tr><td>Wiadomosc: </td><td><textarea name="wpis" id="i2" maxlength="255"></textarea></td></tr><br/><br/>
        <tr><td><input type="submit" value="Dodaj"></td></tr></table></center>
</form>

<?php
    class Wpis
    {
        public $wpis;
        public $temat;

        public function __construct($wpis,$temat)
        {
            $this->wpis=$wpis;
            $this->temat=$temat;
        }
        public function dodaj($add)
        {
            $conn=new mysqli('localhost','root','','Blog_obiektowo') or die ('Nie udało się połączyć z bazą danych.');
            $conn->set_charset("utf8");
            $q = "INSERT INTO wpisy VALUES (NULL,'$add->temat','$add->wpis')";
            $result = $conn->query($q) or die ("Błąd");
        }

    }
    $dodaj=new Wpis($_POST['wpis'],$_POST['temat']);
    $dodaj->dodaj($dodaj);
?>

</body>
</html>