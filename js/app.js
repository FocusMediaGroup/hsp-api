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
var ReservationTitles = [];
function loadResources() {
  $.ajax('resources.json').done(function (data) {
    for (var key in data.resources) {
      Resources[data.resources[key].resourceId] = data.resources[key];
    }
  });
}

function loadReservations() {
  var $data = $.ajax({
    url: "data/reservations.json"
  }).done(function (data) {
    for (var key in data.reservations) {
      Reservations[key] = data.reservations[key];
    }
    for (var tkey in data.title) {
      ReservationTitles[tkey] = data.title[tkey];
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
function drawSearch() {
  if (!window.location.href.split('?')[0].endsWith('touch')) {
    window.location.href = 'touch';
  }
}

function search() {
  $content = $('#content');
  $content.append('<div class="search-loader"></div>');
  $search = $('#search-me').val().toUpperCase();
  var $data = $.ajax({
    url: 'searchAjax',
    data: {'search': $search}
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

$(function () {
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
  if (touch) {
    var drawInterval = setInterval(drawSearch, 10000); // 5 mins
  } else {
    var drawInterval = setInterval(drawPage, 300000); // 5 mins
//  var drawInterval = setInterval(drawPage, 5000); // 5 secs
  }

  //Iterater over reservations
  var activeInterval = setInterval(loopReservations(), 5000); // 5 secs

  var cron = setInterval(cronAction(), 5000); // 5 secs

  $('#search-me').keyboard({
    usePreview: false,
    autoAccept: true,
    autoAccept: true,
    accepted: search
  })
          .autocomplete({
            source: ReservationTitles,
            appendTo: "#results",
            select: function (event, ui) {
              $(this).data().keyboard.accept();
            },
            _renderMenu: function (ul, items) {
              var that = this;
              $.each(items, function (index, item) {
                that._renderItemData(ul, item);
              });
              $(ul).find("li:odd").addClass("odd");
              console.log('cool');
            }
          })
          .addAutocomplete({
            // add autocomplete window positioning
            // options here (using position utility)
            position: {
              of: '#results',
              my: 'center middle',
              at: 'center middle',
              collision: 'flip'
            }
          })
// activate the typing extension
          .addTyping({
            showTyping: true,
            delay: 250
          });
  $(".mat-input").focus(function () {
    $(this).parent().addClass("is-active is-completed");
  });
  $(".mat-input").focusout(function () {
    if ($(this).val() === "")
      $(this).parent().removeClass("is-completed");
    $(this).parent().removeClass("is-active");
  });
  $('#search').click(function () {
    $('#search-me').focus();
  });
});



