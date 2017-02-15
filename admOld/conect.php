<?php 

$host = "localhost";
$user =  "root";
$senha = "root";
$dbname = "wandall_ca";   

echo "entrei...";

$link = mysql_connect($host,$user,$senha);
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}
mysql_select_db($dbname, $g_link) or die('Could not select database.');

//mysql_connect($host,$user,$senha) or die (mysql_error());
// mysql_select_db($dbname);
// mysql_query("SET NAMES 'utf8'");
// mysql_query("SET character_set_connection=utf8");
// mysql_query("SET character_set_client=utf8");
// mysql_query("SET character_set_results=utf8");

echo "conectado";

// $mysqli = new mysqli($host, $user, $senha, $dbname);
// if ($mysqli->connect_errno) {
//     echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
// }
//echo $mysqli->host_info . "\n";

?>
