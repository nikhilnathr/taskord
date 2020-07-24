require('./bootstrap');
require('./shortcuts');
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

$("input").blur(function(){
  $('.search-dropdown').hide();
});

// Admin Bar

$("#admin-bar-click").click(function() {
  $.get("/adminbar", function(data, status) {
    if(data === "enabled" || data === "disabled") {
      if (status === "success") {
        location.reload();
      }
    }
  });
});
 
// Enable Tooltips

$(document).off().on('ready turbolinks:load',function(){
  $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
