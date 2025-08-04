<?php

namespace app\controllers\site;

use app\controllers\ContainerController;
use app\models\site\Post;
use app\models\admin\Upload;
use app\models\ComentsTxt;
use app\validate\ValidateTxt;

class PostController extends ContainerController
{
    private $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function index()
    {
        $postModel = new Post;
        $postsPaginated = $postModel->setLimit(5)->setCurrentPage()->postPaginate();
        $links = $postModel->renderLinks($postsPaginated['total']);

        // Buscar todos uploads relacionados a posts
        $uploadModel = new Upload;
        $allImages = $uploadModel->all();

        // Agrupar imagens por image_id onde image_type = 'post'
        $postImages = [];
        foreach ($allImages as $image) {
            if ($image->image_type === 'post') {
                if (!isset($postImages[$image->image_id])) {
                    $postImages[$image->image_id] = [];
                }
                $postImages[$image->image_id][] = $image;
            }
        }

        // Associar as imagens aos posts paginados
        foreach ($postsPaginated['registers'] as $post) {
            $post->images = $postImages[$post->id] ?? [];
        }

        $comentarios = (new ComentsTxt())->listTxt();

        $this->view([], 'site.header');

        $this->view([
            'title' => 'Post',
            'posts' => $postsPaginated['registers'],
            'comentarios' => $comentarios,
            'links' => $links
        ], 'site.postList');

        $this->view([], 'site.footer');
        $this->view([], 'site.master');
    }

    public function show()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $postModel = new Post;
        $post = $postModel->find('id', $id);

        // Buscar imagens do post pelo filtro image_type + image_id
        $uploadModel = new Upload;
        $uploads = [];
        foreach ($uploadModel->all() as $image) {
            if ($image->image_type === 'post' && $image->image_id == $id) {
                $uploads[] = $image;
            }
        }

        $comentarios = (new ComentsTxt())->listPostId($id);

        $this->view([], 'site.header');

        $this->view([
            'title' => 'Post',
            'posts' => $post,
            'comentarios' => $comentarios,
            'upload' => $uploads,
        ], 'site.post');

        $this->view([], 'site.footer');
        $this->view([], 'site.master');
    }

    public function storeTxt()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/');
        }

        $validador = new ValidateTxt($_POST);

        if ($validador->hasErrors()) {
            flash($validador->getErrors());
            redirect('/home/index');
        }

        $dados = $validador->getSanitized();

        $comentario = new ComentsTxt();
        $salvo = $comentario->salvar(
            $dados['post_id'],
            $dados['nome'],
            $dados['email'],
            $dados['comentario']
        );

        flash($salvo ? 'Comentário enviado com sucesso!' : 'Erro ao salvar o comentário.');
        redirect($salvo ? '/' : '/home/index');
    }
}
