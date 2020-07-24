import hotkeys from 'hotkeys-js';

hotkeys('alt+c', function(event, handler) {
  $('.search-dropdown').hide();
});

// Admin Bar
hotkeys('`', function(event, handler) {
  $.get("/adminbar", function(data, status) {
    if(data === "enabled" || data === "disabled") {
      if (status === "success") {
        location.reload();
      }
    }
  });
});

// Dark Mode
hotkeys('d+m', function(event, handler) {
  $.get("/darkmode", function(data, status) {
    if(data === "enabled" || data === "disabled") {
      if (status === "success") {
        location.reload();
      }
    }
  });
});
