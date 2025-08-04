<?php

namespace app\models\admin;

use app\models\Model;
use Exception;

class Post extends Model
{
    protected $table = 'posts';

    public $session = 'user_logged';

    public $user_id = 'user_id';

    // public function postPaginate()
    // {
    //     try{
    //         //$query = $this->connection->query("");

    //         return [
    //             'registers' => [],
    //             'total' => 0
    //         ];
    //     }catch(Exception $e){
    //         var_dump($e->getMessage());
    //     }
    // }
}