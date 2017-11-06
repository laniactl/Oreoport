$(document).ready(function () {
  var depArr = "depart";
  var today = "today";
  var j = 0;
  loadjTable(depArr, today);

  $("a.linkarrivee").click(function () {
    alert('Arrivee was clicked. i: ' + i )
    loadjTable(depArr, today);
    i++;
  });

  $("a.linkdepart").click(function () {
    alert('Depart was clicked. j: ' + j)
    loadjTable(depArr, today);
    j++;
  });

});

function loadjTable (depArrivee, todayTomorrow) {
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
        updateAction: 'ActionsOreoPortSorted.php?action=update',
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