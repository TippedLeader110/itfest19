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

$("#logoutadmin").click(function(event) {
  event.preventDefault();
  $('#contentPage').load('logout');
});

$("#kompetisiPage").click(function(event) {
  event.preventDefault();
  $('#contentPage').load('lomba');
});

$("#panitiaPage").click(function(event) {
  event.preventDefault();
  $('#contentPage').load('panitia');
});

$("#editAdmin").click(function(event) {
  event.preventDefault();
  $('#contentPage').load('Tahap');
});

$("#reSingkat").click(function(event) {
  event.preventDefault();
  $('#contentPage').load('reSingkat');
});

$("#reportTeam").click(function(event) {
  event.preventDefault();
  $('#contentPage').load('tim');
});

$('#logTim').click(function(event) {
  event.preventDefault();
  $('#contentPage').load('logTim');
});

$('#logPanitia').click(function(event) {
  event.preventDefault();
  $('#contentPage').load('logPanitia');
});
$('#validatedCustomFile').on('change',function(){
      var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    })