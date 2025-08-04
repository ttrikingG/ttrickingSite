<?php

namespace app\controllers\admin;

use app\classes\ImageUpload;
use app\models\admin\Upload;
use app\models\admin\Service;
use app\validate\Validation;
use app\controllers\ContainerController;
use app\validate\admin\Service as validateService;

class AdminServiceController extends ContainerController
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
        $this->view([], 'admin.serviceRegister');
        $this->view([], 'admin.footer');
        $this->view([], 'admin.master');
    }

    public function store()
    {
        $service = validate(validateService::Class);

        if($service->hasErrors()){
            flash($service->getErrors());
            return back();
        }

        if(!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK || empty($_FILES['file']['tmp_name']) || !file_exists($_FILES['file']['tmp_name'])){
            flash(['service' => 'Erro ao fazer upload da imagem Tamanho(Máx 2mb) ou formato inválido']);
            return redirect('/adminService');
        }

        $upload = new ImageUpload($_FILES);
        $filePath = $upload->upload(300, 'uploads');

        if(!$filePath){
            flash(['service' => 'Erro ao fazer upload da imagem, formato ou tamho inválidos.']);
            return redirect('/adminService');
        }

        $serviceModel = new Service;
        $serviceId = $serviceModel->insert([
            'categoria' => request('categoria'),
            'title' => request('title'),
            'sub_title' => request('sub_title'),
            'description' => request('description')
        ]);

        if(!$serviceId){
            flash(['service' => 'Erro ao cadatrar serviço']);
            return redirect('/adminService');
        }

        $uploadImage = new Upload();
        $uploaded = $uploadImage->insert([
            'image_id' => $serviceId,
            'image_type' => 'service',
            'path' => $filePath
        ]);

        if($uploaded){
            flash(['service' => 'Serviço cadastrado com sucesso']);
            redirect('/adminService');
        }

        flash(['service' => 'Serviço cadastrado com sucesso']);
        return redirect('/adminService');
    }
    
}
