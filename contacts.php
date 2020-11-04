<!doctype html>
<html lang="ru">
<head>
    <?php
    $website_title = 'Le Сщтефсеы';
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

                <label for="mess">mess</label>
                <textarea  name="mess" id="mess" class="form-control"> </textarea>


                <div class="alert alert-danger mt-2" id="errorBlock"></div>

                <button type="button" id="mess_send" class="btn btn-success mt-5">
                    MESS send
                </button>
            </form>

        </div>
        <?php require 'blocks/aside.php'?>
    </div>
</main>

<?php require 'blocks/footer.php'?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $('#mess_send').click(function () {
        const name = $('#username').val();
        const email = $('#email').val();
        const mess = $('#mess').val();
        $.ajax({
            url: 'reg/mail.php',
            type: 'POST',
            cache: false,
            data: {'username': name, 'email': email, 'mess': mess},
            dataType: 'html',
            success: function (data) {
                if (data == 'Ready') {
                    $('#mess_send').text('Gotovo');
                    document.querySelector('#errorBlock').style.display = 'none'
                    $('#username').val("");
                    $('#email').val("");
                    $('#mess').val("");
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