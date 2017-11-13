## 420-B34-RO DÉVELOPPEMENT DES APPLICATIONS INFORMATIQUES 

#### Programmation orientée objets II et technologies web

#### Projet d'équipe - Horraires des vols d'un aréoport 

##### L'équipe 
1. Lania Trentin
2. Magali Marchand
3. Patrice Carle 
4. Racine Pilote


nous avons utiliser boostrap pour le css un plugin javascrip jTable pour affiche le table des vols
nous avons mit notre scipte pour la base de donne avec les données à l'intérieur du répertoire

la base de donnée utilisée est MySQL

* _./xscriptdb/creation/oreoport.sql_

###les instructions pour l'installation:

_Vous devez importer la db ***oreoport.sql*** dans une 
base de donné que vous nomerez oreoport._

installer le repertoire oreoport à la racine de votre serveur apache.
important afin que le site fonctionne adéquoitement assurez-vous que les fichiers
retourvez dans le repertoire /src/config/* sont bien configurer pour votre serveur 
apache et mysql.

***infoDatabase.php***
```
    <?php
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'oreoport');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
```
***paths.php***
```
    <?php
    define('URL','http://localhost/oreoport');
    
```
##Le lien pour load les vols et vols_details dans la db.
http://localhost/oreoport/loadflight/loadvols


ligne de commende pour tester dans la db
mysql -uroot -p --local-infile=1 oreoport

