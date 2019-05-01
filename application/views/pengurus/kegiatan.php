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
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="pengaturan_tanggal">Tanggal</label>
                                                <input type="text" class="form-control text-center" id="pengaturan_tanggal" name="pengaturan_tanggal" placeholder="Tanggal" value="">
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="pengaturan_nama">Nama</label>
                                                <input type="text" class="form-control" id="pengaturan_nama" name="pengaturan_nama" placeholder="Nama" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pengaturan_keterangan">Keterangan</label>
                                            <textarea class="form-control" id="pengaturan_keterangan" name="pengaturan_keterangan" placeholder="Keterangan"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <div class="form-row">
                                            <div class="<?= !empty($data["daftar_periode"]) ? "col-md-5" : "col-md-12" ?> d-flex align-items-center">
                                                <h6 class="m-0">Daftar Kegiatan</h6>
                                            </div><?php if (!empty($data["daftar_periode"])) { ?>
                                            <div class="col-md-3 d-flex align-items-center">
                                                <select id="periode" class="form-control">
                                                    <?php
                                                        for ($i=0; $i<count($data["daftar_periode"]); $i++) {
                                                            if ($i === count($data["daftar_periode"])-1) {
                                                                $selected = " selected";
                                                            }
                                                            else {
                                                                $selected = "";
                                                            }

                                                            echo "<option value=\"".$data["daftar_periode"][$i]["organisasi_periode"]."\"".$selected.">".@str_replace("-", "/", $data["daftar_periode"][$i]["organisasi_periode"])."</option>";
                                                        } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-center">
                                                <button type="button" class="btn btn-accent col-md-12" id="tambah">
                                                    <i class="far fa-calendar-plus mr-1"></i>
                                                    Tambah Kegiatan
                                                </button>
                                            </div><? } ?>

                                        </div>
                                    </div>
                                    <div class="card-body p-0 pb-3 text-center">
                                        <table class="table mb-0" id="table"<?= !empty($data["daftar"]) ? "" : " hidden" ?>>
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col" class="border-0">#</th>
                                                    <th scope="col" class="border-0">Tanggal</th>
                                                    <th scope="col" class="border-0">Nama</th>
                                                    <th scope="col" class="border-0">Pengaturan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody"><?php
                                            if (!empty($data["daftar"])) {
                                                $daftar = $data["daftar"];
                                                for ($i=0; $i<count($data["daftar"]); $i++) { ?>

                                                <tr id="<?= $daftar[$i]["kegiatan_id"] ?>">
                                                    <td><?= $i+1 ?></td>
                                                    <td><?= date("d/m/Y", strtotime($daftar[$i]["kegiatan_tanggal"])) ?></td>
                                                    <td><?= $daftar[$i]["kegiatan_nama"] ?></td>
                                                    <td class="text-nowrap">
                                                        <button type="button" onclick="sunting(`<?= $daftar[$i]['kegiatan_id'] ?>`);" class="btn btn-sm btn-outline-info mr-1">
                                                            <i class="fas fa-pencil-alt mr-1"></i>
                                                            Sunting
                                                        </button>
                                                        <button type="button" onclick="hapus(`<?= $daftar[$i]['kegiatan_id'] ?>`, `<?= $daftar[$i]['kegiatan_nama'] ?>`);" class="btn btn-sm btn-outline-danger mr-1">
                                                            <i class="fas fa-trash-alt mr-1"></i>
                                                            Hapus
                                                        </button>
                                                    </td>
                                                <tr><?php } } ?>

                                            </tbody>
                                        </table>

                                        <div id="keterangan" class="row"<?= !empty($data["daftar"]) ? " hidden" : "" ?>>
                                            <div class="col-md-12 text-center pt-4">
                                                <label>Daftar kegiatan tidak ditemukan.</label>
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
                $("#pengaturan_tanggal").datepicker({
                    format: "dd/mm/yyyy",
                    autoclose: true
                });

                $("#periode").change(function(){
                    var periode = $(this).find(":selected").attr("value");

                    if (periode === `<?= $data["daftar_periode"][count($data["daftar_periode"])-1]["organisasi_periode"]; ?>`) {
                        $("#tambah").removeAttr("disabled");
                    } else {
                        $("#tambah").attr("disabled", "true");
                    }

                    $.ajax({
                        url: site_api+"/kegiatan/"+periode,
                        dataType: "json",
                        type: "GET",
                        success: function(response) {
                            if (response.status === 200) {
                                $("#status").html(``);
                                $("#table").removeAttr("hidden");
                                $("#keterangan").attr("hidden", "true");
                                $("#tbody").html(``);

                                var kegiatan = response.keterangan;
                                for (const index in response.keterangan) {
                                    var nomor = parseInt(index)+parseInt(1);
                                    var date    = new Date(kegiatan[index].kegiatan_tanggal),
                                        year    = date.getFullYear(),
                                        month   = date.getMonth()+1 < 10 ? "0"+(Number(date.getMonth())+1) : date.getMonth()+1,
                                        day     = date.getDate()  < 10 ? "0"+date.getDate() : date.getDate(),
                                        tanggal = day+"/"+month+"/"+year;

                                    if (periode === `<?= $data["daftar_periode"][count($data["daftar_periode"])-1]["organisasi_periode"]; ?>`) {
                                        var tombol = `
                                            <button type="button" onclick="sunting(\``+kegiatan[index].kegiatan_id+`\`);" class="btn btn-sm btn-outline-info mr-1"><i class="fas fa-pencil-alt mr-1"></i> Sunting</button>
                                            <button type="button" onclick="hapus(\``+kegiatan[index].kegiatan_id+`\`, \``+kegiatan[index].kegiatan_nama+`\`);" class="btn btn-sm btn-outline-danger mr-1"><i class="fas fa-trash-alt mr-1"></i> Hapus</button>`;
                                    } else {
                                        var tombol = `&mdash;`;
                                    }

                                    $("#tbody").append(`<tr id="`+kegiatan[index].kegiatan_id+`">
                                        <td>`+nomor+`</td>
                                        <td>`+tanggal+`</td>
                                        <td>`+kegiatan[index].kegiatan_nama+`</td>
                                        <td class="text-nowrap">`+tombol+`</td>
                                    <tr>`);
                                }
                            } else {
                                $("#table").attr("hidden", "true");
                                $("#keterangan").removeAttr("hidden");
                            }
                        },
                        error: function (jqXHR, exception) {
                            $("#table").attr("hidden", "true");
                            $("#keterangan").removeAttr("hidden");

                            if (jqXHR.status === 0) {
                                keterangan = "Not connect (Verify Network).";
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
                });

                $("#tambah").click(function () {
                    $("input[id=pengaturan_tanggal]").val(`<?= date("d/m/Y") ?>`);
                    $("input[id=pengaturan_nama]").val("");
                    $("input[id=pengaturan_keterangan]").val("");

                    swal({
                        title: "Tambah Kegiatan",
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
                                url: site_api+"/kegiatan/tambah",
                                dataType: "json",
                                type: "POST",
                                data : {
                                    "periode":  $("#periode").val(),
                                    "tanggal": $("#pengaturan_tanggal").val(),
                                    "nama": $("#pengaturan_nama").val(),
                                    "keterangan": $("#pengaturan_keterangan").val()
                                },
                                success: function(response) {
                                    if (response.status === 200) {
                                        swal({
                                            title: "Kegiatan berhasil ditambahkan.",
                                            icon: "success",
                                            button: "Tutup"
                                        })
                                        .then((yes) => {
                                            location.reload();
                                        });
                                    } else {
                                        swal({
                                            title: "Kegiatan gagal ditambahkan.",
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
                $("input[id=pengaturan_tanggal]").val(`<?= date("d/m/Y") ?>`);
                $("input[id=pengaturan_nama]").val("");
                $("input[id=pengaturan_keterangan]").val("");

                $.ajax({
                    url: site_api+"/kegiatan/"+$("#periode").val()+"/"+id,
                    dataType: "json",
                    type: "GET",
                    success: function(response) {
                        if (response.status === 200) {
                            var kegiatan = response.keterangan;
                            $("input[id=pengaturan_tanggal]").val(kegiatan.tanggal);
                            $("input[id=pengaturan_nama]").val(kegiatan.nama);
                            $("textarea[id=pengaturan_keterangan]").val(kegiatan.keterangan);
                            
                            swal({
                                title: "Sunting Kegiatan",
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
                                        url: site_api+"/kegiatan/perbarui",
                                        dataType: "json",
                                        type: "POST",
                                        data : {
                                            "id":  id,
                                            "periode":  $("#periode").val(),
                                            "tanggal": $("#pengaturan_tanggal").val(),
                                            "nama": $("#pengaturan_nama").val(),
                                            "keterangan": $("#pengaturan_keterangan").val()
                                        },
                                        success: function(response) {
                                            if (response.status === 200) {
                                                swal({
                                                    title: "Kegiatan \""+$("#pengaturan_nama").val()+"\" berhasil diperbarui.",
                                                    icon: "success",
                                                    button: "Tutup"
                                                })
                                                .then((yes) => {
                                                    location.reload();
                                                });
                                            } else {
                                                swal({
                                                    title: "Kegiatan \""+$("#pengaturan_nama").val()+"\" gagal diperbarui.",
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
                    text: "Setelah dihapus, anda tidak dapat memulihkan kegiatan \""+nama+"\".",
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
					        url: site_api+"/kegiatan/hapus/"+id,
                            dataType: "json",
                            type: "GET",
                            success: function(response) {
                                if (response.status === 200) {
                                    swal({
                                        title: "Kegiatan \""+nama+"\" berhasil dihapus.",
                                        icon: "success",
                                        button: "Tutup"
                                    });

                                    $("#"+id).closest("tr").remove();
                                } else {
                                    swal({
                                        title: "Kegiatan \""+nama+"\" gagal dihapus.",
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