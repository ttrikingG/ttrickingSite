<?php

namespace app\models\site;

use Exception;
use app\models\Model;

class Product extends Model
{
    protected $table = 'products';

    public function postPaginate()
    {
        try {
            $query = $this->connection->query(
                "SELECT SQL_CALC_FOUND_ROWS * FROM {$this->table} ORDER BY created_at DESC LIMIT {$this->limit} OFFSET {$this->offset}"
            );
    
            return [
                'data' => $query->fetchAll(),
                'total' => $this->connection->query('SELECT FOUND_ROWS()')->fetchColumn()
            ];
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
    
}