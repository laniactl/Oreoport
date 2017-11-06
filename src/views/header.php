<!doctype html>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL?>/src/public/css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
    <link href="<?= URL?>/src/public/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= URL?>/src/public/css/default.css">
    <link href="<?= URL?>/src/public/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
    <link href="<?= URL?>/src/public/scripts/jtable/themes/metro/darkgray/jtable.css" rel="stylesheet" type="text/css" />

<!--    <script src="--><?php //echo URL;?><!--/src/public/scripts/jquery-1.6.4.min.js" type="text/javascript"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?= URL ?>/src/public/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="<?= URL?>/src/public/scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
    <script src="<?= URL?>/src/public/js/script.js"></script>
    <script type="text/javascript" src="<?= URL?>/src/public/js/custom.js"></script>
<!--    <script type="text/javascript" src="--><?php //echo URL;?><!--/src/views/index/js/default.js"></script>-->
    <?php
    if (isset($this->js)) {
        foreach ($this->js as $js) {
            echo '<script language="JavaScript" type="text/javascript" src="' . URL . '/src/views/' . $js . '"></script>';
        }
    }
    ?>

</head>
<body>
<!-- HEADER NAVIGATION -->

<div id="top-navbar"></div>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="active" href="<?= URL?>/index"><img width="55" height="55"
                                                   class="img-responsive pull-left" src="<?= URL?>/src/public/images/oreoport_blanc.jpg"
                                                   alt="logo"/><span class="sr-only">(current)</span></a>
        </div>

        <!-- ÉLÉMENTS QUI VONT DANS LE COLLAPSE -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="<?= URL?>/index" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">État des vols <span class="caret"></span></a>
                    <ul class="dropdown-menu inverse-dropdown">
                        <li><a href= "#" class="linkdepart">Départs</a></li>
                        <li><a href= "#" class="linkarrivee">Arrivées</a></li>
<!--                        <li><a href="--><?//= URL?><!--/index" class="linkarrivee">Arrivées</a></li>-->
                        <li role="separator" class="divider"></li>
                        <li><button type="button" class="btn btn-info"
                                    data-toggle="modal" data-target="#modalSMS">Alertes SMS</button></li>
                    </ul>
                </li>
                <li><a href="<?= URL?>/faq">Foire aux questions</a></li>
            </ul>

            <div class="modal fade" id="modalSMS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Alertes SMS</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" style="max-width:450px;">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">N° Vol</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="AA999 ou AA9999">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Téléphone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="(999) 999 9999">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn btn-success" data-dismiss="modal">M'inscrire</button>
                            <button type="button" class="btn btn btn-info" data-dismiss="modal">Me désinscrire</button>
                            <button type="button" class="btn btn btn-warning" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- navbar-collapse -->
    </div><!-- container-fluid -->
</nav>

<!-- TITRE  -->
<div >
    <h5 class="titre">État des vols en départ </h5>
</div>


