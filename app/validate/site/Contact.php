<?php

namespace app\validate\site;

use app\validate\Validate;

class Contact extends Validate
{
    public function validate()
    {
        $this->required([]);
    }
}