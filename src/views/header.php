<!doctype html>
<html>
<head>
    <title>Test</title>
    <link rel="stylesheet" href="<?php echo URL;?>/src/public/css/default.css">
    <link href="<?php echo URL;?>/src/public/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URL;?>/src/public/scripts/jtable/themes/metro/darkgray/jtable.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo URL;?>/src/public/scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="<?php echo URL;?>/src/public/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo URL;?>/src/public/scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
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

<div id="content">
