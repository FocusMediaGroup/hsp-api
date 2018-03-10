/* 
 * The following content was designed & implemented under AlexSeif.com
 */

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

function drawSummaryReservations() {
  $content = $('#content');
  $content.append('<div class="loader"></div>');
  var $data = $.ajax({
    url: "summaryAjax"
  }).done(function (data) {
    //TODO animate entrance
    $content.html(data);
  });
}

function loopReservations() {

}

$(document).ready(function () {
  // Clock
  var clockInterval = setInterval(clock, 1000);

  // Keyboard
  $('#custom-search-input input').keyboard({
//theme: 'default',
//is_hidden: false,
//close_speed: 1000,
//enabled: false,
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
  var drawInterval = setInterval(drawSummaryReservations, 300000);
//  var drawInterval = setInterval(drawSummaryReservations, 5000);

  //Iterater over reservations
  var activeInterval = setInterval(loopReservations(), 4000);
});



