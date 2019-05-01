<?php   
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("umum/_partials/head.php") ?>
    
    <link href="<?= base_url("assets/umum/") ?>css/contact.css" rel='stylesheet' type='text/css' />
    <style>
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0; 
        }
    </style>

</head>

<body>
    <!-- header -->
    <?php $this->load->view("umum/_partials/header.php") ?>

    <!-- //header -->

    <!-- breadcrumb -->
    <?php $this->load->view("umum/_partials/breadcrumb.php") ?>

    <!-- //breadcrumb -->
    
    <!-- field -->
    <section class="services">
		<div class="container">
			<h3 class="tittle">Pendaftaran Pengurus</h3>
            <div id="status">
                
            </div>
            <div class="inner-sec-wthree contact_left_grid">
                <div class="contact_grid_right">
                    <form action="<?= base_url("pendaftaran")?>" method="POST">
                        <div class="contact_left_grid">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nama">Nama</label>
                                    <div class="input-group input-group-seamless">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">person</i>
                                            </span>
                                        </span> -->
                                        <input type="text" id="nama" name="nama" placeholder="Nama lengkap" value="<?= set_value('nama'); ?>">
                                        <?= form_error('nama', '<p><small class="text-danger pl-3" style="font-size:14px">', '</small></p>'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <div class="input-group input-group-seamless">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">person</i>
                                            </span>
                                        </span> -->
                                        <input type="text" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<p><small class="text-danger pl-3" style="font-size:14px">', '</small></p>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password1">Password</label>
                                    <div class="input-group input-group-seamless">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">person</i>
                                            </span>
                                        </span> -->
                                        <input type="password" id="password1" name="password1" placeholder="Password" style="padding: 15px; width: 100%; background: #f7f7f7; margin-top: 1em; border-radius: 0; color: #777; font-size:14px; border: 1px solid #ebeeef;">
                                        <?= form_error('password1', '<p><small class="text-danger pl-3" style="font-size:14px">', '</small></p>'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password2">Konfirmasi Password</label>
                                    <div class="input-group input-group-seamless">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">person</i>
                                            </span>
                                        </span> -->
                                        <input type="password" id="password2" name="password2" placeholder="Konfirmasi Password" style="padding: 15px; width: 100%; background: #f7f7f7; margin-top: 1em; border-radius: 0; color: #777; font-size:14px; border: 1px solid #ebeeef;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="divisi">Divisi</label>
                                    <div class="input-group input-group-seamless">
                                        <select name="divisi" id="divisi" class="form-control" style="min-height: 50px; background: #f7f7f7; margin-top: 1em; border-radius: 0; color: #777; font-size:14px; border: 1px solid #ebeeef; cursor: pointer;">
                                            <option value="">Pilih...</option>
                                            <?php foreach ($data["daftar_divisi"] as $divisi) { ?>
                                            <option value="<?= $divisi["divisi_id"] ?>"><?= $divisi["divisi_keterangan"] ?></option><?php } ?>
                                        </select>
                                    </div>
                                    <?= form_error('divisi', '<p><small class="text-danger pl-3" style="font-size:14px">', '</small></p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jabatan">Jabatan</label>
                                    <div class="input-group input-group-seamless">
                                        <select name="jabatan" id="jabatan" class="form-control" style="min-height: 50px; background: #f7f7f7; margin-top: 1em; border-radius: 0; color: #777; font-size:14px; border: 1px solid #ebeeef; cursor: pointer;" disabled>
                                            <option value="">Pilih...</option>
                                            <option value="6">Koordinator</option>
                                            <option value="7">Anggota</option>
                                        </select>
                                    </div>
                                    <?= form_error('jabatan', '<p><small class="text-danger pl-3" style="font-size:14px">', '</small></p>'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <div class="input-group input-group-seamless">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">person</i>
                                            </span>
                                        </span> -->
                                        <input type="text" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<p><small class="text-danger pl-3" style="font-size:14px">', '</small></p>'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telepon">Telepon</label>
                                    <div class="input-group input-group-seamless">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">person</i>
                                            </span>
                                        </span> -->
                                        <input type="number" id="telepon" name="telepon" placeholder="Telepon" value="<?= set_value('telepon'); ?>" style="padding: 15px; width: 100%; background: #f7f7f7; margin-top: 1em; border-radius: 0; color: #777; font-size:14px; border: 1px solid #ebeeef">
                                        <?= form_error('telepon', '<p><small class="text-danger pl-3" style="font-size:14px">', '</small></p>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" id="periode" name="periode" value="<?= $data["periode"]; ?>">
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" id="keterangan" name="keterangan" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="motto">Motto</label>
                                    <div class="input-group input-group-seamless">
                                        <textarea id="motto" name="motto" placeholder="Motto..."><?= set_value('motto'); ?></textarea>
                                        <?= form_error('motto', '<p><small class="text-danger pl-3" style="font-size:14px">', '</small></p>'); ?>
                                    </div>
                                </div>
                            </div>
                                <button type="button" id="daftar" class="col-md-12" style="background-color: #30c39e; outline: none; color: #fff; font-size: 14px; padding: 20px 0; border: none; letter-spacing: 2px; cursor: pointer; text-transform: uppercase; font-weight: 600">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</section>

    <div class="flexslider">
       	<ul class="slides">
        	<li>
                <div class="testimonials_grid">
                    <p><br><br><br><br><br></p>
                </div>
            </li>
        </ul>
    </div>
    <!-- //field -->

    <!-- footer -->
    <?php $this->load->view("umum/_partials/footer.php") ?>

    <!-- //footer -->

    <!-- copyright -->
    <?php $this->load->view("umum/_partials/copyright.php") ?>

    <!-- //copyright -->

    <!-- javascript -->
    <?php $this->load->view("umum/_partials/javascript.php") ?>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    
    <script>
        var site_api = `<?= $api ?>`;
        
        $(document).ready(function() {
            $("#daftar").click(function() {
                $.ajax({
                    url: site_api+"/keanggotaan/tambah",
                    dataType: "json",
                    type: "POST",
                    data : {
                        "keterangan": "0",
                        "periode": `<?= $organisasi["periode"] ?>`,
                        "username": $("#username").val(),
                        "password": $("#password1").val(),
                        "nama": $("#nama").val(),
                        "divisi": $("#divisi").val(),
                        "jabatan": $("#jabatan").val(),
                        "email": $("#email").val(),   
                        "telepon": $("#telepon").val(),
                        "motto": $("#motto").val()
                    },
                    beforeSend: function (e) {
                        $("#daftar").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Sedang melakukan pendaftaran...");
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            swal({
                                title: "Akun anda berhasil didaftarkan.",
                                text: "Silahkan ajukan pengaktifan akun kepada Ketua PSKH.",
                                icon: "success",
                                button: "Tutup",
                            })
                            .then((value) => {
                                window.location.assign(`<?= base_url() ?>`);
                            });
                        } else {
                            $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="fa fa-info mx-2"></i>
                                <strong>`+response.keterangan+`</strong>
                            </div>`);
                            $("#daftar").html("Daftar");
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
                        $("#daftar").html("Daftar");
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
        });
    </script>
    <!-- //javascript -->
</body>

</html>