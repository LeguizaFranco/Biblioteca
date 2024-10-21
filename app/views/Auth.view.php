<?php
require_once './app/controllers/Auth.controller.php';
class AuthView
{
    private $user = null;

    public function showLogin($error = '')
    {
        require './templates/formLogin.phtml';
    }

    public function showSignup($error = '')
    {
        require './templates/form_signup.phtml';
    }
}
