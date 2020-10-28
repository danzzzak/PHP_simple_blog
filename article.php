<?php
    if($_COOKIE['log'] == '') {
        header('Location: /reg.php');
        exit();
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <?php
    $website_title = 'ADD statiy';
    require 'blocks/head.php'?>
</head>
<body>
<?php require 'blocks/header.php'?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h4>ADD statiy</h4>
            <form action="" method="post">
                <label for="title">title</label>
                <input type="text" name="title" id="title" class="form-control">
                
                <label for="intro">INTRO</label>
                <textarea name="intro" id="intro"class="form-control"></textarea>

                <label for="text">TEXT statiy</label>
                <textarea name="text" id="text"class="form-control"></textarea>

                <div class="alert alert-danger mt-2" id="errorBlock"></div>

                <button type="button" id="article_send" class="btn btn-success mt-5">
                    ADD
                </button>
            </form>

        </div>
        <?php require 'blocks/aside.php'?>
    </div>
</main>

<?php require 'blocks/footer.php'?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $('#article_send').click(function () {
        const title = $('#title').val();
        const intro = $('#intro').val();
        const text = $('#text').val();
        $.ajax({
            url: 'reg/add_article.php',
            type: 'POST',
            cache: false,
            data: {'title': title, 'intro': intro, 'text': text},
            dataType: 'html',
            success: function (data) {
                if (data == 'Ready') {
                    $('#article_send').text('Gotovo');
                    document.querySelector('#errorBlock').style.display = 'none'
                }
                else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(data);
                }
            }
        });
    });
</script>
</body>
</html>