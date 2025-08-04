<?php

namespace app\controllers\site;

use app\classes\Password;
use app\models\site\User;
use app\validate\site\Register;
use app\controllers\ContainerController;

class RegisterController extends ContainerController
{
    public function index()
    {
        
        $this->view([ ], 'site.header');
        
        $this->view([
            'title' => 'Cadastro',
        ], 'site.register');

        $this->view([], 'site.footer');
        $this->view([], 'site.master');
    }

    public function store()
    {
        $login = validate(Register::class);

        if($login->hasErrors()){
            flash($login->getErrors());
            
            return back();
        }
        
        $user = new User;

        $registed = $user->insert([
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'email' => request('email'),
            'password' =>Password::hash('password'),
        ]);
         
        auth($user);

        redirect('/');
    }
}