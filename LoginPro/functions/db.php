<?php

$con = mysqli_connect('localhost','root','','loginPro');

function escape($string)
{
    global $con;
    return mysqli_real_escape_string($con,$string);
}

function Query($query)
{
    global $con;
    return mysqli_query($con, $query);
}


function confirm($result)
{
    global $con;
    if(!$result)
    {
        die('Query failed' .mysqli_error($con));
    }
}


function fatech_data($result)
{
    global $con;
    return mysqli_fetch_assoc($result);
}

function row_count($count)
{
    return mysqli_num_rows($count);
}
?>