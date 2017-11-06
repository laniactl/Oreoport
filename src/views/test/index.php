<hr />
Ceci est la page de test 2 !
<?php
    if (isset($this->arrayV)){
        $_arrayVols = $this->arrayV;
        $pata =123;
        foreach ($_arrayVols as $key) {
            echo "<div>" . $key ['vols_id'] . "</div>";
        }
    }
?>

