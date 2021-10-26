<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<div id="add_wpis">
<h1>DODAJ WPIS</h1>
</div>
<div id="add_form">
<form action="" method="post">
    <table>
        <tr><td>Temat:</td><td><input type="text" name="temat" id="i1" maxlength="255"></td></tr>
        <tr><td>Wiadomosc: </td><td><textarea name="wpis" id="i2" maxlength="255"></textarea></td></tr>
        <tr><td></td><td><input type="submit" value="Dodaj" class="submit2"></td></tr>
    </table>
</form>
<b><u><p id="powrot" style="text-align: center; color: #24292f;"><a href="logowanie.php">Powrót do strony głównej.</a></p></u></b>
</div>
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
            global $conn;
            $q = "INSERT INTO wpisy VALUES (NULL,'$this->nick','$this->temat','$this->wpis')";
            $result = $conn->query($q) or die ("Błąd");
        }
        public function czy_puste()
        {
            if(empty($_POST['wpis'])) return 0;
            else return 1;
        }
    }

    if(!empty($_POST['wpis']) && !empty($_POST['temat'])) {
        $dodaj = new Wpis($_POST['wpis'], $_POST['temat'], $_SESSION['user']);

        if ($dodaj->czy_puste() == 1) {

            $dodaj->dodaj();
            if ($_SESSION['start'] == 1) header('Location: logowanie.php');
            else header('Location: main.php');
        } else exit();
    }
    else{
        echo '<b><p style="text-align: center;">Proszę uzupełnić dane.</p></b>';
    }

?>

<br/>
<footer>
    <a href="https://github.com/zdinozi" target="_blank"><img src="github-ww.png" style="width: 50px; height: 50px;"></a>&nbsp;&nbsp;
    <a href="https://www.linkedin.com/in/wiktor-banasiak-672425222/" target="_blank"><img src="linkedin.png" style="width: 50px; height: 50px;"></a>
</footer>
</body>
</html>