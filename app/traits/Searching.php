<?php

namespace app\traits;

use app\models\querybuilder\Select;
use app\models\Model;

class Searching
{
    public function findWithFilters(): string
    {
        $term = $_GET['q'] ?? null;
        if (!$term) {
            return ''; // ou lançar exceção, ou retornar valor padrão
        }

        $targets = [
            'posts' => ['title', 'content'],
            'products' => ['title', 'description'],
            // outras tabelas que desejar
        ];

        $select = new Select();
        $select->from($targets)->where($term);

        // Retorna a query SQL gerada, sem executar
        return $select->sql();
    }
}
