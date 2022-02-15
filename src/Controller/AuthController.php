<?php

class AuthController extends AbstractController
{
    public function loginAction() : void
    {
        if(!empty($_POST) && empty($_SESSION)) {
            if(!empty($_POST['login']) && !empty($_POST['password'])) {
                $login = $_POST['login'];
                $password = $_POST['password'];
                $user = User::getByLogin($login);
                if($user !== null && $user->getPassword() === $password) {
                    $_SESSION['id'] = $user->getId();
                    header('Location: /user/index', true, 301);
                } else {
                    $this->template->render('login', ['error' =>
                        'Логин или пароль введены неверно']);
                    exit();
                }
            } else {
                $this->template->render('login', ['error' =>
                    'Логин или пароль введены неверно']);
                exit();
            }
        } elseif (!empty($_SESSION)) {
            header('Location: /user/index', true,301);
        } else {
            $this->template->render('login');
        }
    }

    public function logoutAction() : void
    {
        session_destroy();
        header('Location: /user/index', true, 301);
    }
}