<?php

function wellcomeAdmin()
{
    if (isset($_SESSION['admin_logged']) && isset($_SESSION['admin_name'])) {
        $name = $_SESSION['admin_name'];
        return "Bem-vindo, $name | <a href=\"/adminPanel/logout\">Logout</a>";
    }

    return 'Bem-vindo';
}

