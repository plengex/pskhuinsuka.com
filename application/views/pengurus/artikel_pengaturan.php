<!doctype html>
<html class="no-js h-100" lang="en">
	<head>
        <?php $this->load->view("pengurus/_partials/head.php") ?>
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css">
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
						<div class="row mb-2">
                            <div class="col-md-12 text-right" style="margin-top: -62px;">
                                <button type="button" class="btn btn-info" id="kembali">
                                    <i class="fas fa-arrow-left mr-1"></i>
                                    Kembali
                                </button>
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <!-- Artikel -->
                                <div class="card card-small mb-3">
                                    <div class="card-body">
                                        <form class="add-new-post" id="form">
                                            <input id="judul" name="judul" class="form-control form-control-lg mb-3" type="text" placeholder="Judul Artikel" value="<?= $menu["judul_sub"] === "Tambah" ? "" : $data["judul"] ?>">
                                            <div id="editor-container" class="add-new-post__editor mb-3"></div>
                                            <div class="form-control mb-3 text-center">
                                                <input type="file" id="gambar" name="gambar" class="col-md-12">
                                            </div>
                                            <div class="form-control mb-0 text-center">
                                                <img id="gambar_pratinjau" src="<?= $menu["judul_sub"] === "Tambah" ? "#" : $data["gambar"] ?>" class="col-sm-12 mt-3 mb-3" alt="&nbsp;&nbsp;Gambar artikel">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- //Artikel -->
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <!-- Keterangan -->
                                <div class="card card-small mb-3">
                                    <div class="card-header border-bottom">
                                        <h6 class="m-0">Keterangan</h6>
                                    </div>
                                    <div class="card-body p-0">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item p-3">
                                                <div class="input-group mb-1">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="material-icons">flag</i>
                                                        </span>
                                                    </div>
                                                    <input id="keterangan_status" class="form-control text-center" aria-label="Status" aria-describedby="basic-addon1" value="<?= $menu["judul_sub"] === "Tambah" ? "..." : $data["keterangan"] ?>" disabled>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="material-icons"></i>
                                                        </span>
                                                    </div>
                                                    <input id="keterangan_waktu" class="form-control text-center" aria-label="Tanggal" aria-describedby="basic-addon1" value="<?= $menu["judul_sub"] === "Tambah" ? date("d/m/Y") : DateTime::createFromFormat("Y-m-d H:i:s", $data["waktu"])->format("d/m/Y") ?>" disabled>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex px-3">
                                                <button id="draf" class="btn btn-sm btn-outline-accent" onclick="<?= $menu["judul_sub"] === "Tambah" ? "tambah(2)" : "perbarui(2)" ?>">
                                                    <i class="material-icons">save</i>
                                                    Draf
                                                </button>
                                                <button id="terbit" class="btn btn-sm btn-outline-accent ml-auto" onclick="<?= $menu["judul_sub"] === "Tambah" ? "tambah(1)" : "perbarui(1)" ?>">
                                                    <i class="material-icons">file_copy</i>
                                                    Terbitkan
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- //Keterangan -->
                                <!-- Penerbit -->
                                <div class="card card-small mb-3">
                                    <div class="card-header border-bottom">
                                        <h6 class="m-0">Penerbit</h6>
                                    </div>
                                    <div class="card-body p-0">
                                        <ul class="list-group list-group-flush text-center">
                                            <li class="list-group-item px-3 pb-2">
                                                <div class="m-2 mx-auto"><?php
                                                if ($menu["judul_sub"] === "Tambah") {
                                                    if (@is_file("./assets/gambar/keanggotaan/".$pengguna["username"].".png")) {
                                                        $data["foto"] = base_url("assets/")."gambar/keanggotaan/".$pengguna["username"].".png";
                                                    } else {
                                                        $data["foto"] = base_url("assets/")."gambar/keanggotaan/_standar.png";
                                                    }
                                                } ?>

                                                    <img class="rounded-circle" src="<?= $data["foto"] ?>" alt="User Avatar" height="110" width="110">
                                                </div>
                                                <div class="m-1 mx-auto">
                                                    <span class="d-block text-center"><?= $menu["judul_sub"] === "Tambah" ? $pengguna["nama"] : $data["penerbit_nama"] ?></span>
                                                    <span class="d-block border-top mr-4 ml-4"></span>
                                                    <span class="d-block pb-2" style="font-size: 9pt;"><?= $menu["judul_sub"] === "Tambah" ? $data["divisi"] : $data["penerbit_divisi"] ?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- //Penerbit -->
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>
        <script src="<?= base_url("assets/pengurus/") ?>scripts/app/app-blog-new-post.1.1.0.js"></script>
        <!-- <script src="<?= base_url("assets/pengurus/") ?>scripts/app/app-blog-overview.1.1.0.js"></script> -->
        <script>
            var site_api = `<?= $api ?>`;
            
            $(document).ready(function() {
                $(".ql-editor").html(`<?= $menu["judul_sub"] === "Tambah" ? "" : $data["isi"] ?>`);

                $("#judul").keyup(function() {
                    $("input[id=keterangan_status]").val("Belum disimpan");
                    $("input[id=keterangan_tanggal]").val(`<?= date("d/m/Y") ?>`);
                });

                $(".ql-editor").keyup(function() {
                    $("input[id=keterangan_status]").val("Belum disimpan");
                    $("input[id=keterangan_tanggal]").val(`<?= date("d/m/Y") ?>`);
                });

                $("#kembali").click(function() {
                    if ($("#keterangan_status").val() !== "Belum disimpan") {
                        window.location.assign(`<?= base_url("pengurus/")."artikel" ?>`);
                    } else {
                        swal({
                            title: "Apakah anda yakin?",
                            text: "Data yang anda sunting tidak akan disimpan.",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((yes) => {
                            if (yes) {
                                window.location.assign(`<?= base_url("pengurus/")."artikel" ?>`);
                            }
                        });
                    }
                });

                function pratinjau(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#gambar_pratinjau').attr("src", e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#gambar").change(function() {
                    pratinjau(this);
                });
            });

            function tambah(id) {
                var form = new FormData($("#form")[0]);
                form.append("keterangan", id);
                form.append("penerbit", `<?= $pengguna["username"] ?>`);
                form.append("isi", $(".ql-editor").html());

                $.ajax({
                    url: site_api+"/artikel/tambah",
                    dataType: "json",
                    type: "POST",
                    data : form,
                    contentType: false,
                    processData: false,
                    beforeSend: function (e) {
                        if (id === 1) {
                            $("#terbit").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Tunggu...");
                        } if (id === 2) {
                            $("#draf").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Tunggu...");
                        }
                    },
                    success: function(response) {
                        $("#draf").html("<i class=\"material-icons\">save</i> Draf");
                        $("#terbit").html("<i class=\"material-icons\">file_copy</i> Terbitkan");

                        if (response.status === 200) {
                            swal({
                                title: "Artikel berhasil ditambahkan.",
                                icon: "success",
                                button: "Tutup",
                            })
                            .then((value) => {
                                if (id === 1) {
                                    var keterangan_status = "Telah diterbitkan";
                                } else {
                                    var keterangan_status = "Disimpan dalam draf";
                                }
                                $("input[id=keterangan_status]").val(keterangan_status);
                                $("input[id=keterangan_tanggal]").val(`<?= date("d/m/Y") ?>`);
                                
                                window.location.assign(`<?= base_url("pengurus/")."artikel/" ?>`+response.keterangan.id);
                            });
                        } else {
                            $("input[id=keterangan_status]").val("Gagal disimpan");
                            $("input[id=keterangan_tanggal]").val(`<?= date("d/m/Y") ?>`);

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
                        $("input[id=keterangan_status]").val("Gagal disimpan");
                        $("input[id=keterangan_tanggal]").val(`<?= date("d/m/Y") ?>`);
                        $("#draf").html("<i class=\"material-icons\">save</i> Draf");
                        $("#terbit").html("<i class=\"material-icons\">file_copy</i> Terbitkan");

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

            function perbarui(id) {
                var form = new FormData($("#form")[0]);
                form.append("id", `<?= $data["id"] ?>`);
                form.append("keterangan", id);
                form.append("isi", $(".ql-editor").html());

                $.ajax({
                    url: site_api+"/artikel/perbarui",
                    dataType: "json",
                    type: "POST",
                    data : form,
                    contentType: false,
                    processData: false,
                    beforeSend: function (e) {
                        if (id === 1) {
                            $("#terbit").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Tunggu...");
                        } if (id === 2) {
                            $("#draf").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Tunggu...");
                        }
                    },
                    success: function(response) {
                        $("#draf").html("<i class=\"material-icons\">save</i> Draf");
                        $("#terbit").html("<i class=\"material-icons\">file_copy</i> Terbitkan");

                        if (response.status === 200) {
                            if (id === 1) {
                                var keterangan_status = "Telah diterbitkan";
                            } else {
                                var keterangan_status = "Disimpan dalam draf";
                            }
                            $("input[id=keterangan_status]").val(keterangan_status);
                            $("input[id=keterangan_tanggal]").val(`<?= date("d/m/Y") ?>`);

                            swal({
                                title: "Artikel berhasil diperbarui.",
                                text: "Artikel diperbarui pada "+`<?= date("d M Y (H:i:s")." WIB)" ?>`+" dan masuk dalam daftar \""+keterangan_status.toLowerCase()+"\".",
                                icon: "success",
                                button: "Tutup",
                            });
                        } else {
                            $("input[id=keterangan_status]").val("Gagal disimpan");
                            $("input[id=keterangan_tanggal]").val(`<?= date("d/m/Y") ?>`);

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
                        $("input[id=keterangan_status]").val("Gagal disimpan");
                        $("input[id=keterangan_tanggal]").val(`<?= date("d/m/Y") ?>`);
                        $("#draf").html("<i class=\"material-icons\">save</i> Draf");
                        $("#terbit").html("<i class=\"material-icons\">file_copy</i> Terbitkan");

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
        </script>
        <!-- //javascript -->
	</body>
</html>