require('./bootstrap');
const Turbolinks = require("turbolinks");
import {isInViewport} from "observe-element-in-viewport";

Turbolinks.start();

$(document).ready(function() {
  (async () => {
    const target = document.querySelector('#load-more')
    if (await isInViewport(target)) {
      $("#load-more").click();
      $("#load-more").html("Loading");
      $("#load-more").prop('disabled', true);
    }
  })();
});

$(window).scroll(function() {
  if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
    $("#load-more").click();
    $("#load-more").html("Loading");
    $("#load-more").prop('disabled', true);
  }
});

// Hide Search Dropdown

$(document).on('keydown', function (e) {
  if (e.keyCode === 27) { // ESC
    $('.search-dropdown').hide();
  }
});

$("input").blur(function(){
  $('.search-dropdown').hide();
});

// Admin Bar

$(document).on('keydown', function (e) {
  if (e.keyCode === 192) { // Backtick
    $.get("/adminbar", function(data, status) {
      if(data === "enabled" || data === "disabled") {
        if (status === "success") {
          location.reload();
        }
      }
    });
  }
});
