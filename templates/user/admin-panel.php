<p>Authorization success! Hello <?=$admin->getName(); ?> <?=$admin->getSurname(); ?>!
    <a href="/user/show?id=<?=$admin->getId()?>">Show user</a>
    <a href="/user/edit?id=<?=$admin->getId()?>">Edit user</a>
    <a href="/auth/logout">Log out</a></p>

<a href="/user/create">Create user</a>
<a href="/user/list">Show all users</a>







