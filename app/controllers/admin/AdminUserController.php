<?php

namespace app\controllers\admin;

use app\models\site\User;
use app\validate\Validate;
use app\controllers\ContainerController;
use app\sessions\Session;

class AdminUserController extends ContainerController
{
    public function store()
    {
        // Aqui você pode usar a validação da sua classe Validate, exemplo:
        $validate = new Validate();

        if ($validate->hasErrors()) {
            flash($validate->getErrors());
            redirect('/admin/users/create'); // Ajuste para a rota certa
        }

        // Exemplo básico para salvar usuário:
        $user = new User();

        // Preencher o modelo com dados do request (ajuste conforme seu código)
        $user->name = request('name');
        $user->email = request('email');
        // ... demais campos

        // Salvar no banco (supondo que exista método save)
        $user->save();

        flash(['success' => 'Usuário criado com sucesso!']);
        redirect('/admin/users');
    }
}
