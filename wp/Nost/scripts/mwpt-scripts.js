jQuery(function ($) {

var currentPlayer = null,
    ratio = 9 / 16,
    contentWidth = $('#content_wrap').width(),
    width = Math.round(contentWidth),
    height = Math.round(contentWidth * ratio)

// HIDE BROWSER BAR ON LOAD
window.addEventListener('load', function () {
  setTimeout(function () {
    window.scrollTo(0, 1);
  }, 0);
});

// MAKE FIXED POSITIONING WORK ON MOBILE
$(document).bind("mobileinit", function () {
  $.support.touchOverflow = true;
  $.mobile.touchOverflowEnabled = true;
  $.mobile.fixedToolbars.setTouchToggleEnabled(false);
});

$("#accordion").accordion({
  collapsible: true,
  active: false,
  heightStyle: "content",
  activate: function (event, ui) {
    if (currentPlayer && ui.oldPanel.length && ui.oldPanel.length)
      currentPlayer.api('pause');
  }
});

$('.video').each(function () {
  var player = $f(this),
      $this = $(this);
/*
  $this.prop({
    width: width,
    height: height
  });
*/

  player.addEvent('ready', function () {
    player.addEvent('play', function () {
      currentPlayer = player;
    });
  });
});

});