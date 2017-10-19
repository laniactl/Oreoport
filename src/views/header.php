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
<!--    --><?php //Session::inint(); ?>
<!--    <div id="header">-->
<!--        <br />-->
<!--        <a href="--><?php //echo URL?><!--index">Index</a>-->
<!--        <a href="--><?php //echo URL?><!--help">help</a>-->
<!--        --><?php //if (Session::get('loggedIn') == true):?>
<!--            <a href="--><?php //echo URL?><!--dashboard/logout">Logout</a>-->
<!--        --><?php //else: ?>
<!--            <a href="--><?php //echo URL?><!--login">Login</a>-->
<!--        --><?php //endif; ?>
<!---->
<!--    </div>-->
<div id="content">
