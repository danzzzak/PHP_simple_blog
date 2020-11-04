<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">PHP</h5>
    <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 text-dark" href="#">Glavnaya</a>
        <a class="p-2 text-dark" href="/contacts.php">Contacts</a>
        <?php
        if ($_COOKIE['log'] != ''):
            echo '<a class="p-2 text-dark" href="/article.php">Add staty</a>'
        ?>
        <?php
        endif;
        ?>
    </nav>
    <?php
    if ($_COOKIE['log'] == ''):
    ?>
    <a class="btn btn-outline-primary mr-2" href="#">ХЕДЕР</a>
    <a class="btn btn-outline-primary" href="../reg.php">Registation</a>

    <?php
    else:
    ?>
    <a class="btn btn-outline-primary" href="../auth.php">Kabinet usera</a>
    <?php
    endif;
    ?>
</header>