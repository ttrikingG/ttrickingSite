<?php

namespace app\models\admin;

use app\models\Model;

class Portifolio extends Model
{
    protected $table = 'portifolios';

    public $session = 'user_logged';

    public $user_id = 'user_id';
}