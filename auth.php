<!doctype html>
<html lang="ru">
<head>
    <?php
    $website_title = 'Autorisation';
    require 'blocks/head.php'?>
</head>
<body>
<?php require 'blocks/header.php'?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <?php
            if ($_COOKIE['log'] == ''):
            ?>
            <h4>Autorisation</h4>
            <form action="" method="post">
                <label for="login">login</label>
                <input type="text" name="login" id="login" class="form-control">

                <label for="pass">pass</label>
                <input type="text" name="pass" id="pass" class="form-control">

                <div class="alert alert-danger mt-2" id="errorBlock"></div>

                <button type="button" id="auth_user" class="btn btn-success mt-5">
                    Voity
                </button>
            </form>
            <?php else:
                ?>
            <h2><?=$_COOKIE['log'] ?></h2>]
            <button class="btn btn-danger" id="exit_btn"> Viyti </button>
            <?php endif; ?>

        </div>
        <?php require 'blocks/aside.php'?>
    </div>
</main>

<?php require 'blocks/footer.php'?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $('#auth_user').click(function () {
        const login = $('#login').val();
        const pass = $('#pass').val();
        $.ajax({
            url: 'reg/auth.php',
            type: 'POST',
            cache: false,
            data: {'login': login, 'pass': pass},
            dataType: 'html',
            success: function (data) {
                if (data == 'Ready') {
                    $('#auth_user').text('Gotovo');
                    document.querySelector('#errorBlock').style.display = 'none';
                    document.location.reload(true);
                }
                else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(data);
                }
            }
        });
    });


    $('#exit_btn').click(function () {
        $.ajax({
            url: 'reg/exit.php',
            type: 'POST',
            cache: false,
            data: {},
            dataType: 'html',
            success: function (data) {
                document.location.reload(true);
            }
        });
    });
</script>
</body>
</html>