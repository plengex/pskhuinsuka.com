<!doctype html>
<html class="no-js h-100" lang="en">
	<head>
        <?php $this->load->view("pengurus/_partials/head.php") ?>
    
    </head>
	<body class="h-100">
		<div class="container-fluid">
			<div class="row">
				<!-- sidebar -->
                <?php $this->load->view("pengurus/_partials/sidebar.php") ?>
				
                <!-- //sidebar -->

				<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
					<!-- navbar -->
                    <?php $this->load->view("pengurus/_partials/navbar.php") ?>

                    <!-- /navbar -->

					<div class="main-content-container container-fluid px-4">
						<!-- header -->
						<?php $this->load->view("pengurus/_partials/header.php") ?>

                        <!-- //header -->

						<!-- field -->
                        <div class="row">
                            <div class="col-md-12 text-right" style="margin-top: -62px;">
                                <a href="<?= base_url("pengurus/") ?>berita/tambah">
                                    <button type="button" class="btn btn-accent" id="tambah">
                                        <i class="far fa-file mr-1"></i>
                                        Tambah Berita
                                    </button>
                                </a>
                            </div><?php
                            if (!empty($data)) {
                                foreach ($data as $berita) { ?>

                            <div id="berita_<?= $berita['berita_id'] ?>" class="col-lg-4">
                                <div class="card card-small card-post mb-4">
                                    <a href="#<?= $berita['berita_judul'] ?>" class="text-muted mt-4 mb-2 mr-3 ml-3" onclick="sunting(`<?= $berita['berita_id'] ?>`, `<?= $berita['berita_judul'] ?>`)">
                                        <div class="text-justify">
                                            <h5 class="card-title"><?php  if (!empty($berita["berita_judul"])) {
                                                if (@strlen($berita["berita_judul"]) <= 38) {
                                                    echo $berita["berita_judul"];
                                                } else {
                                                    echo @substr($berita["berita_judul"], 0, 38)."...";
                                                }
                                            } else {
                                                echo "&nbsp;";
                                            } ?></h5>
                                        </div>
                                    </a>
                                    <div class="card-footer border-top d-flex">
                                        <div class="card-post__author d-flex">
                                            <span class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('<?= base_url("assets/")."gambar/keanggotaan/".(@is_file("../pskhuinsuka.com/assets/gambar/keanggotaan/".$berita["berita_penerbit"].".png") ? $berita["berita_penerbit"] : "_standar" ).".png" ?>');">Written by <?= $berita["keanggotaan_nama"] ?></span>
                                            <div class="d-flex flex-column justify-content-center ml-3">
                                                <span class="card-post__author-name"><?= $berita["keanggotaan_nama"] ?></span>
                                                <small class="text-muted"><?= $berita["divisi_keterangan"] ?></small>
                                            </div>
                                        </div>
                                        <div class="my-auto ml-auto">
                                            <span class="btn btn-sm btn-outline-danger" onclick="hapus(`<?= $berita['berita_id'] ?>`, `<?= $berita['berita_judul'] ?>`);">
                                                <i class="fas fa-trash-alt mr-1"></i>
                                                Hapus
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer border-top d-flex justify-content-center p-2">
                                        <div class="card-post__author d-flex">
                                            <div class="d-flex flex-column justify-content-center">
                                                <small class="text-muted">
                                                    <?= $berita["berita_keterangan_keterangan"]." &mdash; ".DateTime::createFromFormat("Y-m-d H:i:s", $berita["berita_waktu"])->format("d M Y (H:i:s ")."WIB)" ?>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><?php } } else { ?>

                            <div class="col-lg-12">
                                <div class="card card-small mb-4 text-center">
                                    <div class="m-4">
                                        <h6 class="m-0">Berita tidak ditemukan.</h6>
                                    </div>
                                </div>
                            </div><?php } ?>

                        </div>
						<!-- //field -->
						
                    </div>
                    
                    <!-- footer -->
                    <?php $this->load->view("pengurus/_partials/footer.php") ?>
					
                    <!-- //footer -->
				</main>
			</div>
        </div>

        <!-- javascript -->
        <?php $this->load->view("pengurus/_partials/javascript.php") ?>

        <script>
            var site_api = `<?= $api ?>`;

            function sunting(id, judul) {
                swal({
                    title: "Apakah anda yakin?",
                    text: "Anda akan menyunting data dari berita yang berjudul \""+judul+"\".",
                    icon: "warning",
                    buttons: true,
                })
                .then((yes) => {
                    if (yes) {
                        window.location.assign(`<?= base_url("pengurus/")."berita/" ?>`+id);
                    }
                });
            }

            function hapus(id, judul) {
                swal({
                    title: "Apakah anda yakin?",
                    text: "Setelah dihapus, anda tidak dapat memulihkan berita yang berjudul \""+judul+"\".",
                    icon: "warning",
					dangerMode: true,
                    buttons: [
                        true,
                        {
                            text: "Hapus",
                            closeModal: false,
                        }
                    ],
                })
                .then((yes) => {
                    if (yes) {
                        $.ajax({
					        url: site_api+"/berita/hapus/"+id,
                            dataType: "json",
                            type: "GET",
                            success: function(response) {
                                if (response.status === 200) {
                                    swal({
                                        title: "Berita Berhasil dihapus.",
                                        icon: "success",
                                        button: "Tutup"
                                    });

                                    $("#berita_"+id).remove();
                                } else {
                                    swal({
                                        title: "Berita gagal dihapus.",
                                        text: response.keterangan,
                                        icon: "error",
                                        button: "Tutup"
                                    });

                                    $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                        <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <i class="fa fa-info mx-2"></i>
                                        <strong>`+response.keterangan+`</strong>
                                    </div>`);
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
                                $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                    <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="fa fa-info mx-2"></i>
                                    <strong>`+keterangan+`</strong>
                                </div>`);
                            }
                        });
                    }
                });
            }
        </script>
        <!-- //javascript -->
	</body>
</html>