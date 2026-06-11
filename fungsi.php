<?php

$connection= mysqli_connect("localhost", "root", "sisca1234", "smweekly");

function tampildata($query)
{
    global $connection;
    $result = mysqli_query($connection,$query);

    $rows = [];

    while($row = mysqli_fetch_assoc($result))
        {
            $rows[] = $row;
        }
    return $rows;
}

?>