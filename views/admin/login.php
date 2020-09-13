
<form method="post" >
    <h1>Авторизация</h1>
    <?php
    if ($message):
        ?>
        <div class="alert alert-danger" role="alert">
            <?=$message?>
        </div>
    <?php
    endif;
    ?>
    <fieldset class="form-group">
        <label for="inputLogin">Логин</label>
        <input type="text" class="form-control" id="inputLogin" name="inputLogin" required>
    </fieldset>
    <fieldset class="form-group">
        <label for="inputPass">Пароль</label>
        <input type="password" class="form-control" id="inputPass" name="inputPass" required>
    </fieldset>
    <button type="submit" class="btn btn-primary">Вход</button>

</form>