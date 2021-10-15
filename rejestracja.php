<html>
<head>
   <link rel="stylesheet" href="style.css">
    <style>
        #r-table{
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
<div id="r-form">
    <h1 style="text-align: center;">REJESTRACJA</h1>
    <form action="" method="post">
        <table>
            <tr><td>Login: </td><td><input type="text" name="login"></td></tr>
            <tr><td>Hasło: </td><td><input type="password" name="pass"></td></tr>
            <tr><td>Powtórz hasło: </td><td><input type="password" name="passw"></td></tr>
            <tr><td>Email: </td><td><input type="email" name="email"></td></tr>
            <tr><td>Potwórz Email: </td><td><input type="email" name="emailv"></td></tr>
            <tr><td></td><td><input type="submit"></td></tr>
        </table>
    </form>
    <a href="login.php">Posiadasz już konto? Zaloguj się</a>
</div>


</body>
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
                    echo 'Podane dane nie zgadzają się.';
                    exit();
                }
            }
        public function db_add()
        {
            global $conn;
            $q='INSERT INTO uzytkownicy VALUES (NULL,"'.$this->login.'","'.$this->pass.'","'.$this->email.'","'.$this->ip.'")';
            $conn->query($q) or die ('Wystąpił błąd przy wykonaniu kwerendy.');
            echo 'Dodano do bazy.';
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

    $o1=new Register($_POST['login'],$_POST['pass'],$_POST['passw'],$_POST['email'],$_POST['emailv'],$_SERVER['REMOTE_ADDR']);
    if ($o1->db_add_auth()==1) $o1->db_add();
    else exit('Proszę podać poprawne dane.');
?>





</html>