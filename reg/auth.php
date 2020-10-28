<?php
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING ));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING ));

$error = '';
if (strlen($login) <= 3)
    $error = 'login';
else if (strlen($pass) <= 3)
    $error = 'pass';

if ($error != '') {
    echo $error;
    exit();
}

$hash = "daskdhaskd"; // Шифрование пароля
$pass = md5($pass . $hash);

require_once '../mysql.php';

$sql = 'SELECT `id` FROM `users` WHERE `login` = :login && `pass` = :pass ';
$query = $pdo->prepare($sql); // podgotovka
$query->execute( ['login' => $login, 'pass' => $pass] ); // zapolnenie

$user = $query->fetch(PDO::FETCH_OBJ); // Получаем 1 запись из базы
if ($user->id == 0) {
    echo 'Net usera';
}
else {
    setcookie('log', $login, time() + 3600 * 24 * 30, "/");
    echo 'Ready';
}

?>