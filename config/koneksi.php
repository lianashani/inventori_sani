<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "inventori_sani"
);

//cek 
if(!$conn){
    die("Connection is fail" . mysqli_connect_error());
}
?>