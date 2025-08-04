<?php

namespace app\controllers\admin;

use app\controllers\ContainerController;

class AdminGalleryController extends ContainerController
{
    public function index()
    {
        $this->view([], 'site.master');
    }

    public function show()
    {
        $this->view([], 'admin.header');
        $this->view([], 'admin.master');
        $this->view([], 'admin.footer');
    }
}
