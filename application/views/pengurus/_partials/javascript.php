<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
		<script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
		<script src="<?= base_url("assets/pengurus/") ?>scripts/extras.1.1.0.min.js"></script>
		<script src="<?= base_url("assets/pengurus/") ?>scripts/shards-dashboards.1.1.0.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script>
			$(document).ready(function() {
				$("#keluar").click(function() {
					swal({
						icon: "warning",
						title: "Apakah anda yakin?",
						text: "Anda akan keluar dari sesi masuk.",
						dangerMode: true,
						buttons: [
							true,
							{
								text: "Keluar",
								closeModal: false,
							}
						],
					})
					.then((yes) => {
						if (yes) {
							$.ajax({
								url: `<?= $api ?>`+`/otentikasi/keluar`,
								dataType: "json",
								type: "GET",
								success: function(response) {
									if (response.status === 200) {
										window.location.assign(`<?= base_url("pengurus") ?>`);
									} else {
										swal({
											title: "Silahkan coba lagi!",
											text: response.keterangan,
											icon: "error",
											button: "Tutup"
										});
									}
								},
								error: function (jqXHR, exception) {
									if (jqXHR.status === 0) {
										keterangan = "Not connect (verify network).";
									} else if (jqXHR.status == 404) {
										keterangan = "Requested page not found.";
									} else if (jqXHR.status == 500) {
										keterangan = "Internal Server Error.";
									} else if (exception === "parsererror") {
										keterangan = "Requested JSON parse failed.";
									} else if (exception === "timeout") {
										keterangan = "Time out error.";
									} else if (exception === "abort") {
										keterangan = "Ajax request aborted.";
									} else {
										keterangan = "Uncaught Error ("+jqXHR.responseText+").";
									}
									swal({
										title: "Silahkan coba lagi!",
										text: keterangan,
										icon: "error",
										button: "Tutup"
									});
								}
							});
						}
					})
					.catch(err => {
						if (err) {
							swal("Oh noes!", "The AJAX request failed!", "error");
						} else {
							swal.stopLoading();
							swal.close();
						}
					});
				});
			});
		</script>