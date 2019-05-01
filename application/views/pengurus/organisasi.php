<!doctype html>
<html class="no-js h-100" lang="en">
	<head>
        <?php $this->load->view("pengurus/_partials/head.php") ?>

        <style>
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
                            <div class="col-lg-12">
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <div class="form-row">
                                            <div class="<?= !empty($data["daftar_periode"]) ? "col-md-8" : "col-md-12" ?> d-flex align-items-center">
                                                <h6 class="m-0">Profil</h6>
                                            </div><?php if (!empty($data["daftar_periode"])) { ?>

                                            <div class="col-md-4 d-flex align-items-center text-center">
                                                <select id="periode" class="form-control"><?php
                                                        for ($i=0; $i<count($data["daftar_periode"]); $i++) {
                                                            if ($i === count($data["daftar_periode"])-1) {
                                                                $selected = " selected";
                                                            }
                                                            else {
                                                                $selected = "";
                                                            } ?>

                                                    <option value="<?= $data["daftar_periode"][$i]["organisasi_periode"]?>"<?= $selected ?>><?= @str_replace("-", "/", $data["daftar_periode"][$i]["organisasi_periode"]) ?></option><?php } ?>

                                                </select>
                                            </div><? } ?>

                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item p-3">
                                            <div class="row">
                                                <div class="col">
                                                    <form id="profil-form"<?= !empty($data["periode"]) ? "" : " hidden" ?>>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-5 text-center" style="margin: 1em 0;">
                                                                <img id="logo_pratinjau" class="change-img rounded-circle" src="<?= !empty($data["periode"]) ? base_url().$data["logo"] : base_url()."gambar/organisasi/_standar.png" ?>" alt="User Avatar" height="140" width="140">
                                                                <input type="file" id="logo" name="logo" class="btn btn-secondary" style="margin-top: 85px; margin-left:-210px;">
                                                                <!-- <button type="button" class="btn btn-secondary" id="perbarui-logo" style="margin-top: 70px; margin-left:-50px;">
                                                                    <i class="fas fa-pencil-alt mr-1"></i>
                                                                    Ubah
                                                                </button> -->
                                                            </div>
                                                            <div class="form-group col-md-7">
                                                                <div class="form-group">
                                                                    <label for="nama_panjang">Nama Lengkap</label>
                                                                    <input type="text" class="form-control" id="nama_panjang" name="nama_panjang" placeholder="Nama Lengkap" value="<?= !empty($data["periode"]) ? $data["nama_panjang"] : "" ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_pendek">Nama Pendek</label>
                                                                    <input type="text" class="form-control" id="nama_pendek" name="nama_pendek" placeholder="Nama Pendek" value="<?= !empty($data["periode"]) ? $data["nama_pendek"] : "" ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="visi">Visi</label>
                                                                <textarea class="form-control" id="visi" name="visi" rows="4" placeholder="Visi organisasi."><?= !empty($data["periode"]) ? $data["visi"] : "" ?></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="misi">Misi</label>
                                                                <textarea class="form-control" id="misi" name="misi" rows="4" placeholder="Misi organisasi."><?= !empty($data["periode"]) ? $data["misi"] : "" ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-5">
                                                                <div class="form-group">
                                                                    <label for="tentang">Tentang</label>
                                                                    <textarea class="form-control" id="tentang" name="tentang" rows="2" placeholder="Sesuatu hal tentang organisasi."><?= !empty($data["periode"]) ? $data["tentang"] : "" ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="deskripsi">Deskripsi</label>
                                                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi organisasi."><?= !empty($data["periode"]) ? $data["deskripsi"] : "" ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-7">
                                                                <label for="sejarah">Sejarah</label>
                                                                <textarea class="form-control" id="sejarah" name="sejarah" rows="8" placeholder="Sejarah singkat organisasi."><?= !empty($data["periode"]) ? $data["sejarah"] : "" ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="alamat">Alamat</label>
                                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat lengkap" value="<?= !empty($data["periode"]) ? $data["kontak"]["alamat"] : "" ?>">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control" id="email" name="email" placeholder="alvri@example.com" value="<?= !empty($data["periode"]) ? $data["kontak"]["email"] : "" ?>">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="telepon">Telepon</label>
                                                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="+628..." value="<?= !empty($data["periode"]) ? $data["kontak"]["telepon"] : "" ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-4">
                                                                <label for="facebook">Facebook</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">https://facebook.com/</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?= !empty($data["periode"]) ? $data["kontak"]["facebook"] : "" ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="twitter">Twitter</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">https://twitter.com/</span>
                                                                    </div>
                                                                    <input type="text" class="form-control"  id="twitter" name="twitter" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?= !empty($data["periode"]) ? $data["kontak"]["twitter"] : "" ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="instagram">Instagram</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">https://instagram.com/</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?= !empty($data["periode"]) ? $data["kontak"]["instagram"] : "" ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-6">
                                                                <label for="youtube">Youtube</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">https://youtube.com/channel/</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?= !empty($data["periode"]) ? $data["kontak"]["youtube"] : "" ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="peta">Google Maps</label>
                                                                <input type="text" class="form-control" id="peta" name="peta" placeholder="https://www.google.com/maps/embed?pb=!1h33!7m42!1k5!1k998" aria-label="Peta" aria-describedby="basic-addon1" value="<?= !empty($data["periode"]) ? $data["kontak"]["peta"] : "" ?>">
                                                            </div>
                                                        </div>
                                                        <div class="text-center pt-3 pb-3">
                                                            <button type="button" class="btn btn-accent col-md-12" id="profil-submit">
                                                                <i class="far fa-save mr-1"></i>
                                                                Perbarui Profil
                                                            </button>
                                                        </div>
                                                    </form>

                                                    <div id="profil-keterangan" class="col-md-12 text-center pt-2"<?= !empty($data["periode"]) ? " hidden" : "" ?>>
                                                         <label>Profil organisasi tidak ditemukan.</label>
                                                     </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <h6 class="m-0">Jejak Pendapat</h6>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item p-3">
                                            <div class="row">
                                                <div class="col">
                                                    <form id="jpendapat-form"><?php for ($i=0; $i<count($data["jpendapat"]); $i++) { ?>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-5 text-center" style="margin: 1em 0;">
                                                                <img id="<?= $i+1 ?>_foto_pratinjau" class="rounded-circle" src="<?= base_url("assets/gambar/jejakpendapat/").(@is_file("../pskhuinsuka.com/assets/gambar/jejakpendapat/".($i+1).".png") ? ($i+1) : "_standar").".png" ?>" alt="User Avatar" height="140" width="140">
                                                                <input type="file" id="<?= $i+1 ?>_foto" name="<?= $i+1 ?>_foto" class="btn btn-secondary" style="margin-top: 85px; margin-left:-210px;">
                                                            </div>
                                                            <div class="form-group col-md-7">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-7">
                                                                        <label for="<?= $i ?>_nama">Nama</label>
                                                                        <input type="text" class="form-control" id="<?= $i+1 ?>_nama" name="<?= $i+1 ?>_nama" placeholder="Nama" value="<?= $data["jpendapat"][$i]["jpendapat_nama"]; ?>">
                                                                    </div>
                                                                    <div class="form-group col-md-5">
                                                                        <label for="<?= $i ?>_jabatan">Jabatan</label>
                                                                        <input type="text" class="form-control" id="<?= $i+1 ?>_jabatan" name="<?= $i+1 ?>_jabatan" placeholder="Jabatan" value="<?= $data["jpendapat"][$i]["jpendapat_jabatan"]; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="<?= $i ?>_pendapat">Pendapat</label>
                                                                    <textarea class="form-control" id="<?= $i+1 ?>_pendapat" name="<?= $i+1 ?>_pendapat" rows="2" placeholder="Pendapat" value="Pendapat"><?= $data["jpendapat"][$i]["jpendapat_pendapat"]; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div><?php } ?>

                                                        <div class="text-center pt-3 pb-3">
                                                            <button type="button" class="btn btn-accent col-md-12" id="jpendapat-submit">
                                                                <i class="far fa-save mr-1"></i>
                                                                Perbaharui Jejak Pendapat
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
                function pratinjau(input, id_pratinjau) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $("#"+id_pratinjau).attr("src", e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#logo").change(function() {
                    pratinjau(this, "logo_pratinjau");
                });

                $("#1_foto").change(function() {
                    pratinjau(this, "1_foto_pratinjau");
                });

                $("#2_foto").change(function() {
                    pratinjau(this, "2_foto_pratinjau");
                });

                $("#3_foto").change(function() {
                    pratinjau(this, "3_foto_pratinjau");
                });

                $("#periode").change(function(){
                    var periode = $(this).find(":selected").attr("value");

                    $.ajax({
                        url: site_api+"/organisasi/"+periode,
                        dataType: "json",
                        type: "GET",
                        success: function(response) {
                            if (response.status === 200) {
                                $("#status").html(``);
                                $("#profil-form").removeAttr("hidden");
                                $("#profil-keterangan").attr("hidden", "true");

                                var data = response.keterangan;
                                $("input[id=logo_periode]").val(data.periode);
                                $("img[id=logo]").val(`<?= base_url() ?>`+data.logo);
                                $("input[id=nama_panjang]").val(data.nama_panjang);
                                $("input[id=nama_pendek]").val(data.nama_pendek);
                                $("textarea[id=visi]").val(data.visi);
                                $("textarea[id=misi]").val(data.misi);
                                $("textarea[id=tentang]").val(data.tentang);
                                $("textarea[id=deskripsi]").val(data.deskripsi);
                                $("textarea[id=sejarah]").val(data.sejarah);
                                $("input[id=alamat]").val(data.kontak.alamat);
                                $("input[id=email]").val(data.kontak.email);
                                $("input[id=telepon]").val(data.kontak.telepon);
                                $("input[id=facebook]").val(data.kontak.facebook);
                                $("input[id=twitter]").val(data.kontak.twitter);
                                $("input[id=instagram]").val(data.kontak.instagram);
                                $("input[id=youtube]").val(data.kontak.youtube);
                            } else {
                                $("#profil-form").attr("hidden", "true");
                                $("#profil-keterangan").removeAttr("hidden");

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
                            $("#profil-form").attr("hidden", "true");
                            $("#profil-keterangan").removeAttr("hidden");

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

                $("#profil-submit").click(function() {
                    var form = new FormData($("#profil-form")[0]);
                    form.append("periode", $("#periode").val());

                    $.ajax({
                        url: site_api+"/organisasi/perbarui",
                        dataType: "json",
                        type: "POST",
                        data : form,
                        contentType: false,
                        processData: false,
                        beforeSend: function (e) {
                            $("#profil-submit").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Sedang melakukan perubahan...");
                        },
                        success: function(response) {
                            $("#profil-submit").html("<i class=\"far fa-save mr-1\"></i> Perbarui Profil");
                            if (response.status === 200) {
                                swal({
                                    title: "Profil berhasil diperbarui",
                                    icon: "success",
                                    button: "Tutup",
                                })
                                .then((value) => {
                                    location.reload();
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
                            $("#profil-submit").html("<i class=\"far fa-save mr-1\"></i> Perbarui Profil");

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

                $("#jpendapat-submit").click(function() {
                    var form = new FormData($("#jpendapat-form")[0]);
                    $.ajax({
                        url: site_api+"/jpendapat/simpan",
                        dataType: "json",
                        type: "POST",
                        data : form,
                        contentType: false,
                        processData: false,
                        beforeSend: function (e) {
                            $("#jpendapat-submit").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Sedang melakukan perubahan...");
                        },
                        success: function(response) {
                            $("#jpendapat-submit").html("<i class=\"far fa-save mr-1\"></i> Perbarui Jejak Pendapat");
                            if (response.status === 200) {
                                swal({
                                    title: "Jejak Pendapat berhasil diperbarui",
                                    icon: "success",
                                    button: "Tutup",
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
                            $("#jpendapat-submit").html("<i class=\"far fa-save mr-1\"></i> Perbarui Jejak Pendapat");

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