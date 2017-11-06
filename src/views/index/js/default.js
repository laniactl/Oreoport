$(document).ready(function () {
  var dep_arr = "depart";
  var i = 0;
  var j = 0;
  loadjTable(dep_arr);

  $("a.linkarrivee").click(function () {
    alert('Arrivee was clicked. i: ' + i )
    loadjTable(dep_arr);
    i++;
  });

  $("a.linkdepart").click(function () {
    alert('Depart was clicked. j: ' + j)
    loadjTable(dep_arr);
    j++;
  });

});

function loadjTable (depA) {
  //todo @passe la variabe arriver et depart afin de mettre le paramettre aproprier.
  var test = depA;
  var dep_arr = "depart";
  //Prepare jTable
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
}