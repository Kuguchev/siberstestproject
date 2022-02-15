<form action="create" method="post">
    <fieldset>
        <legend>User create</legend>

        <p>
            <label>Login:<br>
                <input required type="text" name="login" placeholder="login">
            </label>
        </p>

        <p>
            <input type="hidden" name="status" value="user">
        </p>

        <p>
            <label>Password:<br>
                <input required type="password" name="password" placeholder="password">
            </label>
        </p>

        <p>
            <label>Name:<br>
                <input required type="text" name="name" placeholder="name">
            </label>
        </p>

        <p>
            <label>Surname:<br>
                <input required type="text" name="surname" placeholder="susrname">
            </label>
        </p>

        <p>
            <label>Gender:<br>
                <select name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </label>
        </p>

        <p>
            <label>Birthday:<br>
                <input required type="date" name="birthday">
            </label>
        </p>

        <p>
            <input type="submit" value="Create">
        </p>
    </fieldset>
</form>
