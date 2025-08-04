<?php

namespace app\controllers\admin;

use Exception;
use app\classes\ImageUpload;
use app\models\site\User;
use app\models\admin\Upload;
use app\models\admin\Product;
use app\models\admin\Service;
use app\models\admin\Post;
use app\controllers\ContainerController;

class AdminPanelController extends ContainerController
{
    public function __construct()
    {
        if (!isset($_SESSION['admin_logged'])) {
            redirect('/');
        }
    }

    public function index()
    {

        $user = new User();
        $users = $user->all();

        $product = new Product();
        $products = $product->all();

        $service = new Service();
        $services = $service->all();

        $post = new Post();
        $posts = $post->all();

        $this->view(['products' => $products], 'admin.header');

        $this->view([
            'title'    => 'Panel',
            'users'    => $users,
            'products' => $products,
            'services' => $services,
            'posts'    => $posts
        ], 'admin.main');

        $this->view([], 'admin.footer');
        $this->view([], 'admin.master');
    }

    public function store()
    {
        try {
            $upload = new ImageUpload($_FILES);
            $filePath = $upload->upload(300, 'uploads');

            $uploadImage = new Upload();
            $uploadImage->insert([
                'path' => $filePath
            ]);
        } catch (Exception $e) {
            var_dump('error', $e->getMessage());
        }
    }

    public function user_show()
    {
        $user = new User();
        $users = $user->all();

        $this->view([], 'admin.header');

        $this->view([
            'title' => 'User',
            'users' => $users
        ], 'admin.user');

        $this->view([], 'admin.footer');
        $this->view([], 'admin.master');
    }

 
    public function logout()
    {
        $_SESSION = [];

        if (session_id() !== '') {
            session_unset();
            session_destroy();
        }

        session_regenerate_id(true);
        redirect('/');
    }    

}
