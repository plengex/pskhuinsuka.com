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
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <div class="form-row d-flex align-items-center">
                                            <div class="<?= !empty($data["daftar_periode"]) ? "col-md-5" : "col-md-12" ?>">
                                                <h6 class="m-0">Daftar Anggota</h6>
                                            </div><?php if (!empty($data["daftar_periode"])) { ?>
                                            <div class="col-md-3">
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
                                            <div class="col-md-4">
                                                <a href="<?= base_url("pengurus/") ?>keanggotaan/tambah">
                                                    <button type="button" class="btn btn-accent col-md-12" id="tambah">
                                                        <i class="fas fa-user-plus mr-1"></i>
                                                        Tambah Anggota
                                                    </button>
                                                </a>
                                            </div><? } ?>

                                        </div>
                                    </div>
                                    <div class="card-body p-0 pb-3 text-center">
                                        <table class="table mb-0" id="table"<?= !empty($data["daftar"]) ? "" : " hidden" ?>>
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col" class="border-0">#</th>
                                                    <th scope="col" class="border-0">Keterangan</th>
                                                    <th scope="col" class="border-0">Nama Lengkap</th>
                                                    <th scope="col" class="border-0">Bidang</th>
                                                    <th scope="col" class="border-0">Jabatan</th>
                                                    <th scope="col" class="border-0">Telepon</th>
                                                    <th scope="col" class="border-0">Pengaturan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody"><?php
                                            if (!empty($data["daftar"])) {
                                                $daftar = $data["daftar"];
                                                for ($i=0; $i<count($data["daftar"]); $i++) {
                                                    if ($daftar[$i]["akun_keterangan"] === "1") {
                                                        $keterangan = "Aktif";
                                                    } else {
                                                        $keterangan = "Tidak aktif";
                                                    } ?>

                                                <tr id="<?= $daftar[$i]["keanggotaan_username"] ?>">
                                                    <td><?= $i+1 ?></td>
                                                    <td><?= $keterangan ?></td>
                                                    <td><?= $daftar[$i]["keanggotaan_nama"] ?></td>
                                                    <td><?= $daftar[$i]["divisi_keterangan"] ?></td>
                                                    <td><?= $daftar[$i]["jabatan_keterangan"] ?></td>
                                                    <td><?= $daftar[$i]["keanggotaan_telepon"] ?></td>
                                                    <td class="text-nowrap">
                                                        <button type="button" onclick="sunting(`<?= $daftar[$i]['keanggotaan_username'] ?>`, `<?= $daftar[$i]['keanggotaan_nama'] ?>`);" class="btn btn-sm btn-outline-info mr-1">
                                                            <i class="fas fa-pencil-alt mr-1"></i>
                                                            Sunting
                                                        </button>
                                                        <button type="button" onclick="hapus(`<?= $daftar[$i]['keanggotaan_username'] ?>`, `<?= $daftar[$i]['keanggotaan_nama'] ?>`);" class="btn btn-sm btn-outline-danger mr-1">
                                                            <i class="fas fa-trash-alt mr-1"></i>
                                                            Hapus
                                                        </button>
                                                    </td>
                                                <tr><?php } } ?>

                                            </tbody>
                                        </table>

                                        <div id="keterangan" class="row"<?= !empty($data["daftar"]) ? " hidden" : "" ?>>
                                            <div class="col-md-12 text-center pt-4">
                                                <label>Daftar anggota tidak ditemukan.</label>
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
                $("#periode").change(function(){
                    var periode = $(this).find(":selected").attr("value");
                    $.ajax({
                        url: site_api+"/keanggotaan/"+periode,
                        dataType: "json",
                        type: "GET",
                        success: function(response) {
                            if (response.status === 200) {
                                $("#status").html(``);
                                $("#table").removeAttr("hidden");
                                $("#keterangan").attr("hidden", "true");
                                $("#tbody").html(``);

                                var data = response.keterangan;
                                for (const index in response.keterangan) {
                                    var nomor = parseInt(index)+parseInt(1);
                                    if (data[index].jabatan_keterangan === "1") {
                                        var keterangan = "Aktif";
                                    } else {
                                        var keterangan = "Tidak aktif";
                                    }

                                    $("#tbody").append(`<tr id="`+data[index].keanggotaan_username+`">
                                                    <td>`+nomor+`</td>
                                                    <td>`+keterangan+`</td>
                                                    <td>`+data[index].keanggotaan_nama+`</td>
                                                    <td>`+data[index].divisi_keterangan+`</td>
                                                    <td>`+data[index].jabatan_keterangan+`</td>
                                                    <td>`+data[index].keanggotaan_telepon+`</td>
                                                    <td class="text-nowrap">
                                                        <button type="button" onclick="sunting(\``+data[index].keanggotaan_username+`\`, \``+data[index].keanggotaan_nama+`\`);" class="btn btn-sm btn-outline-info mr-1"><i class="fas fa-pencil-alt mr-1"></i> Sunting</button>
                                                        <button type="button" onclick="hapus(\``+data[index].keanggotaan_username+`\`, \``+data[index].keanggotaan_nama+`\`);" class="btn btn-sm btn-outline-danger mr-1"><i class="fas fa-trash-alt mr-1"></i> Hapus</button>
                                                    </td>
                                                <tr>`);
                                }
                            } else {
                                $("#table").attr("hidden", "true");
                                $("#keterangan").removeAttr("hidden");

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
            });

            function sunting(username, nama) {
                $("#"+username).addClass("focus");

                swal({
                    title: "Apakah anda yakin?",
                    text: "Anda akan menyunting profil dari \""+nama+"\".",
                    icon: "warning",
                    buttons: true,
                })
                .then((yes) => {
                    if (yes) {
                        window.location.assign(`<?= base_url("pengurus/")."keanggotaan/" ?>`+username);
                    }
                    else {
                        $("#"+username).removeClass("focus");
                    }
                });
            }

            function hapus(username, nama) {
                $("#"+username).addClass("focus");

                swal({
                    title: "Apakah anda yakin?",
                    text: "Setelah dihapus, anda tidak dapat memulihkan profil dari \""+nama+"\".",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((yes) => {
                    if (yes) {
                        $.ajax({
					        url: site_api+"/keanggotaan/hapus/"+username,
                            dataType: "json",
                            type: "GET",
                            success: function(response) {
                                if (response.status === 200) {
                                    swal({
                                        title: "Data berhasil dihapus.",
                                        icon: "success",
                                        button: "Tutup"
                                    });

                                    $("#"+username).closest("tr").remove();
                                } else {
                                    swal({
                                        title: "Data gagal dihapus.",
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

                                    $("#"+username).removeClass("focus");
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

                                $("#"+username).removeClass("focus");
                            }
                        });
                    }
                    else {
                        $("#"+username).removeClass("focus");
                    }
                });
            }
        </script>
        <!-- //javascript -->
	</body>
</html>