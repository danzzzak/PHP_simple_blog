<?php
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING ));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL ));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING ));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING ));

    if (strlen($username) <= 3)
        exit();
    else if (strlen($email) <= 3) // Заглушка на AJAX
        exit();
    else if (strlen($login) <= 3)
        exit();
    else if (strlen($pass) <= 3)
        exit();

    $hash = "daskdhaskd"; // Шифрование пароля
    $pass = md5($pass . $hash);

    $user = 'root';
    $password = 'root';
    $db = 'php_blog_db';
    $host = 'localhost';

    $dsn = 'mysql::host='.$host.';dbname='.$db;
    $pdo = new PDO($dsn, $user, $password);
    $sql = 'INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?) ';
    $query = $pdo->prepare($sql); // podgotovka
    $query->execute( [$username, $email, $login, $pass] ); // zapolnenie


    ?>