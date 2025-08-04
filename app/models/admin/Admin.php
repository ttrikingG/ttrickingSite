<?php

namespace app\models\admin;

use app\models\Model;

class Admin extends Model
{
    protected $table = 'admin';

    public $session = 'admin_logged';

    public $user_id = 'admin_id';

    //protected $fillable = ['admin', 'email', 'password']; faltou a aula 16

}