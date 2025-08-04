<?php

namespace app\models\site;

use Exception;
use app\models\Model;

class Post extends Model
{
    protected $table = 'posts';

    public function postPaginate()
    {
        try{
            $query = $this->connection->query(
                "select SQL_CALC_FOUND_ROWS * from posts ORDER BY  created_at desc limit {$this->limit} offset {$this->offset}"
            );

            return [
                'registers' => $query->fetchAll(),
                'total' => $this->connection->query('SELECT FOUND_ROWS()')->fetchColumn()
            ];
        }catch(Exception $e){
            var_dump($e->getMessage());
        }
    }
}