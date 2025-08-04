<?php

namespace app\controllers\site;

use app\controllers\ContainerController;

class AboutController extends ContainerController
{
    public function index()
    {
        $this->view([ ], 'site.header');
        
        $this->view([
            'title' => 'Sobre',
        ], 'site.about');

        $this->view([], 'site.footer');
        $this->view([], 'site.master');
    }
}