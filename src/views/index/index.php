<?php ?>
<div class=" main jtable">
<div id="OreoPortTableContainer" style="width: 1000px;">

</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
      var dep_arr = "depart";
        // todo :: Patrice Comment reload le tableau ??
        //Prepare jTable
      $("a.linkarrivee").click(function () {
        alert('Arrivee was clicked.')
        dep_arr ="arrivee"

      });

      $("a.linkdepart").click(function () {
        alert('Depart was clicked.')
      });

        $('#OreoPortTableContainer').jtable({
            title: 'OreoPort de Montréal',
            paging: true,
            pageSize:20,
            sorting: true,
            defaultSorting: 'heure_est_arrivee ASC',
            actions: {
                listAction: "flight/liste/" + dep_arr,
//                createAction: 'flight/create',
//                updateAction: 'flight/update',
//                deleteAction: 'flight/delete'

            },
            fields: {vols_details_id: {
                key: true,
                create: false,
                edit: false,
                list: false
            },
                num_vols: {
                    title: 'Vols',
                    width: '10%'
                },
                heure_est_depart:{
                    title: 'Heure départ',
                    width: '15%'
                },
                heure_est_arrivee: {
                    title: 'Heure arrivée',
                    width: '15%'
                },
                vol_status: {
                    title: 'Status',
                    width: '10%'
                },
                compagnie_nom: {
                    title: 'Compagnie',
                    width: '20%'
                },
                nom_ville: {
                    title: 'Ville orgine',
                    width: '25%',
                    create: false,
                    edit: false
                }
            }
        });

        $('#OreoPortTableContainer').jtable('load');
    });

</script>

