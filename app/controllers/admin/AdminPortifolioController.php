<?php

namespace app\controllers\admin;

use app\models\admin\Portifolio;
use app\validate\Validation;
use app\controllers\ContainerController;
use app\validate\admin\Portifolio as validatePortifolio;

class AdminPortifolioController extends ContainerController
{
    public function __construct()
    {
        if(!isset($_SESSION['admin_logged'])) {
            redirect('/');
        }
    }

    public function index()
    {
        $this->view([], 'admin.header');
        $this->view([], 'admin.portifolioRegister');
        $this->view([], 'admin.footer');
        $this->view([], 'admin.master');
    }

    public function store()
    {
        $portifolio = validate(validatePortifolio::class);

        if ($portifolio->hasErrors()) {
            flash($portifolio->getErrors());
            return back();
        }

        $portifolioModel = new Portifolio;
        $portifolioId = $portifolioModel->insert([
            'categoria' => request('categoria'),
            'title' => request('title'),
            'git_link' => request('git_link'),
            'codigo' => request('codigo')
        ]);

        if (!$portifolioId) {
            flash(['portifolio' => 'Erro ao cadastrar portifólio']);
        } else {
            flash(['portifolio' => 'Portifólio cadastrado com sucesso']);
        }

        return redirect('/adminPortifolio');
    }

}