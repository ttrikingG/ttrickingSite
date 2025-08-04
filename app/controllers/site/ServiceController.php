<?php

namespace app\controllers\site;

use app\controllers\ContainerController;

class ServiceController extends ContainerController{
    
    public function index(){
        $this->view([], 'site.header');
        $this->view([], 'site.footer');
        $this->view([], 'site.master');
    }
}
