<?php

namespace app\controllers\site;

use app\controllers\ContainerController;
use app\traits\Searching;
use app\classes\Bind;

class SearchController extends ContainerController
{
    public function index()
    {
        $search = new Searching();
        $sql = $search->findWithFilters();

        $results = [];

        if ($sql) {
            $pdo = Bind::get('connection');
            $stmt = $pdo->query($sql);
            $results = $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        $this->view([], 'site.header');

        $this->view([
            'title' => 'Pesquisa',
            'results' => $results
        ], 'site.search');

        $this->view([], 'site.footer');
        $this->view([], 'site.master');
    }
}
