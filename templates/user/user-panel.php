<p>Authorization success! Hello <?=$user->getName(); ?> <?=$user->getSurname(); ?>!
    <a href="/user/show?id=<?=$user->getId();?>">Show user</a>
    <a href="/user/edit?id=<?=$user->getId()?>">Edit user</a>
    <a href="/auth/logout">Log out</a></p>









