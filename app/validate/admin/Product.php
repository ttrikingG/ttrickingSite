<?php

namespace app\validate\admin;

use app\validate\Validate;

class Product extends Validate
{
    public function validate()
    {
        $this->required([]);
    }
}