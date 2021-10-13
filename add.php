<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<h1>DODAJ WPIS</h1>
<form action="" method="post">
    <table>
    <center><tr><td>Nick:</td><td><input type="text" name="nick" id="i1" maxlength="255"></td></tr>
        <tr><td>Temat:</td><td><input type="text" name="temat" id="i1" maxlength="255"></td></tr>
        <tr><td>Wiadomosc: </td><td><textarea name="wpis" id="i2" maxlength="255"></textarea></td></tr>
        </table></center><br/>
    <center><input type="submit" value="Dodaj"></center>
</form>

<?php
    class Wpis
    {
        public $wpis;
        public $temat;
        public $nick;

        public function __construct($wpis,$temat,$nick)
        {
            $this->wpis=$wpis;
            $this->temat=$temat;
            $this->nick=$nick;
            if ($this->nick=='')
            {
                $this->nick='Anonim';
            }
            if ($this->temat=='')
            {
                $this->temat='(Brak tematu.)';

            }
        }
        public function dodaj($add)
        {
            $conn=new mysqli('localhost','root','','Blog_obiektowo') or die ('Nie udało się połączyć z bazą danych.');
            $conn->set_charset("utf8");
            $q = "INSERT INTO wpisy VALUES (NULL,'$add->nick','$add->temat','$add->wpis')";
            $result = $conn->query($q) or die ("Błąd");
        }
        public function czy_puste()
        {

        }

    }
            if(!empty($_POST['wpis']))
            {
                $dodaj = new Wpis($_POST['wpis'], $_POST['temat'], $_POST['nick']);
                $dodaj->dodaj($dodaj);
                header('Location: main.php');
                exit();
            }
            else{
                echo '<p style="text-align: center;">Porszę podać dane.</p>';
            }


?>
<p id="powrot" style="text-align: center;"><a href="main.php">Powrót do strony głównej.</a></p>
</body>
</html>