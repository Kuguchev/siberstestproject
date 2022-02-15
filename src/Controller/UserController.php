<?php

class UserController extends AbstractController
{
    public function indexAction(): void
    {
        if(empty($_SESSION)) {
            header('Location: /auth/login', true, 301);
            return;
        }

        $user = User::getById($_SESSION['id']);

        if($user->getStatus() === 'admin') {
            $this->template->render('admin-panel', ['admin' => $user]);
        } else {
            $this->template->render('user-panel', ['user' => $user]);
        }
    }

    public function deleteAction(array $args) : void
    {
        if(empty($_SESSION)) {
            header('Location: /auth/login', true, 301);
            return;
        }

        $currentUser = User::getById($_SESSION['id']);

        if($currentUser->getStatus() !== 'admin') {
            header('Location: /user/index', true, 301);
        }

        $deleteId = $args['id'] ?? null;

        if($deleteId === null || $deleteId === '') {
            header('Location: /user/index', true, 301);
        }

        User::deleteById($deleteId);
        header('Location: /user/index', true, 301);
    }

    public function createAction() : void
    {
        if(empty($_SESSION)) {
            header('Location: /auth/login', true, 301);
            return;
        }

        $user = User::getById($_SESSION['id']);

        if($user->getStatus() === 'admin') {
            if(!empty($_POST)) {
                $user = User::getModelByData($_POST);
                $user->save();
                header('Location: /user/list', true, 301);
            } else {
                $this->template->render('user-create');
            }
        } else {
            header('Location: /user/index', true, 301);
        }
    }

    public function editAction(array $args) : void
    {
        if(empty($_SESSION)) {
            header('Location: /auth/login', true, 301);
            return;
        }

        $editId = $args['id'] ?? $_POST['id'] ?? null;

        if($editId === null || $editId === '') {
            header('Location: /user/index', true, 301);
        }

        $currentUser = User::getById($_SESSION['id']);

         if((int)$editId !== $currentUser->getId() && $currentUser->getStatus() !== 'admin') {
             header('Location: /user/index', true, 301);
        }

        if(!empty($_POST)) {
            $editUser = User::getModelByData($_POST);
            $editUser->update();
            header('Location: /user/index', true, 301);
        } else {
            $editUser = User::getById($editId);
            $this->template->render('user-update', ['user' => $editUser]);
        }
    }

    public function listAction(array $args): void
    {
        if(empty($_SESSION)) {
            header('Location: /auth/login', true, 301);
            return;
        }

        $user = User::getById($_SESSION['id']);

        if($user->getStatus() === 'admin') {

            $page = $args['page'] ?? 1;
            if($page === '') {
                $page = 1;
            }
            $limit = 10;
            $offset = $limit * ($page - 1);
            $users = User::getUsers($limit, $offset);
            $usersNum = User::getUsersNum()[0]['NUM'];

            $this->template->render('user-list',
                ['users' => $users, 'usersNum' => $usersNum, 'limit' => $limit]);
        } else {
            header('Location: /user/index', true, 301);
        }
    }

    public function showAction(array $args) : void
    {
        if(empty($_SESSION)) {
            header('Location: /auth/login', true, 301);
            return;
        }

        $currentUser = User::getById($_SESSION['id']);

        $showId = $args['id'] ?? null;

        if($showId === null || $showId === '') {
            header('Location: /user/index', true, 301);
        }

        if($currentUser->getId() !== (int)$showId && $currentUser->getStatus() !== 'admin') {
            header('Location: /user/index', true, 301);
        }
        $user = User::getById($showId);
        $this->template->render('user-show', ['user' => $user]);
    }
}