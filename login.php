
<html lang="pl">
<head>
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="l-table">
    <h1>LOGOWANIE</h1>
</div>
<div id="l-table-form">
    <form action="" method="post">
        <table>
            <tr><td>Login: </td>
                <td><input type="text" name="login" value=""></td></tr>
            <tr><td>Hasło: </td>
                <td><input type="password" name="password" value=""></td></tr>
            <tr><td></td><td><input type="submit" value="Zaloguj" class="submit1"></td></tr>
        </table>
    </form>
    <a href="rejestracja.php">Nie posiadasz konta? <span id="lll"><u>Zarejestruj się.</u></span></a>
</div>
<?php include("config.php");

class Logowanie
{
    public $login;
    public $password;
    public $passwordv;

    public function __construct($login,$password)
    {
            $this->login=$login;
            $this->password=$password;
    }
    public function autoryzacja()
    {
        global $conn;

        $q='SELECT haslo FROM uzytkownicy WHERE nick="'.$this->login.'"';
        $rezultat=$conn->query($q);
        while($obj = $rezultat->fetch_object())
        {
            $this->passwordv=$obj->haslo;
        }

        if(md5($this->password)==$this->passwordv)
        {
            $_SESSION['user']=$this->login;
            $_SESSION['start']=1;
            header('Location: logowanie.php');
        }
        else{
            echo 'nie udalo sie zalogowac';

        }
    }

}
if(!empty($_POST['login']) && !empty($_POST['password'])) {
    $l1 = new Logowanie($_POST['login'], $_POST['password']);
    $l1->autoryzacja();
}
else
{
    echo '';
}
?>

<footer>
    <a href="https://github.com/zdinozi" target="_blank"><img src="github-ww.png" style="width: 50px; height: 50px;"></a>&nbsp;&nbsp;
    <a href="https://www.linkedin.com/in/wiktor-banasiak-672425222/" target="_blank"><img src="linkedin.png" style="width: 50px; height: 50px;"></a>


</footer>
</body>

</html>