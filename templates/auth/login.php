<?php if(isset($error)):?>
    <div><?= $error ?></div>
<?php endif;?>

<form action="login" method="post">
    <fieldset>
        <legend>Авторизация пользователя</legend>
        <p>
            <label>Login:<br>
                <input type="text" name="login" placeholder="">
            </label>
        </p>

        <p>
            <label>Password:<br>
                <input type="password" name="password" placeholder="">
            </label>
        </p>

        <p>
            <input type="submit" value="Log in">
        </p>
    </fieldset>
</form>