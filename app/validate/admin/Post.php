<?php

namespace app\validate\admin;

use app\validate\Validate;

class Post extends Validate
{
    public function validate()
    {
        $this->required([]);
    }
}