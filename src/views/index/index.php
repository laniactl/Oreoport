<?php ?>
<div class=" main jtable">

    <button type="button" class="btn btn-secondary btn-lg linkToday" >Aujourd'hui </button>
    <button type="button" class="btn btn-secondary btn-lg linkTomorrow" >Demain  </button>
    <button type="button" class="btn btn-secondary btn-lg SMS" >SMS test  </button>

    <div class="filtering">
            <form>
                Rechercher: <input type="text" name="recherche" id="recherche" />
                dans:<select id="searchId" name="searchId">
                    <option selected="selected" value="num_vols">vols</option>
                    <option value="nom_ville">Villes</option>
                    <option value="compagnie_nom">Compagnies</option>
                </select>
                <button type="submit" id="LoadRecordsBut">Load records</button>
            </form>
    </div>
    <div id="OreoPortTableContainer" style="width: 1000px;">

</div>
</div>


