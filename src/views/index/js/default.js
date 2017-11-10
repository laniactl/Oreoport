$(document).ready(function () {
  var depArr = "depart";

  var j = 0;
    var reqDate = "today";
    var ville = "Ville orgine";

  loadjTable(depArr, reqDate, ville);

    $("a.linkarrivee").click(function () {
    // $('jtable-column-header jtable-column-header-sortable').empty();
      $('#jtable').empty();
      $('.titre').text("État des vols en arrivée");
      // alert('Arrivee was clicked. i: ' + j );
      depArr = "arrivee";
      loadjTable(depArr, reqDate, ville);
      j++;
    });

    $("a.linkdepart").click(function () {
      $('#jtable').empty();
      $('.titre').text("État des vols en départ");
      // alert('Depart was clicked. j: ' + j);
      ville = "Ville Destination";
      depArr = "depart";
      loadjTable(depArr, reqDate, ville);
      j++;
     });

    $(".linkToday").click(function () {
    // alert('Aujourd hui was clicked. j: ' + j);
      reqDate = "today";
    loadjTable(depArr, reqDate, ville);
    j++;
    });

    $(".linkTomorrow").click(function () {
    // alert('Tomorrow was clicked. j: ' + j);
      reqDate = "tomorrow";
      loadjTable(depArr, reqDate, ville);
    j++;
    });
    //
    $('#LoadRecordsButton').click(function () {
        reqDate = "tomorrow";
        recherche = "";
        typeRecherche = "";
        $.get("index.php",{paramOne :recherche, paramTwo : typeRecherche }, function () {
            alert(recherche);
        });
        // searchVol = $_
        // loadjTable(depArr, reqDate, ville);
        // j++;
    });

});

function loadjTable (depArrivee, todayTomorrow, villeParameter) {
  //todo @passe la variabe arriver et depart afin de mettre le paramettre aproprier.
  var test = "depA";
  var dep_arr = depArrivee;
  var reqDate = todayTomorrow;
  //Prepare jTable
     $('#OreoPortTableContainer').jtable({
         title: 'OreoPort de Montréal',
         paging: true,
         pageSize: 20,
         sorting: true,
         defaultSorting: 'heure_est_arrivee ASC',
         actions: {
             listAction: "flight/liste/" + dep_arr +"/"+reqDate,
             //updateAction: 'ActionsOreoPortSorted.php?action=update',
//             createAction: 'flight/create',
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
                 title: 'Ville',
                 width: '25%',
                 create: false,
                 edit: false
             }
         }
 });

  $('#OreoPortTableContainer').jtable('load');

}