<?php
$user = 'root';
$password = 'root';
$db = 'php_blog_db';
$host = 'localhost';

$dsn = 'mysql::host='.$host.';dbname='.$db;
$pdo = new PDO($dsn, $user, $password);