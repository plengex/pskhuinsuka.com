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
						<div class="row"><?php if ($menu["judul"] !== "Profil") { ?>
                                                        
                            <div class="col-md-12 text-right" style="margin-top: -62px;">
                                <button type="button" class="btn btn-info" id="kembali">
                                    <i class="fas fa-arrow-left mr-1"></i>
                                    Kembali
                                </button>
                            </div><?php } ?>
                            <div class="col-lg-4">
                                <div class="card card-small mb-4 pt-3">
                                    <form id="form">
                                        <div class="card-header border-bottom text-center">
                                            <div class="mb-3 mx-auto">
                                                <img id="foto_pratinjau" class="rounded-circle" src="<?= base_url().(@is_file("../pskhuinsuka.com/".$data["foto"]) ? $data["foto"] : "assets/gambar/keanggotaan/_standar.png" ) ?>" alt="Foto Profil" width="110" height="110">
                                                <input type="file" id="foto" name="foto" class="btn btn-secondary col-md-12 mt-2">
                                            </div>
                                            <h4 id="tampil_nama" class="mb-0"><?= !empty($data["periode"]) ? $data["nama"] : "{ Nama }" ?></h4>
                                            <span class="text-muted d-block mb-2">
                                                <span id="tampil_divisi"><?= !empty($data["periode"]) ? ucwords($data["divisi"]) : "{ Divisi }" ?></span>
                                                (<span id="tampil_jabatan"><?= !empty($data["periode"]) ? ucwords($data["jabatan"]) : "{ Jabatan }" ?></span>)
                                            </span>
                                        </div>
                                    </form>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-4">
                                        <div class="progress-wrapper">
                                            <span id="tampil_motto"><?= !empty($data["periode"]) ? $data["motto"] : "{ Tidak ada motto. }" ?></span>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Detail Akun</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-3">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-row"><?php if ($menu["judul"] === "Keanggotaan") { ?>

                                                    <div class="form-group col-md-3">
                                                        <label for="keterangan">Keterangan</label>
                                                        <select id="keterangan" class="form-control">
                                                            <?php
                                                                if ($data["keterangan"] === NULL) {
                                                                    echo "<option value=\"\" selected>Pilih...</option>";
                                                                    $data["keterangan"] = "";
                                                                } ?>

                                                            <option value="1"<?= $data["keterangan"] !== NULL && $data["keterangan"] === "1" ? " selected" : "" ?>>Aktif</option>
                                                            <option value="0"<?= $data["keterangan"] !== NULL && $data["keterangan"] === "0" ? " selected" : "" ?>>Tidak Aktif</option>
                                                        </select>
                                                    </div><?php } ?>

                                                    <div class="form-group col-md-3">
                                                        <label for="periode">Periode</label>
                                                        <select id="periode" class="form-control"> <?php
                                                            if (empty($data["periode"])) {
                                                                echo "<option value=\"\" selected>Pilih...</option>";
                                                            }
                                                            
                                                            if (!empty($data["daftar_periode"])) {
                                                                for ($i=0; $i<count($data["daftar_periode"]); $i++) {
                                                                    if (!empty($data["periode"] && $data["periode"] === $data["daftar_periode"][$i]["organisasi_periode"])) {
                                                                        $selected = " selected";
                                                                    }
                                                                    else {
                                                                        $selected = "";
                                                                    } ?>

                                                                <option value="<?= $data["daftar_periode"][$i]["organisasi_periode"] ?>"<?= $selected ?>><?= @str_replace("-", "/", $data["daftar_periode"][$i]["organisasi_periode"]) ?></option><?php
                                                                } 
                                                            } ?>

                                                        </select>
                                                    </div>
                                                    <div class="form-group <?= $menu["judul"] === "Keanggotaan" ? "col-md-6" : "col-md-9" ?>">
                                                        <label for="nama">Nama</label>
                                                        <input type="text" class="form-control" id="nama" placeholder="Nama" value="<?= !empty($data["periode"]) ? $data["nama"] : "" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="username">Username</label>
                                                        <div class="input-group input-group-seamless">
                                                            <span class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="material-icons">person</i>
                                                                </span>
                                                            </span>
                                                            <input type="text" class="form-control" id="username" placeholder="Username" value="<?= !empty($data["periode"]) ? $data["username"] : "" ?>" <?= !empty($data["periode"]) ? "onclick=\"ubah_username()\" readonly" : "" ?>>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="password">Password</label>
                                                        <div class="input-group input-group-seamless">
                                                            <input type="password" class="form-control <?= !empty($data["periode"]) ? "text-center": "" ?>" id="password" <?= !empty($data["periode"]) ? "placeholder=\"Ubah password\" onclick=\"ubah_password()\" readonly" : "placeholder=\"Password\" value=\"\"" ?>>
                                                            <span class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="material-icons">lock</i>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="divisi">Divisi</label>
                                                        <select id="divisi" class="form-control"<?= 
                                                                    ($pengguna["divisi"] === "1" && ($pengguna["jabatan"] === "1" || $pengguna["jabatan"] === "2")) ? "" : " disabled"?>>
                                                            <?php
                                                                if (empty($data["periode"])) {
                                                                    echo "<option value=\"\" selected>Pilih...</option>";
                                                                }

                                                                if (!empty($data["daftar_periode"])) {
                                                                    for ($i=0; $i<count($data["daftar_divisi"]) ; $i++) {
                                                                        if ($menu["judul_sub"] !== "Tambah") {
                                                                            if ($data["divisi"] === $data["daftar_divisi"][$i]["divisi_keterangan"] && !empty($data["divisi"])) {
                                                                                $selected = " selected";
                                                                            }
                                                                            else {
                                                                                $selected = "";
                                                                            }
                                                                        } ?>

                                                            <option value="<?= $data["daftar_divisi"][$i]["divisi_id"] ?>" <?= $selected ?>><?= $data["daftar_divisi"][$i]["divisi_keterangan"] ?></option><?php } } ?>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="jabatan">Jabatan</label>
                                                        <select id="jabatan" class="form-control" disabled>
                                                            <?
                                                                if (!empty($data["periode"])) {
                                                                    echo "<option value=\"".$data["jabatan_x"]."\">".$data["jabatan"]."</option>";
                                                                } else {
                                                                    echo "<option value=\"\">Pilih...</option>";
                                                                }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-7">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Email" value="<?= !empty($data["periode"]) ? $data["email"] : "" ?>">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="telepon">Telepon</label>
                                                        <input type="text" class="form-control" id="telepon" placeholder="Telepon" value="<?= !empty($data["periode"]) ? $data["telepon"] : "" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="motto">Motto</label>
                                                    <textarea class="form-control" name="motto" id="motto" rows="2" placeholder="Motto."><?= !empty($data["periode"]) ? $data["motto"] : "" ?></textarea>
                                                </div>
                                                <div class="form-row pt-3">
                                                    <div class="form-group <?= $menu["judul_sub"] === "Tambah" ? "col-md-12" : " col-md-6" ?> text-center">
                                                        <button type="button" class="btn btn-accent<?= $menu["judul_sub"] === "Tambah" ? " col-md-12" : "" ?>" id="<?= !empty($data["periode"]) || $menu["judul"] === "Profil" ? "perbarui" : "tambah" ?>"><?= !empty($data["periode"]) || $menu["judul"] === "Profil" ? "<i class=\"far fa-save mr-1\"></i> Perbarui Profil" : "<i class=\"fas fa-user-plus mr-1\"></i> Tambah Profil" ?></button>
                                                    </div>
                                                    <?php
                                                        if (!empty($data["periode"])) {
                                                            echo "<div class=\"form-group col-md-6 text-center\">
                                                        <button type=\"button\" class=\"btn btn-danger\" id=\"hapus\"><i class=\"fas fa-trash-alt mr-1\"></i> Hapus Profil</button>
                                                    </div>";
                                                        } else {
                                                            echo "";
                                                        }
                                                    ?>

                                                </div>
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
                function pratinjau(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $("#foto_pratinjau").attr("src", e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#foto").change(function() {
                    pratinjau(this);
                });

                $("#nama").keyup(function() {
                    if ($("#nama").val() !== "") {
                        var nama = $("#nama").val();
                    } else {
                        var nama = "{ Nama }";
                    }

                    $("#tampil_nama").html(nama);
                });

                $("#motto").keyup(function() {
                    if ($("#motto").val() !== "") {
                        var motto = $("#motto").val();
                    } else {
                        var motto = "{ Tidak ada motto. }";
                    }

                    $("#tampil_motto").html(motto);
                });

                $("#divisi").change(function() {
                    if ($("#divisi").val() !== "") {
                        var divisi = $("#divisi option:selected").text();
                    } else {
                        var divisi = "{ Divisi }";
                    }

                    $("#tampil_divisi").html(divisi);
                });

                $("#jabatan").change(function() {
                    if ($("#jabatan").val() !== "") {
                        var jabatan = $("#jabatan option:selected").text();
                    } else {
                        var jabatan = "{ Jabatan }";
                    }

                    $("#tampil_jabatan").html(jabatan);
                });

                $("#tambah").click(function() {
                    var form = new FormData($("#form")[0]);
                    form.append("keterangan", keterangan);
                    form.append("periode", $("#periode").val());
                    form.append("username", $("#username").val());
                    form.append("password", $("#password").val());
                    form.append("nama", $("#nama").val());
                    form.append("divisi", $("#divisi").val());
                    form.append("jabatan", $("#jabatan").val());
                    form.append("email", $("#email").val());
                    form.append("telepon", $("#telepon").val());
                    form.append("motto", $("#motto").val());

                    $.ajax({
                        url: site_api+"/keanggotaan/tambah",
                        dataType: "json",
                        type: "POST",
                        data : form,
                        contentType: false,
                        processData: false,
                        beforeSend: function (e) {
                            $("#tambah").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Sedang melakukan penambahan...");
                        },
                        success: function(response) {
                            $("#tambah").html("<i class=\"fas fa-user-plus mr-1\"></i> Tambah Profil");

                            if (response.status === 200) {
                                swal({
                                    title: "Profil berhasil ditambahkan.",
                                    icon: "success",
                                    button: "Tutup",
                                })
                                .then((value) => {
                                    window.location.assign(`<?= base_url("pengurus/")."keanggotaan/" ?>`+$("#username").val());
                                });
                            } else {
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
                            $("#tambah").html("<i class=\"fas fa-user-plus mr-1\"></i> Tambah Profil");

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

                $("#perbarui").click(function() {
                    if ($("#keterangan").val()+"" !== "undefined") {
                        var keterangan = $("#keterangan").val();
                    } else {
                        var keterangan = Number(`<?= !empty($data["keterangan"]) ?>`);
                    }
                    
                    var form = new FormData($("#form")[0]);
                    form.append("keterangan", keterangan);
                    form.append("periode", $("#periode").val());
                    form.append("username", $("#username").val());
                    form.append("nama", $("#nama").val());
                    form.append("divisi", $("#divisi").val());
                    form.append("jabatan", $("#jabatan").val());
                    form.append("email", $("#email").val());
                    form.append("telepon", $("#telepon").val());
                    form.append("motto", $("#motto").val());

                    $.ajax({
                        url: site_api+"/keanggotaan/perbarui",
                        dataType: "json",
                        type: "POST",
                        data : form,
                        contentType: false,
                        processData: false,
                        beforeSend: function (e) {
                            $("#perbarui").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Sedang melakukan perubahan...");
                        },
                        success: function(response) {
                            $("#perbarui").html("<i class=\"far fa-save mr-1\"></i> Perbarui Profil");
                            if (response.status === 200) {
                                swal({
                                    title: "Profil berhasil diperbarui.",
                                    icon: "success",
                                    button: "Tutup"
                                })
                                .then((value) => {
                                    if (
                                        $("#username").val() === `<?= $pengguna["username"] ?>`
                                        && keterangan === "0"
                                    ) {
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
                                    } else if ($("#username").val() === `<?= $pengguna["username"] ?>`) {
                                        location.reload();
                                    }
                                });
                            } else {
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
                            $("#perbarui").html("<i class=\"far fa-save mr-1\"></i> Perbarui Profil");

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

                $("#hapus").click(function() {
                    var username = $("#username").val();
                    var nama = $("#nama").val();
                    swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, anda tidak dapat memulihkan data "+nama+".",
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
                                url: site_api+"/keanggotaan/hapus/"+username,
                                dataType: "json",
                                type: "GET",
                                success: function(response) {
                                    if (response.status === 200) {
                                        swal({
                                            title: "Profil berhasil dihapus.",
                                            icon: "success",
                                            button: "Tutup"
                                        })
                                        .then((yes) => {
                                            if (username === `<?= $pengguna["username"] ?>`) {
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
                                                window.location.assign(`<?= base_url("pengurus/")."keanggotaan" ?>`);
                                            }
                                        });
                                    } else {
                                        swal({
                                            title: "Profil gagal dihapus.",
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
                });

                $("#divisi").change(function() {
                    if ($("#divisi").val() !== "") {
                        $("#jabatan").removeAttr("disabled");

                        $.ajax({
                            url: site_api+"/divisi/jabatan/"+$("#divisi").val(),
                            dataType: "json",
                            type: "GET",
                            success: function(response) {
                                if (response.status === 200) {
                                    $("#jabatan").empty();
                                    $("#jabatan").append(new Option("Pilih...", ""));
                                    for (const index in response.keterangan) {
                                        var option = new Option(response.keterangan[index].jabatan_keterangan, response.keterangan[index].divisi_relasi_jabatan);
                                        $("#jabatan").append(option);
                                    }
                                } else {
                                    swal({
                                        title: "Refresh halaman kembali.",
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
                    } else {
                        $("#jabatan").attr("disabled", "");
                        $("#jabatan").change();
                    }
                });

                $("#kembali").click(function() {
                    swal({
                        title: "Apakah anda yakin?",
                        text: "Data yang anda sunting tidak akan disimpan.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((yes) => {
                        if (yes) {
                            window.location.assign(`<?= base_url("pengurus/")."keanggotaan" ?>`);
                        }
                    });
                });
            });

            function ubah_username() {
                var username_lama = `<?= $data["username"] ?>`;

                swal({
                    icon: "warning",
                    title: "Anda akan merubah username dari username \""+$("#username").val()+"\".",
                    content: {
                        element: "input",
                        attributes: {
                            placeholder: "Massukan username baru anda...",
                            type: "text",
                            value: username_lama
                        }
                    },
                    dangerMode: true,
                    buttons: [
                        true,
                        {
                            text: "Ubah!",
                            closeModal: false,
                        }
                    ],
                })
                .then(username_baru => {
                    if (!username_baru) throw null;

                    $.ajax({
                        url: site_api+"/keanggotaan/username",
                        dataType: "json",
                        type: "POST",
                        data : {
                            "username_lama": username_lama,
                            "username_baru": username_baru
                        },
                        success: function(response) {
                            if (response.status === 200) {
                                swal({
                                    title: "Username berhasil diperbarui.",
                                    icon: "success",
                                    button: "Tutup"
                                })
                                .then((yes) => {
                                    if (yes) {
                                        if (username_lama === `<?= $pengguna["username"] ?>`) {
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
                                            window.location.assign(`<?= base_url("pengurus/")."keanggotaan/" ?>`+username_baru);
                                        }
                                    }
                                });
                            } else {
                                swal({
                                    title: "Username gagal diperbarui.",
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
                                title: "Username gagal diperbarui.",
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
                })
                .catch(err => {
                    if (err) {
                        swal("Oh noes!", "The AJAX request failed!", "error");
                    } else {
                        swal.stopLoading();
                        swal.close();
                    }
                });
            }

            function ubah_password() {
                swal({
                    icon: "warning",
                    title: "Anda akan merubah password dari username \""+$("#username").val()+"\".",
                    content: {
                        element: "input",
                        attributes: {
                        placeholder: "Massukan password baru anda.",
                        type: "password",
                        },
                    },
                    dangerMode: true,
                    buttons: [
                        true,
                        {
                            text: "Ubah!",
                            closeModal: false,
                        }
                    ],
                })
                .then(password => {
                    if (!password) throw null;

                    $.ajax({
                        url: site_api+"/keanggotaan/password",
                        dataType: "json",
                        type: "POST",
                        data : {
                            "username": $("#username").val(),
                            "password": password
                        },
                        success: function(response) {
                            if (response.status === 200) {
                                swal({
                                    title: "Kata sandi berhasil diperbarui.",
                                    icon: "success",
                                    button: "Tutup"
                                })
                                .then((yes) => {
                                    if (yes) {
                                        if ($("#username").val() === `<?= $pengguna["username"] ?>`) {
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
                                    }
                                });
                            } else {
                                swal({
                                    text: "Password gagal diperbarui.",
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
                })
                .catch(err => {
                    if (err) {
                        swal("Oh noes!", "The AJAX request failed!", "error");
                    } else {
                        swal.stopLoading();
                        swal.close();
                    }
                });
            }
        </script>
        <!-- //javascript -->
	</body>
</html>