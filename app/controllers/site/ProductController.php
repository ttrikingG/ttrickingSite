<?php

namespace app\controllers\site;

use app\controllers\ContainerController;
use app\models\site\Product;
use app\models\admin\Upload;

class ProductController extends ContainerController
{
    public function index()
    {
        $productModel = new Product;

        $products = $productModel->setLimit(5)->setCurrentPage()->postPaginate();
        $links = $productModel->renderLinks($products['total']);

        $uploadModel = new Upload;
        $allImages = $uploadModel->all();

        // Mapeia imagens por ID do produto (image_id no Upload aponta para id do Product)
        $productImages = [];
        foreach ($allImages as $image) {
            if (!isset($productImages[$image->image_id])) {
                $productImages[$image->image_id] = [];
            }
            $productImages[$image->image_id][] = $image;
        }

        // Associa as imagens ao produto
        foreach ($products['data'] as $product) {
            $productId = $product->id;
            $product->images = $productImages[$productId] ?? [];
        }

        $this->view([], 'site.header');
        $this->view([
            'title' => 'Product',
            'products' => $products['data'],
            'links' => $links
        ], 'site.productList');
        $this->view([], 'site.footer');
        $this->view([], 'site.master');
    }

    public function show()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $productModel = new Product;
        $product = $productModel->find('id', $id);

        $uploadModel = new Upload;
        $uploads = [];
        foreach ($uploadModel->all() as $image) {
            if ($image->image_type === 'product' && $image->image_id == $id) {
                $uploads[] = $image;
            }
        }

        $this->view([], 'site.header');

        $this->view([
            'title' => 'Produto',
            'product' => $product,
            'uploads' => $uploads
        ], 'site.product');

        $this->view([], 'site.footer');
        $this->view([], 'site.master');
    }

}
