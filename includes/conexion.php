<?php

$Server = 'localhost';
$Username = 'root';
$Password = 'Ornitorinco123';
$database = 'blog';

$db = mysqli_connect($Server, $Username, $Password, $database);

mysqli_query($db, "Set Names 'utf8' ");

//Inicial Seccion

if(!isset($_SESSION)){
    session_start();
}