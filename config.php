<?php
/* Database credentials. Assuming you are running MySQL server with default setting (user 'root' with no password) */

$host="localhost";
$user="root";
$password="";
$db="latihan";

/* Attempt to connect to MySQL database */
$link = mysqli_connect($host,$user,$password,$db);

// Check connection
if(!$link){
    die("Koneksi Gagal : " . mysqli_connect_error());
}
?>  