/* 
 * The following content was designed & implemented under AlexSeif.com
 */

function init() {
  // Prevent touch scroll
  document.body.addEventListener('touchmove', function (event) {
    event.preventDefault();
  }, false);
  attachButtons();
//  function clickIE() {
//    if (document.all) {  //document.all specific to Internet Explorer  
//      return false;
//    }
//  }
//  function clickAll(e) {
//    if (document.layers || (document.getElementById && !document.all)) {  //document.layers specific to Netscape
//      if (e.which == 2 || e.which == 3) {
//        return false;
//      }
//    }
//  }
//  if (document.layers) {
//    document.captureEvents(Event.MOUSEDOWN);
//    document.onmousedown = clickAll;
//  } else {
//    document.onmouseup = clickAll;
//    document.oncontextmenu = clickIE;
//  }
//
//  document.oncontextmenu = new Function("return false");
}

function attachButtons() {
  Waves.attach('.btn', ['waves-button']);
  Waves.init();

}

function clock() {
  var momentNow = moment();
  $('#fsdate').html(momentNow.format('dddd, MMMM Do YYYY'));
  $('#fshrmin').html(momentNow.format('h:mm'));
  $('#fssec').html(momentNow.format('ss'));
}

var Resources = [];
var Reservations = [];
function loadResources() {
  $.ajax('resources.json').done(function (data) {
    for (var key in data.resources) {
      Resources[data.resources[key].resourceId] = data.resources[key];
    }
  });
}

function loadReservations() {
  var $data = $.ajax({
    url: "reservations.json"
  }).done(function (data) {
    for (var key in data.reservations) {
      Reservations[key] = data.reservations[key];
    }
  });
}

function drawPage() {
  $content = $('#content');
  $content.append('<div class="loader"></div>');
  ajaxUrl = window.location.href.split('?')[0] + 'Ajax?' + window.location.href.split('?')[1];
  var $data = $.ajax({
    url: ajaxUrl
  }).done(function (data) {
    //TODO animate entrance
    $content.html(data);
    attachButtons();
  });
}

function loopReservations() {

}

function cronAction() {
  $.ajax('cron');
}

$(document).ready(function () {
  init();
  // Clock
  var clockInterval = setInterval(clock, 1000);

  // Keyboard
  $('#custom-search-input input').keyboard({
    theme: 'default',
    is_hidden: false,
//close_speed: 1000,
    enabled: false,
//layout: 'en_US',
// definimos un trigger al keyboard.
// Al hacer click sobre el selector que tenga el id (#) o la clase (.) definida
// se ocultara o mostrara el keyboard segun corresponda.
    trigger: '#buttom1'
  });

  // load Resources
  loadResources();

  //load Reservations
  loadReservations();

// Draw Reservations 
  var drawInterval = setInterval(drawPage, 300000); // 5 mins
//  var drawInterval = setInterval(drawPage, 5000); // 5 secs

  //Iterater over reservations
  var activeInterval = setInterval(loopReservations(), 5000); // 5 secs

  var cron = setInterval(cronAction(), 5000); // 5 secs

//  $("#search").autocomplete({
//    source: function (request, response) {
//      $.ajax({
//        url: "reservations",
//        dataType: "jsonp",
//        data: {
//          term: request.term
//        },
//        success: function (data) {
//          response(data);
//        }
//      });
//    },
//    minLength: 2,
//    select: function (event, ui) {
//      log("Selected: " + ui.item.value + " aka " + ui.item.id);
//    }
//  });
});



