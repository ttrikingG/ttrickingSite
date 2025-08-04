<?php

namespace app\controllers\site;

use app\sessions\Session;
use app\models\admin\Upload;
use app\models\admin\Product;
use app\models\admin\Service;
use app\models\admin\Portifolio;
use app\models\site\Post;
use app\models\ComentsTxt;
use app\controllers\ContainerController;
use app\validate\ValidateTxt;

class HomeController extends ContainerController
{
    public function index()
    {   
        
        $post = new Post;
        $posts = $post->all();

        $comentarios = (new ComentsTxt())->listTxt();

        $product = new Product;
        $products = $product->all();

        $service = new Service;
        $services = $service->all();

        $portifolio = new Portifolio;
        $portifolios = $portifolio->all();

        $upload = new Upload;
        $allImages = $upload->all();
        
        $imageGroups = [
            'product' => [],
            'service' => [],
            'post'    => [],
        ];

        foreach ($allImages as $image) {
            if (!isset($image->image_type, $image->image_id)) {
                continue;
            }

            switch ($image->image_type) {
                case 'product':
                    $imageGroups['product'][$image->image_id][] = $image;
                    break;
                case 'service':
                    $imageGroups['service'][$image->image_id][] = $image;
                    break;
                case 'post':
                    $imageGroups['post'][$image->image_id][] = $image;
                    break;
            }
        }

        $productImages = $imageGroups['product'];
        $serviceImages = $imageGroups['service'];
        $postImages    = $imageGroups['post'];

        foreach ($products as $product) {
            $product->images = $productImages[$product->id] ?? [];
        }

        foreach ($services as $service) {
            $service->images = $serviceImages[$service->id] ?? [];
        }

        foreach ($posts as $post) {
            $post->images = $postImages[$post->id] ?? [];
        }

        $this->view([], 'site.master');
        $this->view([], 'site.header');

        $this->view([ 
            'title' => 'Home',
            'posts' => $posts,
            'comentarios' => $comentarios,
            'products' => $products,
            'services' => $services,
            'portifolios' => $portifolios
        ], 'site.main');

        $this->view([], 'site.footer');
    }

}

