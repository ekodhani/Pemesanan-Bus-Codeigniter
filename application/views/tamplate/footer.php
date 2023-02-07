	<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<!-- Sweet Alert JS -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		const flashdata = $('.flash-data').data('flashdata');

		if(flashdata) {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: flashdata,
			})
		}
		const flash = $('.flash-data-success').data('flashdata');

		if(flash) {
			Swal.fire({
				icon: 'success',
				title: 'Great',
				text: flash,
			})
		}
	</script>
	<!-- Optional JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	</body>

	</html> 