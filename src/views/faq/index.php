<html>
<head>
    <title>FAQ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URL;?>/src/public/css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
    <link href="<?php echo URL;?>/src/public/css/styles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
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
            <a class="active" href="<?php echo URL;?>/index"><img width="55" height="55"
                                                   class="img-responsive pull-left" src="<?php echo URL;?>/src/public/images/oreoport_blanc.jpg"
                                                   alt="logo"/><span class="sr-only">(current)</span></a>
        </div>

        <!-- ÉLÉMENTS QUI VONT DANS LE COLLAPSE -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo URL;?>/index">Home</a></li>
                <li><a href="<?php echo URL;?>/faq">Foire aux questions</a></li>
            </ul>

        </div><!-- navbar-collapse -->
    </div><!-- container-fluid -->
</nav>

<!-- FOIRE AUX QUESTIONS -->
<div >
    <h5 class="titre">QUESTIONS FRÉQUENTES</h5>
</div>
<div class="faq">
    <div class="panel-group" id="accordion">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#c1">
                        D'où proviennent les renseignements sur les vols ?</a>
                </h4>
            </div>
            <div id="c1" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>Les renseignements sur les vols proviennent directement de la base de données principale
                        de l'aéroport et sont identiques aux renseignements affichés sur les écrans des aréogares.
                    </p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#c2">
                        Pour quelle période les renseignements sur les vols sont-ils disponibles ?</a>
                </h4>
            </div>
            <div id="c2" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>Les renseignements sur les vols transmis par le service Alertes SMS sont disponibles
                        jusqu'à 24 heures avant le départ ou l'arrivée d'un vol, et une heure après son décollage
                        ou son atterrissage.
                    </p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#c3">
                        En quoi consiste une alerte SMS ?</a>
                </h4>
            </div>
            <div id="c3" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>Une alerte SMS avise automatiquement l'utilisateur d'un changement de plus de 10 minutes
                        de l'heure planifiée des arrivées et des départs. L'utilisateur recevra aussi une alerte
                        si le vol est annulé.
                    </p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#c4">
                        Que dois-je faire pour recevoir des alertes pour un vol ?</a>
                </h4>
            </div>
            <div id="c4" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>L'inscription au service Alertes SMS se fait directement dans le menu du site à l'onglet
                        "Alertes SMS" en sélectionnant le numéro du vol, en spécifiant le numéro de téléphone, et
                        en cliquant sur le bouton "M'inscrire". L'inscription est effective immédiatement.
                    </p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#c5">
                        Que dois-je faire pour annuler mon inscription à des alertes pour un vol ?</a>
                </h4>
            </div>
            <div id="c5" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>L'annulation du service Alertes SMS se fait directement dans le menu du site à l'onglet
                        "Alertes SMS" en sélectionnant le numéro du vol, en spécifiant le numéro de téléphone, et
                        en cliquant sur le bouton "Me désinscrire". L'annulation est effective immédiatement.
                    </p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#c6">
                        Qu'arrive t-il si je me trompe de numéro de vol ?</a>
                </h4>
            </div>
            <div id="c6" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>Le numéro de vol doit être conforme au format établi, à savoir le code de la société aérienne
                        suivi du numéro de vol (ex: ABC123). Si vous entrez un numéro de vol incorrect,
                        vous recevrez un message d'erreur.
                    </p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#c7">
                        Quel est le tarif d'utilisation du service d'envoi de messages par SMS ?</a>
                </h4>
            </div>
            <div id="c7" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>Le service Alertes SMS est fourni gratuitement par l'aéroport. Seuls les taux standards
                        de votre fournisseur de téléphonie cellulaire s'appliquent pour la réception des SMS.
                    </p>
                </div>
            </div>
        </div>




    </div>
</div>
</div>

<!-- FOOTER -->
<div id="pied"></div>
<div id="footer">
    &copy; OreoTeam. 2017 Oreoport Project. Tous droits réservés.
</div>

</body>
</html>
