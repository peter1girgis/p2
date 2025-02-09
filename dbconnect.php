<?php
session_start();
$username = "root";
$password = "";
$database = 'clinic';
$host = 'localhost';
$port = '3306';

$pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
