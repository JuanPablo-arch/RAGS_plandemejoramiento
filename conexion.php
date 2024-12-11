<?php
$host = 'localhost:3307';
$dbname = 'registro_minutas';
$username = 'root';
$password = '';

//Reintenta conectarse a la base de datos usando extensión PDO, sino lo consigue captura el error y imprime mensaje 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
?>
