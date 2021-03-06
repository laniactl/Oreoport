(function ($) {
  $(document).ready(function () {
    var depArr = 'depart'
    var j = 0
    var reqDate = 'today'
    var ville = 'Ville orgine'
    // var dateObj = new Date();
    // var month = dateObj.getUTCMonth() + 1; //months from 1-12
    // var day = dateObj.getUTCDate();
    // var year = dateObj.getUTCFullYear();
    //
    // newdate = year + "/" + month + "/" + day;

    loadjTable(depArr, reqDate, ville)

    $('a.linkarrivee').click(function () {
      // $('jtable-column-header jtable-column-header-sortable').empty();
      $('#jtable').empty()
      $('.titre').text('État des vols en arrivée')
      // alert('Arrivee was clicked. i: ' + j );
      depArr = 'arrivee'
      loadjTable(depArr, reqDate, ville)
      j++
    })

    $('a.linkdepart').click(function () {
      $('#jtable').empty()
      $('.titre').text('État des vols en départ')
      // alert('Depart was clicked. j: ' + j);
      ville = 'Ville Destination'
      depArr = 'depart'
      loadjTable(depArr, reqDate, ville)
      j++
    })

    $('.linkToday').click(function () {
      // alert('Aujourd hui was clicked. j: ' + j);
      reqDate = 'today'
      $('#jtable').empty()
      loadjTable(depArr, reqDate, ville)
      j++
    })

    $('.linkTomorrow').click(function () {
      // alert('Tomorrow was clicked. j: ' + j);
      reqDate = 'tomorrow'
      $('#jtable').empty()
      loadjTable(depArr, reqDate, ville)
      j++
    })

    $('.SMS').click(function () {
      alert('SMS envoyer')
      // controllers/SMS.php

    })
    //

    $('#LoadRecordsButton').click(function (e) {
      e.preventDefault()
      $('#jtable').empty()
      $('#OreoPortTableContainer').jtable('load', {
        recherche: $('#recherche').val(),
        searchId: $('#searchId').val()
      })

      $('#inscription').click(function (e) {
        e.preventDefault()
        $_numvol = $('#numvol').val()
        $_smsPhone = $('#smsPhone').val()

        alert('SMS SAUVER ' + $_numvol)
      })

    })

    // $('#LoadRecordsButton').click(function () {
    // reqDate = "tomorrow";
    // recherche = "";
    // typeRecherche = "";
    // alert('Tomorrow was clicked. j: ' + j);
    // recherche: $('#recherche').val()
    // searchId: $('#searchId').val()
    // });
    // searchVol = $_
    // loadjTable(depArr, reqDate, ville);
    // j++;
    // });

  })

  function loadjTable (depArrivee, todayTomorrow, villeParameter) {
    //todo @passe la variabe arriver et depart afin de mettre le paramettre aproprier.
    var test = 'depA'
    var dep_arr = depArrivee
    var reqDate = todayTomorrow
    //Prepare jTable
    $('#OreoPortTableContainer').jtable({
      title: 'OreoPort de Montréal',
      paging: true,
      pageSize: 20,
      sorting: true,
      defaultSorting: 'heure_est_arrivee ASC',
      actions: {
        listAction: 'flight/liste/' + dep_arr + '/' + reqDate,
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
        date_depart: {
          title: 'date_depart',
          width: '15%',
          // options: {'M': 'Male', 'F': 'Female'},
          list: true,
          visibility: 'hidden' //Hide this column as default
        },
        date_arrivee: {
          title: 'date_arrivee',
          width: '15%',
          // options: {'M': 'Male', 'F': 'Female'},
          list: true,
          visibility: 'hidden' //Hide this column as default
        },
        nom_ville: {
          title: 'Ville',
          width: '25%',
          create: false,
          edit: false
        }
      }
    })

    $('#sendsms').click(function () {
      var form = $(document.forms['formsms'])
      var serializedata = form.serialize()

      $.post('http://localhost/oreoport/notify/newnotification/', serializedata, function (data) {
        console.log(data);
        if (data == true){
          alert('Votre vol a été enregistré vous serrez avisé des changements pour le vol ' + numerovol);
        }
        return false;
      },'json');

    });

    $('#cancelsms').click(function () {
      var form = $(document.forms['formsms'])
      var serializedata = form.serialize()

      $.post('http://localhost/oreoport/notify/cancelnotification/', serializedata, function (data) {
        console.log(data);
        if (data == true){
          alert('Votre enregistré pour être notifier pour le vol ' + numerovol + ' à été canceller');
        }
        return false;
      },'json');

    });

    $('#OreoPortTableContainer').jtable('load');

    $('#OreoPortTableContainer').jtable({
      recordsLoaded: function (event, data) {
        $('.jtable-data-row').click(function () {
          var row_id = $(this).attr('data-record-key')
          var record = $(this).data('record')
          console.log(record[1]);
          console.log(record);
          numerovol = record[1];
          var date = record[8];
          var status = record[4];

          $('#fieldVol').val(numerovol);
          $('#datevol').val(date);
          $('#idvoldetail').val(row_id);
          $('#statusvol').val(status);

        })
      }
    })
    //
    // var $selectedRows = $('#OreoPortTableContainer').jtable('selectedRows'),records = [];
    // $selectedRows.each(function () {
    //   var record = $(this).data('record');
    //   records.push(record);
    // });
    // console.log(records);
  }
})(jQuery)
