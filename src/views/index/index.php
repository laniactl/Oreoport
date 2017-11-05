<?php ?>
<div class=" main jtable">
<div id="OreoPortTableContainer" style="width: 1000px;">

</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        // todo :: Ici RACINE pour le tableau
        //Prepare jTable
        $('#OreoPortTableContainer').jtable({
            title: 'OreoPort de Montréal',
            paging: true,
            pageSize:20,
            sorting: true,
            defaultSorting: 'heure_est_arrivee ASC',
            actions: {
                listAction: 'flight/liste/depart',
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

