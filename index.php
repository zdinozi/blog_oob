<?php include("config.php");
$nick = $_SESSION['nick'];
$haslo = $_SESSION['haslo'];
if ((empty($nick)) AND (empty($haslo))) {
    echo '<br>Nie byłeś zalogowany albo zostałeś wylogowany<br><a href="index.php">Strona Główna</a><br>';
    exit;
}
$user = mysql_fetch_array(mysql_query("SELECT * FROM uzytkownicy WHERE `nick`='$nick' AND `haslo`='$haslo' LIMIT 1"));
if (empty($user[id]) OR !isset($user[id])) {
    echo '<br>Nieprawidłowe logowanie.<br>';
    exit;
}
// tresc dla zalogowanego uzytkownika
echo 'Witaj '.$user[nick].' zostałeś/aś pomyślnie zalogowany/a, tutaj umieść ukryta strone tylko dla zalogowanych';
echo '<br><a href="wyloguj.php">Wyloguj mnie</a>';
?>