import hotkeys from 'hotkeys-js';

// Admin Bar
hotkeys('`', () => {
  $.get("/adminbar", function(data, status) {
    if(data === "enabled" || data === "disabled") {
      if (status === "success") {
        location.reload();
      }
    }
  });
});

// Dark Mode
hotkeys('d+m', () => {
  $.get("/darkmode", function(data, status) {
    if(data === "enabled" || data === "disabled") {
      if (status === "success") {
        location.reload();
      }
    }
  });
});

// Go to home
hotkeys('g+h', () => {
  window.location.href = "/";
});

// Go to products
hotkeys('g+p', () => {
  window.location.href = "/products";
});

// Go to settings
hotkeys('g+s', () => {
  window.location.href = "/settings";
});
