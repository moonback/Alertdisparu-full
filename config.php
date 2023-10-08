<?php
// Informations de connexion à la base de données
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'alertdisparu');

try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
<?php 
	// Informations de connexion à la base de données
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "alertdisparu";
	
	// Connexion à la base de données
	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	
	if (!$conn) {
		die("Échec de la connexion à la base de données : " . mysqli_connect_error());
	}
?>
