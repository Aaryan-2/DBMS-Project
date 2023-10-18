<?php 
//DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','RQR');


//Rqr@1234-pswrd
// define('DB_HOST','217.21.80.7');
// define('DB_USER','u214862894_rqr');
// define('DB_PASS','Rqr@1234');
// define('DB_NAME','u214862894_rqr');

// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>