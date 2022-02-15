
<table id ="table_list">
    <thead>
        <tr>
            <th onclick="sortTable(0)">Id</th>
            <th onclick="sortTable(1)">Name</th>
            <th onclick="sortTable(2)">Surname</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($users as $user): ?>
            <tr>
                <td><?= $user->getId();?></td>
                <td><?= $user->getName();?></td>
                <td><?= $user->getSurname();?></td>
                <td><a href="/user/show?id=<?=$user->getId()?>">Show user</a></td>
                <td><a href="/user/edit?id=<?=$user->getId()?>">Edit user</a></td>
                <td><a href="/user/delete?id=<?=$user->getId()?>">Delete user</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p>
    Pages:
        <?php
        if ($usersNum % $limit !== 0) {
            $pagesNum = 1 + (int)($usersNum / $limit);
        } else {
            $pagesNum = (int)($usersNum / $limit);
        }
        ?>

        <?php for($i = 0; $i < $pagesNum; ++$i): ?>
            <a href="/user/list?page=<?=$i + 1?>"><?=$i + 1?></a>
        <?php endfor;?>
</p>
