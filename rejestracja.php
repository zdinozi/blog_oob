<html>
<head>
   <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="r-form">
    <h1 style="text-align: center;">REJESTRACJA</h1>
</div>
<div id="r-form-table">
<form action="" method="post">
    <table>
        <tr><td>Login: </td><td><input type="text" name="login"></td></tr>
        <tr><td>Hasło: </td><td><input type="password" name="pass"></td></tr>
        <tr><td>Powtórz hasło: </td><td><input type="password" name="passw"></td></tr>
        <tr><td>Email: </td><td><input type="email" name="email"></td></tr>
        <tr><td>Potwórz Email: </td><td><input type="email" name="emailv"></td></tr>
        <tr><td></td><td><input type="submit" class="submit1"></td></tr>
    </table>
</form>
    <a href="login.php">Posiadasz już konto? <span id="lll"><u>Zaloguj się</u></span></a>
</div>
<?php
include 'config.php';
class Register
{
    public $login;
    public $pass;
    public $email;
    public $ip;

    public function __construct($login,$pass,$passw,$email,$emailv,$ip)
    {
        if($pass==$passw && $email==$emailv)
        {
            $this->login=$login;
            $this->pass=md5($pass);
            $this->email=$email;
            $this->ip=$ip;
        }
        else
        {
            echo '<span style="text-align:center;"><b>Podane dane nie zgadzają się.</b></span>';
        }
    }
    public function db_add()
    {
        global $conn;
        $q='INSERT INTO uzytkownicy VALUES (NULL,"'.$this->login.'","'.$this->pass.'","'.$this->email.'","'.$this->ip.'")';
        $conn->query($q) or die ('Wystąpił błąd przy wykonaniu kwerendy.');
        echo '<span style="text-align: center;"><b>Dodano do bazy.</b></span>';
    }
    public function db_add_auth()
    {
        if($this->login=='' || $this->pass=='' || $this->email='')
        {
            return 0;
        }
        else return 1;

    }

}
    if(!empty($_POST['login']) && !empty($_POST['pass']) && !empty($_POST['passw']) && !empty($_POST['email']) && !empty($_POST['emailv'])) {
        $o1 = new Register($_POST['login'], $_POST['pass'], $_POST['passw'], $_POST['email'], $_POST['emailv'], $_SERVER['REMOTE_ADDR']);
        if ($o1->db_add_auth() == 1) $o1->db_add();
        else echo('<span style="text-align: center;"><b>Proszę podać poprawne dane.</b></span>');
    }
    else{
        echo '<span style="text-align: center;"><b>Proszę uzupełnić dane.</b></span>';
    }
?>

<footer>
    <a href="https://github.com/zdinozi" target="_blank"><img src="github-ww.png" style="width: 50px; height: 50px;"></a>&nbsp;&nbsp;
    <a href="https://www.linkedin.com/in/wiktor-banasiak-672425222/" target="_blank"><img src="linkedin.png" style="width: 50px; height: 50px;"></a>


</footer>
</body>
</html>