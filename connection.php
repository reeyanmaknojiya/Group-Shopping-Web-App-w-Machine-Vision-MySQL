<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "cpsc571_prog_assign_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname))
{
    die("Error! Failed to connect");
}