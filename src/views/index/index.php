<?php ?>
<div id="OreoPortTableContainer" style="width: 1000px;">

</div>
<script type="text/javascript">

    $(document).ready(function () {
        // todo :: Ici RACINE pour le tableau
        //Prepare jTable
        $('#OreoPortTableContainer').jtable({
            title: 'OreoPort de Montréal',
            paging: true,
            pageSize: 4,
            sorting: true,
            defaultSorting: 'num_vols ASC',
            actions: {
                listAction: 'flight/liste',
                createAction: 'flight/create',
                updateAction: 'flight/update',
                deleteAction: 'flight/delete'
            },
            fields: {
                vols_details_id: {
                    key: true,
                    create: false,
                    edit: false,
                    list: false
                },
                num_vols: {
                    title: 'Vols',
                    width: '10%'
                },
                heure_est_depart: {
                    title: 'Heure de départ',
                    width: '20%'
                },
                heure_est_arrivee: {
                    title: 'Heure d arrivée',
                    width: '20%'
                },
                date_modified: {
                    title: 'modifier',
                    width: '5%'
                },
                vol_status: {
                    title: 'Status',
                    width: '5%'
                },
                date_created: {
                    title: 'Date crée',
                    width: '20%',
                    type: 'date',
                    create: false,
                    edit: false
                }
            }
        });
        //Load person list from server
        $('#OreoPortTableContainer').jtable('load');

    });

</script>

