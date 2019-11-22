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

	$("#reportTahap").click(function(event) {
   		event.preventDefault();
   		$('#contentPage').load('reTahap');
   	});   
	$("#reportSingkat").click(function(event) {
   		event.preventDefault();
   		$('#contentPage').load('reSingkat');
   	});  

	$("#reportBerkas").click(function(event) {
   		event.preventDefault();
   		$('#contentPage').load('reBerkas');
   	});   

   	$("#daftarTim").click(function(event) {
   		event.preventDefault();
   		$('#contentPage').load('daftarTim');
   	});   