<!doctype html>
<html lang="ru">
<head>
    <?php

    require_once 'mysql.php';

    $sql = 'SELECT * FROM `articles` WHERE `id` =:id';
    $id = $_GET['id'];
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id]);

    $article = $query->fetch(PDO::FETCH_OBJ);

    $website_title = $article->title;
    require 'blocks/head.php'?>
</head>
<body>
<?php require 'blocks/header.php'?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="jumbotron">
                <h1>
                    <?=$article->title?>
                    <br>
                    <?=$article->author?>
                    <?php
                    $date = date('d ', $article->date);
                    $array = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                    $date .= $array[date('n', $article->date) - 1];
                    $date .= date(' H:i', $article->date);
                    ?>
                    <br>
                    <p>DATE =  </p><?=$date?>
                </h1>
                <p><?=$article->intro ?>
                    <br>
                    <?=$article->text ?>
                </p>

            </div>
        </div>
        <?php require 'blocks/aside.php'?>
    </div>
</main>

<?php require 'blocks/footer.php'?>

</body>
</html>