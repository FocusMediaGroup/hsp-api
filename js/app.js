/* 
 * The following content was designed & implemented under AlexSeif.com
 */


$(document).ready(function () {
  var $colon = '';
  var momentNow = moment();
  var interval = setInterval(function () {
    $('#fsdate').html(momentNow.format('dddd, MMMM Do YYYY'));
    $('#fshrmin').html(momentNow.format('h:mm'));
    $('#fssec').html(momentNow.format('ss'));
  }, 1000);
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
});
function init() {
  // Get a reference to our touch-sensitive element
//    var touchzone = document.getElementById("touchzone");
  var touchzone = document;
  // Add an event handler for the touchstart event
  touchzone.addEventListener("touchstart", touchHandler, false);
}
function touchHandler(event) {
// Get a reference to our coordinates div
  var coords = document.getElementById("coords");
  // Write the coordinates of the touch to the div
  coords.innerHTML = 'x: ' + event.touches[0].pageX + ', y: ' + event.touches[0].pageY;
}
init();
var $resources = [];
$.ajax('resources.json').done(function (data) {
  for (var key in data.resources) {
    $resources[data.resources[key].resourceId] = data.resources[key];
  }
});

var $data = $.ajax({
  url: "reservations.json"
}).done(function (data) {
  $content = $('#content');

  for (var key in data.reservations) {
    $reservation = data.reservations[key];
    var $now = Date.now();
    var $startDate = new Date($reservation.startDate).getTime();
    if ($startDate > $now) {
      $content.append(
              '<div class="list-group-item bg-blue"><h2 class="list-group-item-heading">'
              + $reservation.title
              + '</h2><h3>'
              + $reservation.resourceName
              + '</h3><p class="list-group-item-text">'
              + $resources[$reservation.resourceId].name
              + $reservation.description
              + '</p></div>'
              );
    }
  }
});