<table>
    <tr>
        <td>Id</td>
        <td>Status</td>
        <td>Login</td>
        <td>Password</td>
        <td>Name</td>
        <td>Surname</td>
        <td>Gender</td>
        <td>Birthday</td>
    </tr>
    <tr>
        <td><?= $user->getId(); ?></td>
        <td><?= $user->getStatus(); ?></td>
        <td><?= $user->getLogin(); ?></td>
        <td><?= $user->getPassword(); ?></td>
        <td><?= $user->getName(); ?></td>
        <td><?= $user->getSurname(); ?></td>
        <td><?= $user->getGender(); ?></td>
        <td><?= $user->getBirthday(); ?></td>
    </tr>
</table>