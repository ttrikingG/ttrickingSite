<?php

namespace app\validate\admin;

use app\validate\Validate;

class Service extends Validate
{
    public function validate()
    {
        $this->required([]);
    }
}