<?php

namespace app\controllers\admin;

use app\classes\ImageUpload;
use app\models\admin\Upload;
use app\models\admin\Post;
use app\validate\Validation;
use app\controllers\ContainerController;
use app\validate\admin\Post as validatePost;

class AdminPostController extends ContainerController
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
        $this->view([], 'admin.postRegister');
        $this->view([], 'admin.footer');
        $this->view([], 'admin.master');
    }

    public function store()
    {
        $post = validate(validatePost::class);

        if ($post->hasErrors()) {
            flash($post->getErrors());
            return back();
        }

        if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK || empty($_FILES['file']['tmp_name']) || !file_exists($_FILES['file']['tmp_name'])){
            flash(['post' => 'Erro ao fazer upload da imagem Tamanho(Máx 2mb) ou Formato inválido']);
            return redirect('/adminProduct');
        }

        $upload = new ImageUpload($_FILES);
        $filePath = $upload->upload(300, 'uploads');

        if (!$filePath) {
            flash(['post' => 'Erro ao fazer upload da imagem, formato ou tamanho inválidos']);
            return redirect('/adminPost');
        }

        $postModel = new Post;
        $postId = $postModel->insert([
            'categoria' => request('categoria'),
            'title' => request('title'),
            'sub_title' => request('sub_title'),
            'content' => request('content')
        ]);

        if (!$postId) {
            flash(['post' => 'Erro ao cadastrar post']);
            return redirect('/adminPost');
        }

        $uploadImage = new Upload();
        $uploaded = $uploadImage->insert([
            'image_id' => $postId,
            'image_type' => 'post',
            'path' => $filePath
        ]);

        if ($uploaded) {
            flash(['post' => 'Post cadastrado com sucesso']);
            redirect('/adminPost');
        }

        flash(['post' => 'Erro ao cadastrar']);
        return redirect('/adminPost');
    }

    public function show()
    {
        $post = new Post;
        $posts = $post->all();

        $this->view([], 'admin.header');
        $this->view([
            'title' => 'Post Show',
            'posts' => $posts
        ], 'admin.postEdit');
        $this->view([], 'admin.footer');
        $this->view([], 'admin.master');
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $post = new Post;
        $postFound = $post->find('id', $id);

        $this->view([], 'admin.header');
        $this->view([
            'title' => 'Post Edit',
            'postFound' => $postFound
        ], 'admin.postUpdate');
        $this->view([], 'admin.footer');
        $this->view([], 'admin.master');
    }

    public function update()
    {
        $validation = new Validation;
        $validate = $validation->validate($_POST);

        $post = new Post;
        $updated = $post->update($validate, ['id' => $validate->id]);

        if ($updated) {
            flash(['post' => 'Post Atualizado com sucesso']);
            redirect('/adminPost');
        }
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $post = new Post;
        $deleted = $post->delete('id', $id);

        if ($deleted) {
            flash(['post' => 'Post deletado com sucesso']);
            return redirect('/adminPost');
        }

        flash('message', 'Erro ao deletar');
        return redirect('/adminPost');
    }
}
