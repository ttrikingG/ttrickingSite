<?php

session_start();

require "vendor/autoload.php";

use app\classes\Bind;

$config = require "config.php";

app\classes\Bind::bind('connection', app\models\Connection::connect());
