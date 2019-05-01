<!doctype html>
<html class="no-js h-100" lang="en">
	<head>
        <?php $this->load->view("pengurus/_partials/head.php") ?>

        <style type="text/css">
            .table td {
                vertical-align : middle;
            }

            tbody tr:hover {
                background-color: #fbfbfb;
                color: #007bff;
                box-shadow: inset .1875rem 0 0 #007bff;
                will-change: background-color,box-shadow,color;
                transition: box-shadow .2s ease,color .2s ease,background-color .2s ease;
            }

            .focus {
                background-color: #fbfbfb;
                color: #007bff;
                box-shadow: inset .1875rem 0 0 #007bff;
                will-change: background-color,box-shadow,color;
                transition: box-shadow .2s ease,color .2s ease,background-color .2s ease;
            }
        </style>
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
                            <div class="col">
                                <div hidden="true">
                                    <form id="form-pengaturan">
                                        <div class="form-group">
                                            <label for="pengaturan_nama">Nama</label>
                                            <input type="text" class="form-control" id="pengaturan_nama" name="pengaturan_nama" placeholder="Nama" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="pengaturan_tautan">Tautan</label>
                                            <textarea class="form-control" id="pengaturan_tautan" name="pengaturan_tautan" placeholder="Tautan | Contoh: https://google.com/search?q=azisalvriyanto"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <div class="form-row d-flex align-items-center">
                                            <div class="col-md-8">
                                                <h6 class="m-0">Daftar Berkas</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-accent col-md-12" id="tambah">
                                                    <i class="fas fa-link mr-1"></i>
                                                    Tambah Tautan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0 pb-3 text-center">
                                        <table class="table mb-0" id="table"<?= !empty($data["daftar"]) ? "" : " hidden" ?>>
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col" class="border-0">#</th>
                                                    <th scope="col" class="border-0">Nama</th>
                                                    <th scope="col" class="border-0">Pengaturan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody"><?php
                                            if (!empty($data["daftar"])) {
                                                $daftar = $data["daftar"];
                                                for ($i=0; $i<count($data["daftar"]); $i++) { ?>

                                                <tr id="<?= $daftar[$i]["berkas_id"] ?>">
                                                    <td><?= $i+1 ?></td>
                                                    <td><?= $daftar[$i]["berkas_nama"] ?></td>
                                                    <td class="text-nowrap">
                                                        <button type="button" onclick="sunting(`<?= $daftar[$i]['berkas_id'] ?>`);" class="btn btn-sm btn-outline-info mr-1">
                                                            <i class="fas fa-pencil-alt mr-1"></i>
                                                            Sunting
                                                        </button>
                                                        <button type="button" onclick="hapus(`<?= $daftar[$i]['berkas_id'] ?>`, `<?= $daftar[$i]['berkas_nama'] ?>`);" class="btn btn-sm btn-outline-danger mr-1">
                                                            <i class="fas fa-trash-alt mr-1"></i>
                                                            Hapus
                                                        </button>
                                                    </td>
                                                <tr><?php } } ?>

                                            </tbody>
                                        </table>

                                        <div id="keterangan" class="row"<?= !empty($data["daftar"]) ? " hidden" : "" ?>>
                                            <div class="col-md-12 text-center pt-4">
                                                <label>Daftar berkas tidak ditemukan.</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            
            $(document).ready(function() {
                $("#tambah").click(function () {
                    $("input[id=pengaturan_nama]").val("");
                    $("textarea[id=pengaturan_tautan]").val("");

                    swal({
                        title: "Tambah Tautan",
                        icon: "warning",
                        content: $("#form-pengaturan")[0],
                        buttons: [
                            true,
                            {
                                text: "Tambah",
                                closeModal: false,
                            }
                        ],
                    })
                    .then((yes) => {
                        if (yes) {
                            $.ajax({
                                url: site_api+"/berkas/tambah",
                                dataType: "json",
                                type: "POST",
                                data : {
                                    "nama": $("#pengaturan_nama").val(),
                                    "tautan": $("#pengaturan_tautan").val()
                                },
                                success: function(response) {
                                    if (response.status === 200) {
                                        swal({
                                            title: "Tautan berhasil ditambahkan.",
                                            icon: "success",
                                            button: "Tutup"
                                        })
                                        .then((yes) => {
                                            location.reload();
                                        });
                                    } else {
                                        swal({
                                            title: "Tautan gagal ditambahkan.",
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
                });
            });

            function sunting(id) {
                $("#"+id).addClass("focus");
                $("input[id=pengaturan_nama]").val("");
                $("textarea[id=pengaturan_tautan]").val("");

                $.ajax({
                    url: site_api+"/berkas/"+id,
                    dataType: "json",
                    type: "GET",
                    success: function(response) {
                        if (response.status === 200) {
                            var berkas = response.keterangan;
                            $("input[id=pengaturan_nama]").val(berkas.nama);
                            $("textarea[id=pengaturan_tautan]").val(berkas.tautan);
                            
                            swal({
                                title: "Sunting Tautan",
                                icon: "warning",
                                content: $("#form-pengaturan")[0],
                                buttons: [
                                    true,
                                    {
                                        text: "Simpan",
                                        closeModal: false,
                                    }
                                ],
                            })
                            .then((yes) => {
                                if (yes) {
                                    $.ajax({
                                        url: site_api+"/berkas/perbarui",
                                        dataType: "json",
                                        type: "POST",
                                        data : {
                                            "id":  id,
                                            "nama": $("#pengaturan_nama").val(),
                                            "tautan": $("#pengaturan_tautan").val()
                                        },
                                        success: function(response) {
                                            if (response.status === 200) {
                                                swal({
                                                    title: "Tautan \""+$("#pengaturan_nama").val()+"\" berhasil diperbarui.",
                                                    icon: "success",
                                                    button: "Tutup"
                                                })
                                                .then((yes) => {
                                                    location.reload();
                                                });
                                            } else {
                                                swal({
                                                    title: "Tautan \""+$("#pengaturan_nama").val()+"\" gagal diperbarui.",
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

                                $("#"+id).removeClass("focus");
                            });
                        } else {
                            $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="fa fa-info mx-2"></i>
                                <strong>`+response.keterangan+`</strong>
                            </div>`);

                            $("#"+id).removeClass("focus");
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
                        
                        $("#"+id).removeClass("focus");
                    }
                });
            }

            function hapus(id, nama) {
                $("#"+id).addClass("focus");

                swal({
                    title: "Apakah anda yakin?",
                    text: "Setelah dihapus, anda tidak dapat memulihkan tautan \""+nama+"\".",
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
					        url: site_api+"/berkas/hapus/"+id,
                            dataType: "json",
                            type: "GET",
                            success: function(response) {
                                if (response.status === 200) {
                                    swal({
                                        title: "Tautan \""+nama+"\" berhasil dihapus.",
                                        icon: "success",
                                        button: "Tutup"
                                    });

                                    $("#"+id).closest("tr").remove();
                                } else {
                                    swal({
                                        title: "Tautan \""+nama+"\" gagal dihapus.",
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

                                    $("#"+id).removeClass("focus");
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

                                $("#"+id).removeClass("focus");
                            }
                        });
                    }
                    else {
                        $("#"+id).removeClass("focus");
                    }
                });
            }
        </script>
        <!-- //javascript -->
	</body>
</html>