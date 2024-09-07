// Automatic button close when scroll or click
document.addEventListener('DOMContentLoaded', function() {
  var navLinks = document.querySelectorAll('.navbar-nav .nav-link');
  var offcanvasNavbar = document.getElementById('offcanvasNavbar');
  var offcanvasInstance = new bootstrap.Offcanvas(offcanvasNavbar);

  function closeOffcanvas() {
    offcanvasInstance.hide();
  }

  // Close offcanvas when a link is clicked
  navLinks.forEach(function(link) {
    link.addEventListener('click', closeOffcanvas);
  });

  // Close offcanvas when the screen is scrolled
  window.addEventListener('scroll', closeOffcanvas);
});

// JavaScript code to handle the click event of the "Let's Collaborate" button
document.getElementById('collaborateBtn').addEventListener('click', function() {
  // Open default email client with recipient email address pre-filled
  window.location.href = 'mailto:carbonitor@proton.me';
});