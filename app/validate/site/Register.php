<?php

namespace app\validate\site;

use app\models\site\User;
use app\validate\Validate;

class Register extends Validate
{
    public function validate()
    {
        $this->required([]);
        $this->email(['email']);
        //$this->max(['password' => 3]);
        $this->unique(['email' => User::class]);
    }
}
