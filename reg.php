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
            <form action="reg/regist.php" method="post">
                <label for="username">NAME</label>
                <input type="text" name="username" id="username" class="form-control">

                <label for="email">EMAIL</label>
                <input type="text" name="email" id="email" class="form-control">

                <label for="login">login</label>
                <input type="text" name="login" id="login" class="form-control">

                <label for="pass">pass</label>
                <input type="text" name="pass" id="pass" class="form-control">

                <button type="submit" class="btn btn-success mt-5">
                    zaregatsya
                </button>
            </form>

        </div>
        <?php require 'blocks/aside.php'?>
    </div>
</main>

<?php require 'blocks/footer.php'?>

</body>
</html>