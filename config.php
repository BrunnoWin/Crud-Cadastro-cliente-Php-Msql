<?php
include_once('include/Database.php');
define('SS_DB_NAME', 'dadoscliente');//banco da dados
define('SS_DB_USER', 'root');//usuario banco
define('SS_DB_PASSWORD', '');///senha
define('SS_DB_HOST', 'localhost');//servidor

$dsn	= 	"mysql:dbname=".SS_DB_NAME.";host=".SS_DB_HOST."";
$pdo	=	"";
try {
	$pdo = new PDO($dsn, SS_DB_USER, SS_DB_PASSWORD);
}catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
$db 	=	new Database($pdo);
?>