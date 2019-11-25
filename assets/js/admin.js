$(document).ready(function () {
  $("#sidebar").mCustomScrollbar({
    theme: "minimal"
  });
$('#sidebarCollapse').on('click', function () {
  $('#sidebar, #content').toggleClass('active');
  $('.collapse.in').toggleClass('in');
  $('a[aria-expanded=true]').attr('aria-expanded', 'false');
  });
});

$("#KelolahTahapan").click(function(event) {
  event.preventDefault();
  $('#contentPage').load('Tahap');
});

$("#logoout").click(function(event) {
  event.preventDefault();
  $('#contentPage').load('logout');
});  