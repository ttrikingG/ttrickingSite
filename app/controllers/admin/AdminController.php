<?php

namespace app\controllers\admin;

use app\controllers\ContainerController;

class AdminController extends ContainerController
{
  public function index()
  {
    $this->view([
      'title' => 'Login',
      
    ], 'admin.login');
    
    $this->view([], 'admin.master');
  }
}