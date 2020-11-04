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
            <h3 class="mt-5">KOMENTS</h3>

            <form action="/phpsiten1/news.php?id=<?=$_GET['id']?>" method="post">
                <label for="username">NAME</label>
                <input type="text" name="username" value="<?=$_COOKIE['log']?>" id="username" class="form-control">

                <label for="mess">Mess?</label>
                <textarea  name="mess" id="mess" class="form-control"> </textarea>


                <button type="submit" id="mess_send" class="btn btn-success mt-5">
                    Add comment
                </button>
            </form>
            <?php
            if ($_POST['username'] != '' && $_POST['mess'] != '') {
                $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING ));
                $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_EMAIL ));
                $sql = 'INSERT INTO comments(name, mess, article_id) VALUES(?, ?, ?) ';
                $query = $pdo->prepare($sql);
                $query->execute( [$username, $mess, $_GET['id']] );
            }

            $sql = 'SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC';
            $query = $pdo->prepare($sql);
            $query->execute(['id' => $_GET['id']] );
            $comments = $query->fetchAll(PDO::FETCH_OBJ);

            foreach ($comments as $comment) {
                echo "<div class='alert alert-info mb-20'>
                        <h4>$comment->name</h4>
                        <p>$comment->mess</p>
                    </div>";
            }
            ?>

        </div>
        <?php require 'blocks/aside.php'?>
    </div>
</main>

<?php require 'blocks/footer.php'?>

</body>
</html>