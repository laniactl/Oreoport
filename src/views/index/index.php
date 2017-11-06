<?php ?>
<div class=" main jtable">
    <?php
    $today = date("Y-m-d");
    $tomorrow = date("Y-m-d", time() + 86400);
    echo $today;
    echo $tomorrow;
    ?>
    <input type="button" class="btn btn-secondary btn-lg" value="Aujourd'hui" > </input>
    <input type="button" class="btn btn-secondary btn-lg" value="Demain" >  </input>
    <div id="OreoPortTableContainer" style="width: 1000px;">

</div>
</div>


