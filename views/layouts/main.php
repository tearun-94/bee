<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="/coding-challenges/assets/main.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <?php
        if (\models\Users::isUser()) {
            ?><a class="btn btn-primary float-right" href="admin/logout" role="button">Выход</a><?php
        }
        else {
            ?><a class="btn btn-primary float-right" href="admin/login" role="button">Авторизация</a><?php
        }
        ?>
    </header>
    <aside>
        <?php
            require "_form.php";
        ?>
    </aside>
    <section>
        <?php
            require $view;
        ?>
    </section>
    <footer>
        footer
    </footer>
</body>
</html>
<?php
