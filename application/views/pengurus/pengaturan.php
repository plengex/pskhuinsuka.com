<!doctype html>
<html class="no-js h-100" lang="en">
	<head>
        <?php $this->load->view("pengurus/_partials/head.php") ?>
        <style>
            .switch {
                position: relative;
                display: block;
                vertical-align: top;
                width: 100px;
                height: 30px;
                padding: 3px;
                margin: 0 10px 10px 0;
                background: linear-gradient(to bottom, #eeeeee, #FFFFFF 25px);
                background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF 25px);
                border-radius: 18px;
                box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
                cursor: pointer;
            }

            .switch-input {
                position: absolute;
                top: 0;
                left: 0;
                opacity: 0;
                }
                .switch-label {
                position: relative;
                display: block;
                height: inherit;
                font-size: 10px;
                text-transform: uppercase;
                background: #eceeef;
                border-radius: inherit;
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
            }

            .switch-label:before, .switch-label:after {
                position: absolute;
                top: 50%;
                margin-top: -.5em;
                line-height: 1;
                -webkit-transition: inherit;
                -moz-transition: inherit;
                -o-transition: inherit;
                transition: inherit;
                }
                .switch-label:before {
                content: attr(data-off);
                right: 11px;
                color: #aaaaaa;
                text-shadow: 0 1px rgba(255, 255, 255, 0.5);
            }

            .switch-label:after {
                content: attr(data-on);
                left: 11px;
                color: #FFFFFF;
                text-shadow: 0 1px rgba(0, 0, 0, 0.2);
                opacity: 0;
            }

            .switch-input:checked ~ .switch-label {
                background: #0088cc;
                border-color: #0088cc;
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
            }

            .switch-input:checked ~ .switch-label:before {
                opacity: 0;
            }

            .switch-input:checked ~ .switch-label:after {
                opacity: 1;
            }

            .switch-handle {
                position: absolute;
                top: 4px;
                left: 4px;
                width: 28px;
                height: 28px;
                background: linear-gradient(to bottom, #FFFFFF 40%, #f0f0f0);
                background-image: -webkit-linear-gradient(top, #FFFFFF 40%, #f0f0f0);
                border-radius: 100%;
                box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
            }

            .switch-handle:before {
                content: "";
                position: absolute;
                top: 50%;
                left: 50%;
                margin: -6px 0 0 -6px;
                width: 12px;
                height: 12px;
                background: linear-gradient(to bottom, #eeeeee, #FFFFFF);
                background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF);
                border-radius: 6px;
                box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
            }

            .switch-input:checked ~ .switch-handle {
                left: 74px;
                box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
            }

            .switch-label, .switch-handle {
                transition: All 0.3s ease;
                -webkit-transition: All 0.3s ease;
                -moz-transition: All 0.3s ease;
                -o-transition: All 0.3s ease;
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
                            <div class="col-md-3">
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <h6 class="m-0">Tautan Pendaftaran</h6>
                                        <small>*Untuk mengaktifkan atau mematikan tautan pendaftaran.</small>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item p-3">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-row">
                                                        <div class="col-md-12 d-flex justify-content-center mt-1">
                                                            <label class="switch">
                                                            <input id="pendaftaran" class="switch-input" type="checkbox" <?= $data["pendaftaran"] == 1 ? "checked" : "" ?> />
                                                            <span class="switch-label" data-on="on" data-off="off"></span> 
                                                            <span class="switch-handle"></span> 
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <h6 class="m-0">Hapus Kepengurusan</h6>
                                        <small>*Hapus periode kepengurusan akan menghapus semua data pada periode yang dipilih. (keanggotaan, profil organisasi, artikel, dan berita)</small>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item p-3">
                                            <div class="row">
                                                <div class="col">
                                                    <form id="hapus-periode">
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                <label for="periode">Periode kepengurusan yang akan dihapus</label>
                                                                <div class="form-row text-center">
                                                                    <div class="col-md-7">
                                                                        <select id="periode" class="form-control">
                                                                            <option value="">Pilih...</option>
                                                                            <?php
                                                                                for ($i=0; $i<count($data["daftar_periode"]); $i++) {

                                                                                    echo "<option value=\"".$data["daftar_periode"][$i]["organisasi_periode"]."\">".@str_replace("-", "/", $data["daftar_periode"][$i]["organisasi_periode"])."</option>";
                                                                                } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <button type="button" class="col-md-12 btn btn-danger" id="hapus">
                                                                            <i class="fas fa-trash-alt mr-1"></i>
                                                                            Hapus Kepengurusan
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <div class="form-row">
                                            <div class="col-md-12 mt-2 mb-2">
                                                <h6 class="m-0">Ganti Kepengurusan</h6>
                                                <small>*Ganti kepengurusan akan memakan waktu yang lama, karena terjadi perubahan database yang sangat banyak.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item p-3">
                                            <div class="row">
                                                <div class="col">
                                                    <form id="ganti-periode">
                                                        <div class="form-row">
                                                            <div class="col-md-4">
                                                                <label for="periode_sekarang">Periode Sekarang</label>
                                                                <input type="text" class="form-control text-center" id="periode_sekarang" placeholder="Periode sekarang tidak ada." value="<?= !empty($data["periode"]) ? @str_replace("-", "/", $data["periode"]) : "" ?>" readonly>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <label>Periode Baru</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="number" class="form-control text-center" id="periode_baru_awal" placeholder="Tahun awal" aria-label="Tahun awal" aria-describedby="basic-addon1" value="">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">/</span>
                                                                    </div>
                                                                    <input type="number" class="form-control text-center" id="periode_baru_akhir" placeholder="Tahun akhir" aria-label="Tahun akhir" aria-describedby="basic-addon1" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="card-header border-bottom">
                                        <div class="form-row">
                                            <div class="col-md-12 mt-2 mb-2">
                                                <h6 class="m-0">Ketua Baru</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item p-3">
                                            <div class="row">
                                                <div class="col">
                                                    <form id="ganti-ketua">
                                                        <div class="form-group">
                                                            <label for="nama">Nama</label>
                                                            <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" value="">
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="username">Username</label>
                                                                <input type="text" class="form-control" id="username" placeholder="Username" value="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="password">Password</label>
                                                                <input type="password" class="form-control text-center" id="password" placeholder="Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-7">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control" id="email" placeholder="Email" value="">
                                                            </div>
                                                            <div class="form-group col-md-5">
                                                                <label for="telepon">Telepon</label>
                                                                <input type="text" class="form-control" id="telepon" placeholder="Telepon" value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="motto">Motto</label>
                                                            <textarea class="form-control" name="motto" id="motto" rows="2" placeholder="Motto."></textarea>
                                                        </div>
                                                        <div class="text-center pt-3 pb-3">
                                                            <button type="button" class="btn btn-danger col-md-12" id="renew">
                                                                <i class="material-icons mr-1">autorenew</i>
                                                                Ganti Kepenguruasan
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
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
                $("#pendaftaran").change(function () {
                    var pendaftaran = $("#pendaftaran").is(":checked") ? "1" : "0";
                    $.ajax({
                        url: site_api+"/pengaturan/pendaftaran",
                        dataType: "json",
                        type: "POST",
                        data : {
                            "periode": `<?= $data["periode"] ?>`,
                            "pendaftaran": pendaftaran
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

                                    $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                        <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <i class="fa fa-info mx-2"></i>
                                        <strong>`+keterangan+`</strong>
                                    </div>`);
                                }
                    })
                });

                $("#hapus").click(function () {
                    var periode = $("#periode option:selected").text();
                    swal({
                        title: "Apakah anda yakin?",
                        text: "Anda akan menghapus semua data yang pada berkaitan dengan periode "+periode+".",
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
                                url: site_api+"/pengaturan/hapus/"+$("#periode").val(),
                                dataType: "json",
                                type: "GET",
                                success: function(response) {
                                    if (response.status === 200) {
                                        swal({
                                            title: "Kepengurusan periode "+periode+" berhasil dihapus.",
                                            icon: "success",
                                            button: "Tutup"
                                        })
                                        .then((yes) => {
                                            if (periode === `<?= $pengguna["periode"] ?>`) {
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
                                            } else {
                                                $("#periode option:selected").remove();
                                            }
                                            
                                        });
                                    } else {
                                        swal({
                                            title: "Kepengurusan periode "+periode+" gagal dihapus.",
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

									swal({
										title: "Silahkan coba lagi!",
										text: keterangan,
										icon: "error",
										button: "Tutup"
									});

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

                $("#renew").click(function() {
                    var tahun_awal    = $("#periode_baru_awal").val();
                    var tahun_akhir   = $("#periode_baru_akhir").val();
                    var periode         = tahun_awal+"/"+tahun_akhir;

                    swal({
                        title: "Apakah anda yakin?",
                        text: "Anda akan ganti kepengurusan dari periode "+$("#periode_sekarang").val()+" ke "+periode+".",
                        icon: "warning",
                        dangerMode: true,
                        buttons: [
                            true,
                            {
                                text: "Ganti",
                                closeModal: false,
                            }
                        ],
                    })
                    .then((yes) => {
                        if (yes) {
                            $.ajax({
                                url: site_api+"/pengaturan/renew",
                                dataType: "json",
                                type: "POST",
                                data : {
                                    "periode_sekarang": $("#periode_sekarang").val(),
                                    "tahun_awal": tahun_awal,
                                    "tahun_akhir": tahun_akhir,
                                    "username": $("#username").val(),
                                    "password": $("#password").val(),
                                    "nama": $("#nama").val(),
                                    "email": $("#email").val(),
                                    "telepon": $("#telepon").val(),
                                    "motto": $("#motto").val(),
                                },
                                success: function(response) {
                                    if (response.status === 200) {
                                        swal({
                                            title: "Kepengurusan berhasil diganti ke periode "+periode+".",
                                            icon: "success",
                                            button: "Tutup"
                                        })
                                        .then((yes) => {
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
                                        });
                                    } else {
                                        swal({
                                            title: "Kepengurusan gagal diganti ke periode "+periode,
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

									swal({
										title: "Silahkan coba lagi!",
										text: keterangan,
										icon: "error",
										button: "Tutup"
									});

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

                $("#divisi").click(function() {
                    $("#jabatan").removeAttr("disabled");

                    $.ajax({
                        url: site_api+"/divisi/jabatan/"+$("#divisi").val(),
                        dataType: "json",
                        type: "GET",
                        success: function(response) {
                            if (response.status === 200) {
                                $("#jabatan").empty();
                                $("#jabatan").append(new Option("Pilih..."));
                                for (const index in response.keterangan) {
                                    var option = new Option(response.keterangan[index].jabatan_keterangan, response.keterangan[index].jabatan_x_jabatan);
                                    $("#jabatan").append(option);
                                }
                            } else {
                                swal({
                                    text: "Refresh halaman kembali.",
                                    text: response.keterangan,
                                    icon: "error",
                                    button: "Tutup"
                                })
                                .then((yes) => {
                                    location.reload();
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
                });
            });
        </script>
        <!-- //javascript -->
	</body>
</html>