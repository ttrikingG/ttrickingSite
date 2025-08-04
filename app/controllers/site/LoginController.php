<?php

namespace app\controllers\site;

use app\models\site\User;
use app\validate\site\Login;
use app\controllers\ContainerController;

class LoginController extends ContainerController
{
    public function index()
    {
        
        $this->view([], 'site.master');
        $this->view([], 'site.header');
        
        $this->view([
            'title' => 'Login',
        ], 'site.login');

        $this->view([], 'site.footer');
    }

    public function store()
    {
        $login = validate(Login::class);
        
        if($login->hasErrors()){
            flash($login->getErrors());

            redirect('/login');
        }

        $logged = auth(new User);

        if($logged){
            redirect('/');
        }

    }
}