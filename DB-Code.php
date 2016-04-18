
<?php
error_reporting(E_ALL);
define ( 'MYSQL_HOST',      '172.16.2.53' );
define ( 'MYSQL_BENUTZER',  'lukas' );
define ( 'MYSQL_KENNWORT',  'gibbiX12345' );
define ( 'MYSQL_DATENBANK', 'einkauf' );
 
$db_link = mysqli_connect (MYSQL_HOST, 
                           MYSQL_BENUTZER, 
                           MYSQL_KENNWORT, 
                           MYSQL_DATENBANK);
 
if ( $db_link )
{
    echo 'Verbindung erfolgreich: ';
    print_r( $db_link);
}
else
{
    // hier sollte dann später dem Programmierer eine
    // E-Mail mit dem Problem zukommen gelassen werden
    die('keine Verbindung möglich: ' . mysqli_error());
}
//Neue Ware erstellen

$sql = "insert into waren (name, preis, geschaeftsid, menge)
values ('hallo', '12', '1', '12');
";
$db_erg = mysqli_query($db_link, $sql) or die("Anfrage fehlgeschlagen: " . mysqli_error());


?>