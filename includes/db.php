<?php
$db["db_host"] = "localhost";
$db["db_user"] = "root";
$db["db_pass"] = "";
$db["db_name"] = "non-league";

foreach ($db as $key => $value)
{

    define(strtoupper($key) , $value);

}

$connection = mysqli_connect($db["db_host"], $db["db_user"], $db["db_pass"], $db["db_name"]);


?>
