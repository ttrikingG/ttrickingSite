<?php

namespace app\models\admin;

use app\models\Model;

class Service extends Model
{
    protected $table = 'services';

    public $session = 'user_logged';

    public $user_id = 'user_id';
}