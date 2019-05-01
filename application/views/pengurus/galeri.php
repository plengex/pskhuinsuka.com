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
                            <div class="col-lg-12">
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <div class="form-row">
                                            <div class="<?= !empty($data["daftar_periode"]) ? "col-md-8" : "col-md-12" ?> mt-2 mb-2">
                                                <h6 class="m-0">Galeri</h6>
                                            </div><?php if (!empty($data["daftar_periode"])) { ?>

                                            <div class="col-md-4 pt-1">
                                                <select id="periode" class="form-control">
                                                    <?php
                                                        for ($i=0; $i<count($data["daftar_periode"]); $i++) {
                                                            if (!empty($data["periode"] && $data["periode"] === $data["daftar_periode"][$i]["organisasi_periode"])) {
                                                                $selected = " selected";
                                                            }
                                                            else {
                                                                $selected = "";
                                                            }

                                                            echo "<option value=\"".$data["daftar_periode"][$i]["organisasi_periode"]."\"".$selected.">".@str_replace("-", "/", $data["daftar_periode"][$i]["organisasi_periode"])."</option>";
                                                        } ?>

                                                </select>
                                            </div><? } ?>

                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item p-3">
                                            <div class="row">
                                                <div class="col">
                                                    <form id="form"<?= !empty($data["periode"]) ? "" : " hidden" ?>>
                                                        <div class="form-group">
                                                            <label for="instagram">
                                                                Instagram
                                                                <br><small>*Berikut tutorial cara mendapatkan akses token Instagram: <a href="https://www.youtube.com/watch?v=-BmTKA1xCm8" target="_blank">https://www.youtube.com/watch?v=-BmTKA1xCm8</a> (46:40)</small>
                                                            </label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Akses token</span>
                                                                </div>
                                                                <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Akses token" aria-label="Akses token" aria-describedby="basic-addon1" value="<?= !empty($data["periode"]) ? $data["instagram"] : "" ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-7">
                                                                <label for="landscape">
                                                                    Foto Landscape
                                                                    <br><small>*Untuk mendapatkan hasil yang bagus gunakan rasio gambar 1680 x 900 px</small>
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="file" id="landscape" name="landscape" class="btn btn-secondary col-md-12 mb-2">
                                                                    <img id="landscape_pratinjau" src="<?= base_url()."assets/gambar/organisasi/".(@is_file("../pskhuinsuka.com/".$data["periode"])."_landscape.png" ? $data["periode"] : "_standar")."_landscape.png" ?>" height="100%" width="100%">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-5">
                                                                <label for="portrait">
                                                                    Foto Portrait
                                                                    <br><small>*Untuk mendapatkan hasil yang bagus gunakan rasio gambar 380 x 640 px</small>
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="file" id="portrait" name="portrait" class="btn btn-secondary col-md-12 mb-2">
                                                                    <img id="portrait_pratinjau" src="<?= base_url()."assets/gambar/organisasi/".(@is_file("../pskhuinsuka.com/".$data["periode"])."_portrait.png" ? $data["periode"] : "_standar")."_portrait.png" ?>" height="100%" width="100%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center  pt-3 pb-3">
                                                            <button type="button" class="btn btn-accent col-md-12" id="perbarui">
                                                                <i class="far fa-save mr-1"></i>
                                                                Perbarui Galeri
                                                            </button>
                                                        </div>
                                                    </form>

                                                    <div id="form-keterangan" class="col-md-12 text-center pt-2"<?= !empty($data["periode"]) ? " hidden" : "" ?>>
                                                         <label>Galeri organisasi tidak ditemukan.</label>
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
                function pratinjau(input, id_pratinjau) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $("#"+id_pratinjau).attr("src", e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#landscape").change(function() {
                    pratinjau(this, "landscape_pratinjau");
                });

                $("#portrait").change(function() {
                    pratinjau(this, "portrait_pratinjau");
                });

                $("#periode").change(function(){
                    var periode = $(this).find(":selected").attr("value");

                    $.ajax({
                        url: site_api+"/galeri/"+periode,
                        dataType: "json",
                        type: "GET",
                        success: function(response) {
                            if (response.status === 200) {
                                $("#status").html(``);
                                $("#form-instagram").removeAttr("hidden");
                                $("#form-keterangan").attr("hidden", "true");

                                var data = response.keterangan;
                                $("input[id=instagram]").val(data.instagram);
                            } else {
                                $("#form-instagram").attr("hidden", "true");
                                $("#form-keterangan").removeAttr("hidden");

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
                            $("#form-instagram").attr("hidden", "true");
                            $("#form-keterangan").removeAttr("hidden");

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

                $("#perbarui").click(function() {
                    var form = new FormData($("#form")[0]);
                    form.append("periode", $("#periode").val());

                    $.ajax({
                        url: site_api+"/galeri/simpan",
                        dataType: "json",
                        type: "POST",
                        data : form,
                        contentType: false,
                        processData: false,
                        beforeSend: function (e) {
                            $("#perbarui").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Sedang melakukan perubahan...");
                        },
                        success: function(response) {
                            $("#perbarui").html("<i class=\"far fa-save mr-1\"></i> Perbarui Galeri");
                            if (response.status === 200) {
                                swal({
                                    title: "Galeri berhasil diperbarui",
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
                            $("#perbarui").html("<i class=\"far fa-save mr-1\"></i> Perbarui Galeri");

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