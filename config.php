<?php
    session_start();
    $conn = new mysqli('localhost', 'root', '', 'Blog_obiektowo') or die ('Błędne zapytanie');
    $conn->set_charset('utf8');
?>