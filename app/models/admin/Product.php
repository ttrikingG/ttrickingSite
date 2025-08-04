<?php

namespace app\models\admin;

use app\models\Model;

class Product extends Model
{
    protected $table = 'products';

    public $session = 'user_logged';

    public $user_id = 'user_id';
}