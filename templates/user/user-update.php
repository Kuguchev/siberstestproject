<form action="edit" method="post">
    <fieldset>
        <legend>Update user</legend>

        <p>
                <input type="hidden" name="id" value=<?=$user->getId();?>>
        </p>

        <p>
            <label>Login:<br>
                <input required type="text" name="login" value=<?=$user->getLogin();?>>
            </label>
        </p>

        <p>
            <label>Password:<br>
                <input required type="password" name="password" value=<?=$user->getPassword();?>>
            </label>
        </p>

        <p>
            <label>Name:<br>
                <input required type="text" name="name" value=<?=$user->getName();?>>
            </label>
        </p>

        <p>
            <label>Surname:<br>
                <input required type="text" name="surname" value=<?=$user->getSurname();?>>
            </label>
        </p>

        <p>
            <label>Gender:<br>
                <select name="gender">
                    <?php if($user->getGender() === 'Male'):?>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    <?php endif;?>
                    <?php if($user->getGender() === 'Female'):?>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    <?php endif;?>
                </select>
            </label>
        </p>

        <p>
            <label>Birthday:<br>
                <input required type="date" name="birthday" value=<?=$user->getBirthday();?>>
            </label>
        </p>

        <p>
            <input type="submit" value="Update">
        </p>

    </fieldset>
</form>
