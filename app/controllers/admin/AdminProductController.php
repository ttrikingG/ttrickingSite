<?php

namespace app\controllers\admin;

use app\classes\ImageUpload;
use app\models\admin\Upload;
use app\models\admin\Product;
use app\validate\Validation;
use app\controllers\ContainerController;
use app\validate\admin\Product as validateProduct;

class AdminProductController extends ContainerController
{
    public function __construct()
    {
        if (!isset($_SESSION['admin_logged'])) {
            redirect('/');
        }
    }

    public function index()
    {
        $this->view([], 'admin.header');
        $this->view([], 'admin.productRegister');
        $this->view([], 'admin.footer');
        $this->view([], 'admin.master');
    }

    public function store()
    {
        $product = validate(validateProduct::class);

        if ($product->hasErrors()) {
            flash($product->getErrors());
            return back();
        }

        if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK || empty($_FILES['file']['tmp_name']) || !file_exists($_FILES['file']['tmp_name']))
        {
            flash(['product' => 'Erro ao fazer upload da imagem Tamanho(Máx 2mb) ou Formato inválido']);
            return redirect('/adminProduct');
        }

        $upload = new ImageUpload($_FILES);
        $filePath = $upload->upload(300, 'uploads');

        if (!$filePath) {
            flash(['product' => 'Erro ao fazer upload da imagem, formato ou tamanho inválidos']);
            return redirect('/adminProduct');
        }

        $productModel = new Product();

        $productId = $productModel->insert([
            'categoria'    => request('categoria'),
            'title'        => request('title'),
            'sub_title'    => request('sub_title'),
            'description'  => request('description'),
        ]);

        if (!$productId) {
            flash(['product' => 'Erro ao cadastrar produto']);
            return redirect('/adminProduct');
        }

        $uploadImage = new Upload();
        $uploaded = $uploadImage->insert([
            'image_id'   => $productId,
            'image_type' => 'product',
            'path'       => $filePath
        ]);

        if ($uploaded) {
            flash(['product' => 'Produto cadastrado com sucesso']);
            return redirect('/adminProduct');
        }

        flash(['product' => 'Erro ao cadastrar']);
        return redirect('/adminProduct');
    }


    public function show()
    {
        $product = new Product();
        $products = $product->all();

        $this->view([], 'admin.header');
        $this->view([
            'title'    => 'Products Show',
            'products' => $products
        ], 'admin.productEdit');
        $this->view([], 'admin.footer');
        $this->view([], 'admin.master');
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $product = new Product();
        $productFound = $product->find('id', $id);

        $this->view([], 'admin.header');
        $this->view([
            'title'         => 'Product Edit',
            'productFound'  => $productFound
        ], 'admin.productUpdate');
        $this->view([], 'admin.footer');
        $this->view([], 'admin.master');
    }

    public function update()
    {
        $validation = new Validation();
        $validate = $validation->validate($_POST);

        $product = new Product();
        $updated = $product->update($validate, ['id' => $validate->id]);

        if ($updated) {
            flash(['product' => 'Produto atualizado com sucesso']);
            return redirect('/adminProduct');
        }
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $product = new Product();
        $deleted = $product->delete('id', $id);

        if ($deleted) {
            flash(['product' => 'Produto deletado com sucesso']);
            return redirect('/adminProduct');
        }

        flash('message', 'Erro ao deletar');
        return redirect('/adminProduct');
    }
}
