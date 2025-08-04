<?php

namespace app\validate;

use app\classes\Password;

class Sanitize
{
    protected $sanitized = [];

    public function sanitized()
    {
        $posts = $_POST;

        foreach($posts as $name => $value){
            $this->sanitized[$name] = strip_tags($value);
        }

        return (object) $this->sanitized;
    }
}