<!doctype html>
<html lang="ru">
<head>
    <?php
    $website_title = 'Le registration';
    require 'blocks/head.php'?>
</head>
<body>
<?php require 'blocks/header.php'?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h4>REGA</h4>
            <form action="" method="post">
                <label for="username">NAME</label>
                <input type="text" name="username" id="username" class="form-control">

                <label for="email">EMAIL</label>
                <input type="text" name="email" id="email" class="form-control">

                <label for="login">login</label>
                <input type="text" name="login" id="login" class="form-control">

                <label for="pass">pass</label>
                <input type="text" name="pass" id="pass" class="form-control">

                <div class="alert alert-danger mt-2" id="errorBlock"></div>

                <button type="button" id="reg_user" class="btn btn-success mt-5">
                    zaregatsya
                </button>
            </form>

        </div>
        <?php require 'blocks/aside.php'?>
    </div>
</main>

<?php require 'blocks/footer.php'?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $('#reg_user').click(function () {
        const name = $('#username').val();
        const email = $('#email').val();
        const login = $('#login').val();
        const pass = $('#pass').val();
        $.ajax({
            url: 'reg/regist.php',
            type: 'POST',
            cache: false,
            data: {'username': name, 'email': email, 'login': login, 'pass': pass},
            dataType: 'html',
            success: function (data) {
                if (data == 'Ready') {
                    $('#reg_user').text('Gotovo');
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