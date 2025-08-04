<?php

namespace app\models\site;

use app\models\Model;

class User extends Model
{
    protected $table = 'users';

    public $session = 'user_logged';

    public $user_id = 'user_id';
}