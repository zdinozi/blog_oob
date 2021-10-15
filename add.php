<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<div id="obramowka">
<h1>DODAJ WPIS</h1>
<form action="" method="post">
    <table>
        <tr><td>Temat:</td><td><input type="text" name="temat" id="i1" maxlength="255"></td></tr>
        <tr><td>Wiadomosc: </td><td><textarea name="wpis" id="i2" maxlength="255"></textarea></td></tr>
        <tr><td></td><td><input type="submit" value="Dodaj"></td></tr>
    </table>
</form>
<p id="powrot" style="text-align: center;"><a href="logowanie.php">Powrót do strony głównej.</a></p>
</div>
</body>
<?php
    include 'test.php';
    class Wpis
    {
        public $wpis;
        public $temat;
        public $nick;

        public function __construct($a,$b,$c)
        {
            $this->wpis=$a;
            $this->temat=$b;
            $this->nick=$c;

            if ($this->nick=='')
            {
                $this->nick='Anonim';
            }
            if ($this->temat=='')
            {
                $this->temat='(Brak tematu.)';

            }
        }
        public function dodaj()
        {
            $conn=new mysqli('localhost','root','','Blog_obiektowo') or die ('Nie udało się połączyć z bazą danych.');
            $conn->set_charset("utf8");
            $q = "INSERT INTO wpisy VALUES (NULL,'$this->nick','$this->temat','$this->wpis')";
            $result = $conn->query($q) or die ("Błąd");
        }
        public function czy_puste()
        {
            if(empty($_POST['wpis'])) return 0;
            else return 1;
        }
    }

        $dodaj = new Wpis($_POST['wpis'], $_POST['temat'], $_SESSION['user']);

        if($dodaj->czy_puste()==1) {

            $dodaj->dodaj();
            if ($_SESSION['start']==1) header('Location: logowanie.php');
            else header('Location: main.php');
        }
        else exit();


?>
</html>