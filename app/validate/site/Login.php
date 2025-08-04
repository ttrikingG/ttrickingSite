<?php

namespace app\validate\site;

use app\validate\Validate;

class Login extends Validate
{
    public function validate()
    {
        $this->required(['email', 'password']);
        $this->email(['email']);
    }
}