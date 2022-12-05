<?php
function checkQuery($query)
{
    global $connection;
    if (!$query)
    {
        die('Query failed!' . mysqli_error($connection));
    }
}

function getAge($birthDate)
{
    global $connection;
    $currentDate = date("Y-m-d");
    $age = date_diff(date_create($birthDate) , date_create($currentDate));
    echo $age->format("%y");
}

?>
