$(document).ready(function () {
  var depArr = "depart";

  var j = 0;

    var today = new Date();
    var tomorrow = new Date();

    // var dateObj = new Date();
    // var month = dateObj.getUTCMonth() + 1; //months from 1-12
    // var day = dateObj.getUTCDate();
    // var year = dateObj.getUTCFullYear();
    //
    // newdate = year + "/" + month + "/" + day;

  loadjTable(depArr, today);

  $("a.linkarrivee").click(function () {
    // $('jtable-column-header jtable-column-header-sortable').empty();
      $('#jtable').empty();
      alert('Arrivee was clicked. i: ' + j )
      depArr = "arrivee";
      loadjTable(depArr, today);
      j++;
  });

  $("a.linkdepart").click(function () {
      $('#jtable').empty();
      alert('Depart was clicked. j: ' + j)
      depArr = "depart";
      loadjTable(depArr, today);
      j++;
  });

  $(".linkToday").click(function () {
    alert('Aujourd hui was clicked. j: ' + j)

    loadjTable(depArr, today);
    j++;
    });

  $(".linkTomorrow").click(function () {
    alert('Tomorrow was clicked. j: ' + j)
    loadjTable(depArr, tomorrow);
    j++;
    });



});

function loadjTable (depArrivee, todayTomorrow) {
  //todo @passe la variabe arriver et depart afin de mettre le paramettre aproprier.
  var test = "depA";
  var dep_arr = depArrivee;
  var jour = todayTomorrow;

  //Prepare jTable
 if (depArrivee == "arrivee") {

     $('#OreoPortTableContainer').jtable({
         title: 'OreoPort de Montréal',
         paging: true,
         pageSize: 20,
         sorting: true,
         defaultSorting: 'heure_est_arrivee ASC',
         actions: {
             listAction: "flight/liste/" + dep_arr,
             //updateAction: 'ActionsOreoPortSorted.php?action=update',
//                createAction: 'flight/create',
             updateAction: 'flight/update',
//                deleteAction: 'flight/delete'

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
 }
 else{
  $('#OreoPortTableContainer').jtable({
     title: 'OreoPort de Montréal',
     paging: true,
     pageSize: 20,
     sorting: true,
     defaultSorting: 'heure_est_arrivee ASC',
     actions: {
         listAction: "flight/liste/" + dep_arr,
         //updateAction: 'ActionsOreoPortSorted.php?action=update',
//                createAction: 'flight/create',
         updateAction: 'flight/update',
//                deleteAction: 'flight/delete'

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
             title: 'Ville Destination',
             width: '25%',
             create: false,
             edit: false
         }
     }
 });

 }
  $('#OreoPortTableContainer').jtable('load');

}