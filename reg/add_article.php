<?php

$title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
$intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
$text = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));

$error = '';
if (strlen($title) <= 3)
    $error = '$title';
else if (strlen($intro) <= 3)
    $error = '$intro';
else if (strlen($text) <= 3)
    $error = '$text';

if ($error != '') {
    echo $error;
    exit();
}


require_once '../mysql.php';

$sql = 'INSERT INTO articles(title, intro, text, date, author) VALUES(?, ?, ?, ?, ?) ';
$query = $pdo->prepare($sql); // podgotovka
$query->execute([$title, $intro, $text, time(), $_COOKIE['log']]); // zapolnenie

echo 'Ready';

