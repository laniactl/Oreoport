<!doctype html>
<html>
<head>
    <title>Test</title>
    <link rel="stylesheet" href="<?php echo URL;?>/src/public/css/default.css">
    <script type="text/javascript" src="<?php echo URL;?>/src/public/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>/src/public/js/custom.js"></script>
    <?php
    if (isset($this->js))
    {
        foreach ($this->js as $js)
        {
            echo '<script type="text/javascript" src="'.URL.'src/views/'.$js.'"></script>';
        }
    }
    ?>
</head>
<body>
<h1>Index page!!</h1>

<div id="content">
