<?php

class View
{
    function __construct()
    {
    }

    public function render($name, $noInclude = false)
    {
        if ($noInclude == true) {
            include 'src/views/' . $name . '.php';
        } else {
            include 'src/views/header.php';
            include 'src/views/' . $name . '.php';
            include 'src/views/footer.php';
        }
    }
}