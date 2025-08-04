<?php

namespace app\traits;

use core\RenderView;

trait View
{
    public function view($data, $view)
    {
        RenderView::render($view, $data);
    }
}

